<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request) {
        return view("groups", ["groups" => Group::all()]);
    }

    public function store(Request $request): RedirectResponse {
        $details = $request->validate([
            "title" => "required|unique:groups",
            "description" => "required"
        ]);

        $title = $details['title'];
        $description = $details['description'];

        $group = new Group;
        $group->title = $title;
        $group->description = $description;

        $group->save();

        return redirect("/groups");
    }

    public function get(int $id) {
        return 'TODO';
    }
}
