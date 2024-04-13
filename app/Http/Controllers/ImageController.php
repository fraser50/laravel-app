<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function store(Request $request): RedirectResponse {
        $imageFile = $request->file("image");
        $filePath = $imageFile->store("uploads", "public");

        $title = $request->post("title");
        $desc = $request->post("desc");

        $image = new Image;
        $image->title = $title;
        $image->description = $desc;
        $image->fileName = $filePath;

        $image->save();

        return redirect("/");
    }

    public function index(Request $request) {
        return view("images", ["images" => Image::all()]);
    }

    public function get(int $id) {
        $image = Image::where('id', $id)->first();

        if (empty($image)) {
            return "That image does not exist";
        }

        return view("viewimage", ["image" => $image]);
    }
}
