<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManageFileController extends Controller
{
    //


    public function インデクス(){
        $るうと = 'D:\myfiles';
        $files = File::files($るうと);

        // dd($filesInFolder);


        $folders = File::directories($るうと);

        // foreach($filesInFolder as $key => $path){
        //   $files = pathinfo($path);
        //   $allMedia[] = $files['basename'];
        // }




        // dd($filesInFolder);

        // dd($filesInFolder);

        return view('manage_file', compact('folders', 'files'));
    }
}
