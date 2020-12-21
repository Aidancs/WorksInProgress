<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function imageUpload()
    {
        $images = Image::get();
        // ddd($images);
        return view('image_upload', compact('images'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image_title' => 'required|string',
            'image_location' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->image_title);
        $time = preg_replace("/[^a-zA-Z0-9]+/", "", now()->toDateTimeString());

        $image_location = $name.'_'.$time.'.'.$request->image_location->extension();

        $request->image_location->move(public_path('images'), $image_location);

        Image::create([
            'image_title' => $request->image_title,
            'image_location' => $image_location,
        ]);

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image_location', $image_location);
    }
}
