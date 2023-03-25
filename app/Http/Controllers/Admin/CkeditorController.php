<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        // upload file
        $imageName = time().'-'.$request->upload->getClientOriginalName();
        $request->upload->move(public_path('ckeditor'), $imageName);

        //Show file in CKeditor
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('ckeditor/'.$imageName);
        $msg = 'Image successfully uploaded';
        $re ="<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        // Render HTML output
        @header('content-type: text/html; charset=utf-8');
        echo $re;

    }
}
