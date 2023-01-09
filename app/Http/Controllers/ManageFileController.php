<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Crypt;

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
        $path2 = $request->path . "\\" . $request->folder_name;

        // File::makeDirectory($path);



        if(!File::isDirectory($path2)){
            File::makeDirectory($path2, 0777, true, true);
        }

        $path = $request->path;
        $files = File::files($path);

        // dd($files->getFilename);
        $filesInFolder = File::files($path);
        $x = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));

        // return view('manage_file')->with(['path' => $path] );
        return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }

    public function createFile(Request $request){


        $request->validate([
            'file' => 'required|mimes:pdf',
        ],
        [
            'file.mimes' => 'File must be .pdf',
            'file.required' => 'File must be filled',
        ]
        );

        $path = $request->path;
        // dd($request->file);
        // dd($request->file);
		// $request->file->move($path,$request->file);


        $file = $request->file;

        $filename = $file->getClientOriginalName();

        $file->move($path, $filename);


        $files = File::files($path);
        // dd($files->getFilename);
        $filesInFolder = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));

        return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }


    public function deleteFile(Request $request){
        // dd($request->path);

        File::delete( $request->path);

        $path = $request->path;

        $parts  = explode('\\', $path);



        $path = '';

        array_pop($parts);

        foreach ($parts as &$piece){

            $path = join('/', $parts);
        }

        $files = File::files($path);
        // dd($files->getFilename);
        $filesInFolder = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));

        // return view('manage_file')->with(['path' => $path] );
        return redirect('manage_file')->with(compact('folders', 'files', 'directories', 'path'));
        // return redirect()->back();
        // return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }

    public function deleteFolder(Request $request){
        File::deleteDirectory($request->path);

        $path = $request->path;

        $parts  = explode('\\', $path);


        $path = array_pop($parts);

        foreach ($parts as &$piece){

            $path = join('/', $parts);
        }


        $files = File::files($path);
        // dd($files->getFilename);
        $filesInFolder = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));

        // return view('manage_file')->with(['path' => $path] );
        return redirect()->back()->with(compact('folders', 'files', 'directories', 'path'));
        // return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }


    public function downloadFile(Request $request) : BinaryFileResponse
    {
        return response()->download($request->path);
    }

    public function folderClick($path)
    {
        // $path = 'D:\myfiles' . "\\" . $file;

        $files = File::files($path);
        // dd($files->getFilename);
        $filesInFolder = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));

        // return view('manage_file')->with(['path' => $path] );
        return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }

    public function folderBack($path)
    {
        // $path = 'D:\myfiles' . "\\" . $file;
        // dd($path);
        $path = Crypt::decrypt($path);


        $parts  = explode('/', $path);

        $path = '';

        array_pop($parts);

        foreach ($parts as &$piece){

            $path = join('/', $parts);
        }



        $files = File::files($path);
        // dd($files->getFilename);
        $filesInFolder = File::files($path);


        $folders = File::directories($path);


        // dd($files);
        $directories = array_map('basename', File::directories($path));
        // dd($path);

        // if($path == 'D:/myfile'){
        //     dd("sama");
        // }
        // else{
        //     dd("beda");
        // }

        // return view('manage_file')->with(['path' => $path] );
        return view('manage_file', compact('folders', 'files', 'directories', 'path'));
    }


}
