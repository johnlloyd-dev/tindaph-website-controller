<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        $banner = Banner::orderby('id', 'asc')->get();
        return response()->json($banner);
    }


    public function store(Request $request){

        $request->validate([
           'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:500'
        ]);

        $fileUpload = new Banner;

        if($request->file()) {
            $path = Storage::disk('minio')->put('banner', $request->file('file'));
            Storage::disk('minio')->setVisibility($path, 'public');
            $fileUpload->filename = basename($path);
            $fileUpload->url = Storage::disk('minio')->url($path);
            $fileUpload->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }

   public function destroy($id)
   {
       $banner = Banner::find($id);
       $filename = Banner::select('filename')->where('id', $id)->get();
       Storage::disk('minio')->delete($filename);
       $banner->delete();
       return response()->json(['message' => 'Testimony has been sucessfully deleted']);
   }
}
