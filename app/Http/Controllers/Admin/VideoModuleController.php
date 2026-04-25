<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Log;
use DataTables;
class VideoModuleController extends Controller
{
    public function index(){
        return view('admin.video.index');
    }
    public function create(){
        return view('admin.video.create');
    }

    public function chunkUpload(Request $request)
    {

        $fileName    = $request->input('fileName');
        $chunkNumber = (int) $request->input('chunkNumber');
        $totalChunks = (int) $request->input('totalChunks');

        // Temp folder for chunks
        $tempPath = public_path("chunks/{$fileName}");
        if (!is_dir($tempPath)) {
            mkdir($tempPath, 0777, true);
        }

        // Save the chunk
        $uploadedFile = $request->file('file');
        if (!$uploadedFile) {
            // Log::error("No chunk file received", ['chunkNumber' => $chunkNumber]);
            return response()->json(['success' => false, 'error' => 'No file received']);
        }

        $chunkFile = $tempPath . "/chunk_" . $chunkNumber;
        file_put_contents($chunkFile, $uploadedFile->get());
        // Log::info("Chunk saved", ['chunkPath' => $chunkFile]);

        // If last chunk -> merge
        if ($chunkNumber === $totalChunks) {
            // Log::info("Merging all chunks", ['fileName' => $fileName]);

            $finalDir = public_path("admin/videos");
            if (!is_dir($finalDir)) {
                mkdir($finalDir, 0777, true);
            }

            $finalPath = $finalDir . "/" . $fileName;
            $finalFile = fopen($finalPath, "w");

            for ($i = 1; $i <= $totalChunks; $i++) {
                $chunk = $tempPath . "/chunk_" . $i;
                if (!file_exists($chunk)) {
                    // Log::error("Missing chunk", ['chunk' => $chunk, 'i' => $i]);
                    return response()->json(['success' => false, 'error' => "Missing chunk {$i}"]);
                }
                fwrite($finalFile, file_get_contents($chunk));
                unlink($chunk); // delete chunk
            }
            fclose($finalFile);
            rmdir($tempPath);

            // Log::info("Final video created", ['videoPath' => "admin/videos/{$fileName}"]);

            return response()->json([
                'success'  => true,
                'filePath' => "public/admin/videos/{$fileName}" // relative path stored in DB
            ]);
        }

        return response()->json([
            'success'        => true,
            'chunkUploaded'  => $chunkNumber,
        ]);
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'video_title'      => 'required|string|max:255',
            'video_source'     => 'required|in:upload,youtube',
            'video_status'     => 'required|in:Active,In-Active',
            'video_desc'       => 'required|string',
            'thumbnails_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($request->video_source === 'youtube') {
            $rules['youtube_link'] = 'required|url';
        } elseif ($request->video_source === 'upload') {
            $rules['uploaded_video_path'] = [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // If user sends "public/admin/videos/..." → strip leading public/
                    $normalized = str_starts_with($value, 'public/')
                        ? substr($value, 7)
                        : $value;

                    $fullPath = public_path($normalized);

                    if (!file_exists($fullPath)) {
                        $fail("Uploaded video file is missing. Please re-upload.");
                    }
                }
            ];
        }
        $validated = $request->validate($rules);
        // return $rules;/

        // ✅ Resolve video path
        $videoPath = $request->video_source === 'youtube'
            ? $validated['youtube_link']
            : $validated['uploaded_video_path'];

        // ✅ Handle Thumbnail
        $imageName = null;
        $thumbnails_image = '';
        if ($request->hasFile('thumbnails_image')) {
            $image = $request->file('thumbnails_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/videos/images'), $imageName);

            $thumbnails_image = 'public/admin/videos/images/' . $imageName;
        }

        // ✅ Save in DB
        $video = new Video();
        $video->video_title       = $validated['video_title'];
        $video->thumnail_image    = $thumbnails_image;
        $video->video_source      = $validated['video_source'];
        $video->video             = $videoPath;
        $video->status            = $validated['video_status'];
        $video->video_description = $validated['video_desc'];
        $video->save();

        Log::info("Video saved to database", ['id' => $video->id]);

        return redirect()->route('admin.video')->with('success', 'Video saved successfully!');
    }

    public Function getVideoeData(){
        $video_data = Video::whereNull('deleted_at')->get(); 
        return DataTables::of($video_data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('admin.video.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_video" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function Edit($id){
        $videoData = Video::find($id);
        return view('admin.video.edit' , compact('videoData'));
    }


    // public function update(Request $request, $id)
    // {
    //     $video = Video::findOrFail($id);
    //     $rules = [
    //         'video_title'      => 'required|string|max:255',
    //         'video_source'     => 'required|in:upload,youtube',
    //         'video_status'     => 'required|in:Active,In-Active',
    //         'video_desc'       => 'required|string',
    //         'thumbnails_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ];

    //     if ($request->video_source === 'youtube') {
    //         $rules['youtube_link'] = 'required|url';
    //     } elseif ($request->video_source === 'upload') {
    //         // return 1;
    //         $rules['uploaded_video_path'] = [
    //             'nullable',
    //             'string',
    //             function ($attribute, $value, $fail) {
    //                 if ($value) {
    //                   $normalized = str_starts_with($value, 'public/')
    //                     ? substr($value, 7)
    //                     : $value;

    //                     $fullPath = public_path($normalized);
    //                     if (!file_exists($fullPath)) {
    //                         $fail("Uploaded video file is missing. Please re-upload.");
    //                     }
    //                 }
    //             }
    //         ];
    //     }
        
    //     $validated = $request->validate($rules);
        
    //     // ✅ Handle video source
    //     if ($validated['video_source'] === 'youtube') {
    //         $videoPath = $validated['youtube_link'];
    //     } else {
    //         // keep old video if not uploading new
            
    //         $videoPath = $request->uploaded_video_path ?: $video->video;
    //         // return 1;
    //     }
        
    //     // ✅ Handle thumbnail replacement
    //     $imageName = $video->thumnail_image; // keep old by default
    //     $thumbnails_image = $video->thumnail_image;
    //     if ($request->hasFile('thumbnails_image')) {
    //         // delete old if exists
    //         if ($imageName && file_exists(public_path('admin/videos/images/' . $imageName))) {
    //             unlink(public_path('admin/videos/images/' . $imageName));
    //         }

    //         $image = $request->file('thumbnails_image');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('admin/videos/images'), $imageName);
    //         $thumbnails_image = 'public/admin/videos/images/' . $imageName;
    //     }

    //     // ✅ Update DB
    //     $video->video_title       = $validated['video_title'];
    //     $video->thumnail_image    = $thumbnails_image;
    //     $video->video_source      = $validated['video_source'];
    //     $video->video             = $videoPath;
    //     $video->status            = $validated['video_status'];
    //     $video->video_description = $validated['video_desc'];
    //     $video->save();

    //     Log::info("Video updated successfully", ['id' => $video->id]);

    //     return redirect()->route('admin.video')->with('success', 'Video updated successfully!');
    // }
    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $video = Video::findOrFail($id);
        $request->merge([
            'video_desc' => trim($request->video_desc),
        ]);

        $rules = [
            'video_title'      => 'required|string|max:255',
            'video_source'     => 'required|in:upload,youtube',
            'video_status'     => 'required|in:Active,In-Active',
            'video_desc'       => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // remove all HTML tags and whitespace
                    $plainText = trim(strip_tags($value));
                    if ($plainText === '') {
                        $fail("Description cannot be blank.");
                    }
                },
            ],
            'thumbnails_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];


        if ($request->video_source === 'youtube') {
            $rules['youtube_link'] = 'required|url';
        } elseif ($request->video_source === 'upload' || !empty($request->uploaded_video_path)) {
                if($video->video_source === 'youtube'){
                    $rules['uploaded_video_path'] = [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            if ($value) {
                               $normalized = str_starts_with($value, 'public/')
                                ? substr($value, 7)
                                : $value;
        
                                $fullPath = public_path($normalized);
                                if (!file_exists($fullPath)) {
                                    $fail("Uploaded video file is missing. Please re-upload.");
                                }
                            }
                        }
                    ];

                }
            
            
        }
        
        $validated = $request->validate($rules);
        // return $rules;
        // ✅ Handle video source
        if ($validated['video_source'] === 'youtube') {
            $videoPath = $validated['youtube_link'];
        } else {
            // keep old video if not uploading new
            
            $videoPath = $request->uploaded_video_path ?: $video->video;
            // return 1;
        }
        
        // ✅ Handle thumbnail replacement
        $imageName = $video->thumnail_image; // keep old by default
        $thumbnails_image = $video->thumnail_image;
        if ($request->hasFile('thumbnails_image')) {
            // delete old if exists
            if ($imageName && file_exists(public_path('admin/videos/images/' . $imageName))) {
                unlink(public_path('admin/videos/images/' . $imageName));
            }

            $image = $request->file('thumbnails_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/videos/images'), $imageName);
            $thumbnails_image = 'public/admin/videos/images/' . $imageName;
        }

        // ✅ Update DB 
        $video->video_title       = $validated['video_title'];
        $video->thumnail_image    = $thumbnails_image;
        $video->video_source      = $validated['video_source'];
        $video->video             = $videoPath;
        $video->status            = $validated['video_status'];
        $video->video_description = $validated['video_desc'];
        $video->save();

        Log::info("Video updated successfully", ['id' => $video->id]);

        return redirect()->route('admin.video')->with('success', 'Video updated successfully!');
    }

    public function Destory($id){
        $video = Video::find($id);
        if(!$video){
            return response()->json([
                'result' => false,
                'message' => 'Data Not Found',
            ]);
        }
        $video->delete();
        return response()->json([
                'result' => true,
                'message' => 'Data Deleted SuccessFully.',
            ]);
    }
}
