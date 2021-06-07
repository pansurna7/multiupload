<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\upload;
class UploadController extends Controller
{
    public  function upload()  
    {  
        return view('upload-view');  
    }  
    public  function uploadFile(Request $request)  
    {  
        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip'

    ]);
    
    
    if($request->hasfile('filename'))
     {

        foreach($request->file('filename') as $file)
        {
            $name=$file->getClientOriginalName();
            $file->move(public_path().'/files/', $name);  
            $data[] = $name;  
        }
     }

     $file= new Upload();
     $file->filename=json_encode($data);
     
    
    $file->save();

    return back()->with('success', 'Your files has been successfully added');       
    }
}
