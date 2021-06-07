<?php

namespace App\Http\Controllers;

use App\Models\upload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class FileUploadController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('fileUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
           
        $images = $request->file('images');
        if ($request->hasFile('images')) :
                foreach ($images as $item):
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $imageName = $time . '-' . $item->getClientOriginalName();
                    $item->move(public_path() . '/img/product/', $imageName);
                    $arr[] = $imageName;
                    $image = new upload();
                    $image->product_id=1;
                    $image->path=$imageName;
                    $image->save();
                endforeach;
                $image = implode(",", $arr);
        else:
                $image = '';
        endif;
        
        
        
        
        
                
    
    }       
        
}
