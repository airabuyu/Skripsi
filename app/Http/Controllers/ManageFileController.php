<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ManageFileController extends Controller
{
    //


    public function index(){
        $path = 'D:\myfiles';
        $files = File::files($path);

        // dd($files->getFilename);
        $filesInFolder = File::files($path);
        $x = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));

        // dd($folders);
        // foreach($filesInFolder as $key => $path){
        //   $files = pathinfo($path);

        // //   dd(pathinfo($path));
        //   dd($files['extension']);
        //   $allMedia[] = $files['basename'];
        //   dd($files['basename']);
        // }





        // dd($filesInFolder);

        // dd($filesInFolder);

        return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }

    public function createFolder(Request $request){
        // dd($request->path);
        // dd($request->folder_name);
        $path = $request->path . "\\" . $request->folder_name;

        // File::makeDirectory($path);



        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        return redirect('manage_file');
    }

    public function createFile(Request $request){

        $path = 'D:\myfiles';
        // dd($request->file);
        // dd($request->file);
		// $request->file->move($path,$request->file);


        $file = $request->file;
        $path = 'D:\myfiles';
        $filename = $file->getClientOriginalName();

        $file->move($path, $filename);

        return redirect('manage_file');
    }


    public function deleteFile(Request $request){
        // dd($request->path);

        File::delete( $request->path);

        return redirect('manage_file');
    }

    public function deleteFolder(Request $request){
        File::deleteDirectory($request->path);

        return redirect('manage_file');
    }


    public function downloadFile(Request $request) : BinaryFileResponse
    {
        return response()->download($request->path);
    }

}
