<?php
namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function skill()
    {
        return view('skill');
    }

    public function skillStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            "name"       => "required|string|max:100",
            "sub_skills" => "required|string|max:255",
            "image"      => "required|max:2048|mimes:png,jpg,svg",
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            //generate the file name
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            //store the file in the root public
            $image     = $request->file('image')->move(public_path('skills'), $fileName);
            $imagePath = 'skills/' . $fileName;

        } else {
            $imagePath = null;
        }

        // save to database
        $skill = Skill::create([
            'name'       => $request->name,
            'sub_skills' => $request->sub_skills,
            'image'      => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');

    }


    public function project()
    {
        return view('project');
    }

    public function projectStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            "name"       => "required|string|max:100",
            "sub_skills" => "required|string|max:255",
            "image"      => "required|max:2048|mimes:png,jpg,svg",
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            //generate the file name
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            //store the file in the root public
            $image     = $request->file('image')->move(public_path('skills'), $fileName);
            $imagePath = 'skills/' . $fileName;

        } else {
            $imagePath = null;
        }

        // save to database
        $skill = Skill::create([
            'name'       => $request->name,
            'sub_skills' => $request->sub_skills,
            'image'      => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');

    }



}
