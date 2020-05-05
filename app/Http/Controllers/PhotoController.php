<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Photo;

class PhotoController extends Controller
{

    public function index(){
        $photos = Photo::all();
        return view ('web.layout', compact('photos'));
    }
    public function store(Request $request)
    {
        /*if ($request->file('photo')) {
            $avatar = $request->file('photo');
            $path = Storage::disk('public')->put('portadas', $avatar);
            Image::make($avatar)->resize(150, 150)->save($path);

            $photo = new Photo();
            $photo->title = $request->input('title');
            $photo->fill(['img' => asset($path)])->save();
            // $photo->img = $path;
            // $photo->save();
        }

        return "Guardado";*/

        if($request->file('photo')){
            $avatar = $request->file('photo');
            $img = Image::make($avatar)->resize(1366, 500);
            $name = time() . '.' . $avatar->getClientOriginalExtension();
            $path =  $avatar->move(public_path().'/imgs/', $name);
            $img->save($path);
        }

        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->img = $name;
        $photo->save();

        return "Guardado";


    }
}
