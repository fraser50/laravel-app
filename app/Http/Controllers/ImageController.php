<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function store(Request $request): RedirectResponse {
        //return redirect("/");
        $files = $request->files;
        error_log("stuff");
        foreach ($files->keys() as $f) {
            error_log("Filename: $f");
        }

        $imageFile = $request->file("image");
        $filePath = $imageFile->store("uploads", "public");

        // TODO: File upload

        $title = $request->post("title");
        $desc = $request->post("desc");

        $image = new Image;
        $image->title = $title;
        $image->description = $desc;
        $image->fileName = $filePath;

        $image->save();

        return redirect("/");
    }
}
