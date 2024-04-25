<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Group;
use App\Models\GroupImageMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        Auth::user()->images()->save($image);

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

        $comments = $image->comments()->orderBy('created_at', 'desc')->get();
        $groups = Group::all();

        return view("viewimage", ["image" => $image, "comments" => $comments, "groups" => $groups]);
    }

    public function addToGroup(Request $request, int $id) {
        $image = Image::where('id', $id)->first();
        $groupid = $request->post('addtogroup');

        if (empty($image)) {
            return "That image does not exist";
        }

        if ($groupid == "none") return redirect("/image/$id");

        $group = Group::where('id', $groupid)->first();

        if (empty($group)) return redirect("/image/$id");

        $membership = new GroupImageMember;

        $membership->group_id = $groupid;
        $membership->image_id = $id;

        $group->memberships()->save($membership);
        return redirect("/image/$id");
    }

    public function postComment(Request $request, int $id) {
        $image = Image::where('id', $id)->first();

        if (empty($image)) {
            return "That image does not exist";
        }

        $details = $request->validate([
            "message" => "required",
        ]);

        $comment = new Comment;
        $comment->comment_text = $details['message'];

        $image->comments()->save($comment);

        return redirect('/image/' . $id);

    }
}
