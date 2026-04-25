<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ProductDescription, ProductMaster};
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_description.index');
    }

    public function getProductDescriptions(Request $request)
    {
        try {
            $query = ProductDescription::select('id', 'product_master_id', 'title', 'description')->with('product:id,product_name')->orderBy('id', 'asc')->get();
            return DataTables::of($query)
                ->addColumn('product_name', function ($row) {
                    return $row->product->product_name ?? '-';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('product-description.edit', $row->id);
                    return '
                        <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                            <i class="icofont-edit"></i>
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-sm delete_product_description" data-id="' . $row->id . '">
                            <i class="icofont-ui-delete"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['products'] = ProductMaster::whereNull('deleted_at')->get();
        return view('admin.product_description.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required|exists:product_masters,id',
            'description_title' => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'product.required' => 'Please select a product.',
            'product.exists' => 'The selected product does not exist.',
            'description_title.required' => 'Description title is required.',
            'description_title.string' => 'Description title must be a valid string.',
            'description_title.max' => 'Description title may not exceed 255 characters.',
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a valid string.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        ProductDescription::create([
            'product_master_id' => $request->product,
            'title' => $request->description_title,
            'description' => json_encode($request->description),
        ]);

        return redirect()
            ->route('product-description.index')
            ->with('success', 'Product description created successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['productDescription'] = ProductDescription::findOrFail($id);
        $data['products'] = ProductMaster::whereNull('deleted_at')->get();

        return view('admin.product_description.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required|exists:product_masters,id',
            'description_title' => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'product.required' => 'Please select a product.',
            'product.exists' => 'The selected product does not exist.',
            'description_title.required' => 'Description title is required.',
            'description_title.string' => 'Description title must be a valid string.',
            'description_title.max' => 'Description title may not exceed 255 characters.',
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a valid string.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        $productDescription = ProductDescription::findOrFail($id);
        $productDescription->update([
            'product_master_id' => $request->product,
            'title' => $request->description_title,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('product-description.index')
            ->with('success', 'Product description updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productDescription = ProductDescription::find($id);
        if (empty($productDescription)) {
            return response()->json([
                'result' => false,
                'message' => "Product Description Not Found."
            ]);
        }
        $productDescription->delete();

        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }
}
