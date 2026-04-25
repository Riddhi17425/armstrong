<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index');
    }

    public function createNews(){
        return view('admin.news.create');
    }

public function NewsStore(Request $request)
{
    // Step 1: Validation
    $validator = Validator::make($request->all(), [
        'title'               => 'required|string|max:255',
        'short_description'   => 'required|string|max:500',
        'detail_description'  => 'required|string',
        'date'                => 'required',     
        'url'                 => 'required|string',
        'front_image'         => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
        'detail_image'        => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
        'status'              => 'required|in:Active,In-Active',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        $frontImagePath = null;
        $detailImagePath = null;

        $uploadPath = public_path('admin/news/');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Step 2: Handle front_image upload
        if ($request->hasFile('front_image')) {
            $frontImage = $request->file('front_image');
            $frontName = \Str::slug(pathinfo($frontImage->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $frontImage->getClientOriginalExtension();
            $frontSavePath = $uploadPath . $frontName;

            if ($request->has('compress')) {
                $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $image = $manager->read($frontImage->getRealPath());
                $image->toJpeg(75)->save($frontSavePath);
            } else {
                $frontImage->move($uploadPath, $frontName);
            }

            $frontImagePath = 'public/admin/news/' . $frontName;
        }

        // Step 3: Handle detail_image upload
        if ($request->hasFile('detail_image')) {
            $detailImage = $request->file('detail_image');
            $detailName = \Str::slug(pathinfo($detailImage->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $detailImage->getClientOriginalExtension();
            $detailSavePath = $uploadPath . $detailName;

            if ($request->has('compress')) {
                $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $image = $manager->read($detailImage->getRealPath());
                $image->toJpeg(75)->save($detailSavePath);
            } else {
                $detailImage->move($uploadPath, $detailName);
            }

            $detailImagePath = 'public/admin/news/' . $detailName;
        }
        // Step 4: Store in DB
        News::create([
            'title'              => $request->title,
            'short_description'  => $request->short_description,
            'detail_description' => $request->detail_description,
            'date'               => date('Y-m-d', strtotime($request->input('date'))),
            'url'                => $request->url,
            'status'             => $request->status ?? 'Active',
            'front_image'        => $frontImagePath,
            'detail_image'       => $detailImagePath,
        ]); 
        return redirect()->route('news')->with('success', 'News created successfully!');
    } catch (\Exception $e) {
        \Log::error('NewsStore error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to create news: ' . $e->getMessage());
    }
}

    public function getNewsData()
    {
       $news = News::whereNull('deleted_at')->get();
         
        return DataTables::of($news)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('news.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_news" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditNews($id){
        $news = News::find($id);
        return view('admin.news.edit',compact('news'));
    }

    public function DestoryNews($id){
        $news = News::find($id);
        if(empty($news)){
            return response()->json([
                'result' => false,
                "message" => "Product Not Found."
            ]);
        }
        $news->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


public function UpdateNews(Request $request, $id)
{
    // Step 1: Validation
    $validator = Validator::make($request->all(), [
        'title'               => 'required|string|max:255',
        'short_description'   => 'required|string|max:500',
        'detail_description'  => 'required|string',
        'date'                => 'required',
        'url'                 => 'required|string',
        'front_image'         => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        'detail_image'        => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        'status'              => 'nullable|in:Active,In-Active',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Please fix the validation errors.');
    }

    try {
        // Step 2: Find existing record
        $news = News::findOrFail($id);

        $frontImagePath = $news->front_image;
        $detailImagePath = $news->detail_image;

        $uploadPath = public_path('admin/news/');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Step 3: Handle front_image upload
        if ($request->hasFile('front_image')) {
            // Delete old image
            if ($frontImagePath && file_exists(public_path(str_replace('public/', '', $frontImagePath)))) {
                unlink(public_path(str_replace('public/', '', $frontImagePath)));
            }

            $frontImage = $request->file('front_image');
            $frontName = \Str::slug(pathinfo($frontImage->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $frontImage->getClientOriginalExtension();
            $frontSavePath = $uploadPath . $frontName;

            if ($request->has('compress')) {
                $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $image = $manager->read($frontImage->getRealPath());
                $image->toJpeg(75)->save($frontSavePath);
            } else {
                $frontImage->move($uploadPath, $frontName);
            }

            $frontImagePath = 'public/admin/news/' . $frontName;
        }

        // Step 4: Handle detail_image upload
        if ($request->hasFile('detail_image')) {
            // Delete old image
            if ($detailImagePath && file_exists(public_path(str_replace('public/', '', $detailImagePath)))) {
                unlink(public_path(str_replace('public/', '', $detailImagePath)));
            }

            $detailImage = $request->file('detail_image');
            $detailName = \Str::slug(pathinfo($detailImage->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $detailImage->getClientOriginalExtension();
            $detailSavePath = $uploadPath . $detailName;

            if ($request->has('compress')) {
                $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
                $image = $manager->read($detailImage->getRealPath());
                $image->toJpeg(75)->save($detailSavePath);
            } else {
                $detailImage->move($uploadPath, $detailName);
            }

            $detailImagePath = 'public/admin/news/' . $detailName;
        }

        // Step 5: Update in DB
        $news->update([
            'title'              => $request->title,
            'short_description'  => $request->short_description,
            'detail_description' => $request->detail_description,
            'date'               => date('Y-m-d', strtotime($request->input('date'))),
            'url'                => $request->url,
            'status'             => $request->status ?? 'Active',
            'front_image'        => $frontImagePath,
            'detail_image'       => $detailImagePath,
        ]);

        return redirect()->route('news')->with('success', 'News updated successfully!');
    } catch (\Exception $e) {
        \Log::error('NewsUpdate error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update news: ' . $e->getMessage());
    }
}


}
