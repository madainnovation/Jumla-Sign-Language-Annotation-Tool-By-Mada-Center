<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;

class FileController extends Controller
{
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $fileName = time().'.'.request()->file->getClientOriginalExtension();
        try {
            request()->file->move(public_path('files'), $fileName);
        }catch (Exception $exception){
            return response()->json(['error'=>$exception->getMessage()]);
        }


        return response()->json(['success'=>'You have successfully upload file.']);
    }
}
