<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tempImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class tempImageController extends Controller
{
    public function store(Request $request){
        if (!empty($request->image)) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();

            $tempImage = new tempImage();
            $tempImage->name = 'NULL';
            $tempImage->save();

            $imageName = $tempImage->id.'.'.$ext;

            $tempImage->name = $imageName;
            $tempImage->save();

            $image->move(public_path('uploads/temp/'),$imageName);

            // Crete Thumnail
                $sourcePath = public_path('uploads/temp/'.$imageName);
                $destPath = public_path('uploads/temp/thumb/'.$imageName);
                $img = Image::make($sourcePath);
               
                $img->fit(350,300);
                $img->save($destPath);


            return response()->json([
            'status' => true,
            'image_id' => $tempImage->id,
            'name' => $imageName,
            'imagePath' => asset('uploads/temp/thumb/'.$imageName)
]);
        }
    }
    public function deleteTempImage($image_id){
        $tempImage = tempImage::find($image_id);
        File::delete(public_path('uploads/temp/'.$tempImage->name));
        File::delete(public_path('uploads/temp/thumb/'.$tempImage->name));
        $tempImage->delete();
        return response()->json([
            'tempImage'=> public_path('uploads/temp/'.$tempImage->name),
            'thumbNail'=>public_path('uploads/temp/thumb'.$tempImage->name),
            'status'=>'Deleted',
        ]);
    }
}
