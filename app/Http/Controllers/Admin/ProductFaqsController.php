<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ProductFaq, ProductMaster};
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductFaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_faq.index');
    }

    public function getProductFaqs()
    {
        $products = ProductMaster::select('id', 'product_name')->withCount([
            'faqs as total_faqs'
        ])->whereHas('faqs');

        return DataTables::of($products)
            ->addColumn('total_faqs', function ($row) {
                return $row->total_faqs;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('product-faqs.edit', $row->id);
                $deleteId = $row->id;

                return '
                    <a href="'.$editUrl.'" class="btn btn-sm btn-primary me-1">
                        <i class="icofont-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-danger delete_product_faqs" data-id="'.$deleteId.'">
                        <i class="icofont-trash"></i>
                    </button>
                ';
            })
            ->rawColumns(['total_faqs', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['products'] = ProductMaster::whereNull('deleted_at')->get();
        return view('admin.product_faq.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product'     => 'required|exists:product_masters,id',
            'question'    => 'required|array|min:1',
            'question.*'  => 'required|string|max:255',
            'answer'      => 'required|array|min:1',
            'answer.*'    => 'required|string',
        ], [
            // Product
            'product.required' => 'Please select a product.',
            'product.exists'   => 'The selected product does not exist.',
            // Questions
            'question.required'   => 'At least one FAQ question is required.',
            'question.array'      => 'FAQ questions must be in valid format.',
            'question.*.required' => 'FAQ question field cannot be empty.',
            'question.*.string'   => 'FAQ question must be a valid text.',
            'question.*.max'      => 'FAQ question may not exceed 255 characters.',
            // Answers
            'answer.required'     => 'At least one FAQ answer is required.',
            'answer.array'        => 'FAQ answers must be in valid format.',
            'answer.*.required'   => 'FAQ answer field cannot be empty.',
            'answer.*.string'     => 'FAQ answer must be valid text.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        foreach ($request->question as $index => $question) {
            ProductFaq::create([
                'product_master_id' => $request->product,
                'question'   => $question,
                'answer'     => $request->answer[$index],
            ]);
        }

        return redirect()->route('product-faqs.index')->with('success', 'Product FAQs added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProductFaqs(string $productId)
    {
        $product = ProductMaster::findOrFail($productId);
         $products = ProductMaster::whereNull('deleted_at')->get(); 
        $faqs = ProductFaq::where('product_master_id', $productId)->get();

        return view('admin.product_faq.edit', compact('product', 'products', 'faqs'));
    }

    public function updateProductFaqs(Request $request, string $productId)
{
    // ====== नया validation add करो ======
    $validator = Validator::make($request->all(), [
        'product' => 'required|exists:product_masters,id',   // <-- ये line add करो
        'faq_id' => 'nullable|array',
        'faq_id.*' => [
            'nullable',
            'integer',
            Rule::exists('product_faqs', 'id')->where(function ($q) use ($productId) {
                $q->where('product_master_id', $productId);
            }),
        ],
        'question' => 'required|array|min:1',
        'question.*' => 'required|string|max:255',
        'answer' => 'required|array|min:1',
        'answer.*' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $newProductId = $request->product;   // <-- नया product ID ले लो

    // PREVENT DELETING LAST FAQ (same as before)
    $existingFaqIds = ProductFaq::where('product_master_id', $productId)->pluck('id')->toArray();
    $submittedFaqIds = array_filter($request->faq_id ?? []);
    $deleteIds = array_diff($existingFaqIds, $submittedFaqIds);

    if (count($existingFaqIds) === 1 && count($deleteIds) === 1) {
        return redirect()->back()
            ->with('error', 'At least one FAQ is required for a product.')
            ->withInput();
    }

    DB::transaction(function () use ($request, $productId, $newProductId, $deleteIds) {
        
        // ====== अगर product change हुआ तो सभी FAQs को नए product में move करो ======
        if ($newProductId != $productId) {
            ProductFaq::where('product_master_id', $productId)
                      ->update(['product_master_id' => $newProductId]);
        }

        // Delete removed FAQs
        if (!empty($deleteIds)) {
            ProductFaq::whereIn('id', $deleteIds)->delete();
        }

        // Update / Create FAQs (नए product ID के साथ)
        foreach ($request->question as $index => $question) {
            if (!empty($request->faq_id[$index])) {
                ProductFaq::where('id', $request->faq_id[$index])->update([
                    'question' => $question,
                    'answer' => $request->answer[$index],
                ]);
            } else {
                ProductFaq::create([
                    'product_master_id' => $newProductId,   // <-- यहाँ $newProductId use करो
                    'question' => $question,
                    'answer' => $request->answer[$index],
                ]);
            }
        }
    });

    return redirect()->route('product-faqs.index')->with('success', 'Product FAQs updated successfully');
}

    public function destroyByProduct($productId)
    {
        $count = ProductFaq::where('product_master_id', $productId)->count();

        if ($count <= 1) {
            return response()->json([
                'result' => false,
                'message' => 'At least one FAQ is required for a product.'
            ]);
        }

        ProductFaq::where('product_master_id', $productId)->delete();

        return response()->json([
            'result' => true,
            'message' => 'Product FAQs deleted successfully.'
        ]);
    }
}
