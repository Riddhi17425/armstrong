<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory; 
use DataTables;
use Str;

class ProductCategoryController extends Controller
{
    public function index(Request $request){
        return view('admin.product_category.index');
    }  

    public function getData(Request $request)
    {
        $categories = ProductCategory::select(['id', 'name', 'status', 'short_desc','meta_title','meta_description', 'created_at']);
        return DataTables::of($categories)
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" class="btn btn-outline-secondary edit_category" data-id="' . $row->id . '"><i class="icofont-edit text-success"></i></button>
                    <button type="button" class="btn btn-outline-secondary delete_category" data-id="' . $row->id . '"><i class="icofont-ui-delete text-danger"></i></button>
             
                ';
            })
            ->rawColumns(['action']) // allow HTML rendering
            ->make(true);
    }
    public function store(Request $request)
    {
        
        $exists = ProductCategory::where('name', $request->category_name)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Category name already exists.']);
        }
        
        $questions = $request->question ?? [];
            $answers = $request->answer ?? [];
            $question_answer = [];

            foreach ($questions as $index => $question) {
                if (empty(trim(strip_tags($question))) || empty(trim(strip_tags($answers[$index] ?? '')))) {
                    continue;
                }
                $question_answer[] = [
                    'question' => $question,
                    'answer' => $answers[$index],
                ];
            }

        $category = new ProductCategory();
        $category->name = $request->category_name;
        $category->short_desc = $request->short_desc;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->url = $request->url;
        $category->description = $request->description;
        $category->listing_desc = $request->listing_desc;
        $category->detail_description = $request->detail_description;
        $category->status = $request->category_status;
        $category->faqs = !empty($question_answer) ? $question_answer : null;
        
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = Str::uuid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('admin/productcategory'), $imageName);
            $image_url = 'public/admin/productcategory/'.$imageName;
        }

        if ($request->hasFile('category_small_image')) {
            $small_image = $request->file('category_small_image');
            $smallimageName = Str::uuid().'.'.$small_image->getClientOriginalExtension();
            $small_image->move(public_path('admin/productcategory/small/'), $smallimageName);
            $smallimage_url = 'public/admin/productcategory/small/'.$smallimageName;
        }


        $category->category_image = $image_url ?? null;
        $category->category_small_image = $smallimage_url ?? null;

        $category->save();

        return response()->json([
            'result' => true,
            'message' => 'Category Created Successfully.',
            'image' => $category->category_image ?? null // for debugging
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::find($id);
        if (!$category) {
            return response()->json(['result' => false, 'message' => 'Category not found.']);
        }

        // Optional: prevent name duplication
        $exists = ProductCategory::where('name', $request->category_name)->where('id', '!=', $id)->exists();
        if ($exists) {
            return response()->json(['result' => false, 'message' => 'Category name already exists.']);
        }
        
         $questions = $request->question ?? [];
            $answers = $request->answer ?? [];
            $question_answer = [];

            foreach ($questions as $index => $question) {
                if (empty(trim(strip_tags($question))) || empty(trim(strip_tags($answers[$index] ?? '')))) {
                    continue;
                }
                $question_answer[] = [
                    'question' => $question,
                    'answer' => $answers[$index],
                ];
            }

        $category->name = $request->category_name;
        $category->short_desc = $request->short_desc;
        $category->url = $request->url;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->description = $request->description;
        $category->listing_desc = $request->listing_desc;
        $category->detail_description = $request->detail_description;
        $category->status = $request->category_status;
         if (!empty($question_answer)) {
        $category->faqs = $question_answer;
          
         }
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = Str::uuid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('admin/productcategory'), $imageName);
            $image_url = 'public/admin/productcategory/'.$imageName;
            $category->category_image = $image_url ?? null;
        } 

        if ($request->hasFile('category_small_image')) {
            $small_image = $request->file('category_small_image');
            $smallimageName = Str::uuid().'.'.$small_image->getClientOriginalExtension();
            $small_image->move(public_path('admin/productcategory/small/'), $smallimageName);
            $smallimage_url = 'public/admin/productcategory/small/'.$smallimageName;
            $category->category_small_image = $smallimage_url ?? null;
        }


        $category->save();

        return response()->json([
            'result' => true,
            'message' => 'Category Updated Successfully.',
        ]);
    }
   public function edit($id)
{
    $category = ProductCategory::find($id);

    if (!$category) {
        return response()->json([
            'result' => false,
            'message' => 'Data Not Found',
        ]);
    }

    return response()->json([
        'result' => true,
        'message' => 'Data Found',
        'data' => [
            'id' => $category->id,
            'name' => $category->name,
            'short_desc' => $category->short_desc,
            'description' => $category->description,
            'listing_desc' => $category->listing_desc,
            'detail_description' => $category->detail_description,
            'url' => $category->url,
            'meta_title' => $category->meta_title,
            'meta_description' => $category->meta_description,
            'status' => $category->status,
            'category_image' => $category->category_image,
            'category_small_image' => $category->category_small_image,
        ],
        'faqs' => $category->faqs ?? [],
    ]);
}


    public function destroy($id){
        $get_data = ProductCategory::find($id);
        if(empty($get_data)){
            return response()->json([
                'result' => false,
                'message' => "Data Not Found",
            ]);
        }
        $get_data->delete();
        return response()->json([
            'result' => true,
            "message" => "Data Deleted SuccessFulyy.",
        ]); 
    }
}
