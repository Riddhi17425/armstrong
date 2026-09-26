<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Str;
use DataTables;
class ClientController extends Controller
{
    public function index(){
        return view('admin.client.index');
    }

    public function createClient(){
        return view('admin.client.create');
    }

    public function ClientStore(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'description'    => 'required|string|max:500',
            'designation'   => 'required|string|max:255',
            'rating'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'status'  => 'nullable|in:Active,In-Active',
            'alt'     => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            
            $client = Client::create([
                'name'   => $request->name,
                'description'   => $request->description,
                'designation' => $request->designation,
                'rating' => $request->rating,
                'status' => $request->status,
                'title'  => $request->title,
                 'alt' => $request->alt,
            ]);
            return redirect()->route('client')->with('success', 'Client created successfully!');
        } catch (\Exception $e) {
            \Log::error('ClientStore error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create client: ' . $e->getMessage());
        }
    }

    public function getClientData()
    {
        $client = Client::whereNull('deleted_at')->select([
        'id', 'name', 'title', 'description', 'designation','rating', 'status', 'alt'
    ])->get();
        return DataTables::of($client)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                
                $editUrl = route('client.edit', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-outline-primary btn-sm">
                        <i class="icofont-edit"></i>
                    </a>
                    <button type="button" class="btn btn-outline-danger btn-sm delete_client" data-id="' . $row->id . '">
                        <i class="icofont-ui-delete"></i>
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function EditClient($id){
        $client = Client::find($id);
        return view('admin.client.edit' , compact('client'));
    }

    public function DestoryClient($id){
        $client = Client::find($id);
        if(empty($client)){
            return response()->json([
                'result' => false,
                "message" => "Client Not Found."
            ]);
        }
        $client->delete();
        return response()->json([
            'result' => true,
            'message' => "Data Deleted."
        ]);
    }


    public function UpdateClient(Request $request, $id)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            //'description'    => 'required|string|max:500',
            'designation'   => 'required|string|max:255',
            'rating'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'status'  => 'nullable|in:Active,In-Active',
            'alt'     => 'required|string|max:255',
            'description'       => [
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
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the highlighted errors.');
        }

        try {
            $client = Client::findOrFail($id); 
            
            $client->update([
                'name'   => $request->name,
                'description'   => $request->description,
                'designation' => $request->designation,
                'rating' => $request->rating,
                'status' => $request->status,
                'title'  => $request->title,
                'alt' => $request->alt,
            ]);

            return redirect()->route('client')->with('success', 'Client updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Client update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update client: ' . $e->getMessage());
        }
    }

}
