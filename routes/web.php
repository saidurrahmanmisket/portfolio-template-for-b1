<?php

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //create a skill
//    $skill = Skill::create([
//        'name' => 'Frontend'.rand(1,100),
//        'sub_skills' => 'PHP, Laravel, JavaScript',
//        'image' => 'programming.png',
//        'created_at' => now(),
//        'updated_at' => now(),
//    ]);
//    $skill->save();
    $skills = Skill::all();



//    dd($skills);
    $name = "Saidur";

//    $skills = ['Frontend', 'Backend', 'Design', 'Database', 'DevOps' , 'React'];
//    $skills = [
//        ['Frontend', '💻', 'HTML, CSS, JavaScript, React, Vue.js'],
//        ['Backend', '🌐', 'PHP, Laravel, SQL'],
//        ['Design', '🎨', 'Figma, Canva']
//    ];
    $about = "
    <p>
        I'm a passionate developer with a love for creating digital experiences
        that make a difference. With expertise in both frontend and backend technologies,
        I bring ideas to life through clean, efficient code.
    </p>
    <p>
        When I'm not coding, you can find me exploring new technologies,
        contributing to open-source projects, or sharing knowledge with the
        developer community.
    </p>
";

    $projectComplete = 80;

    return view('home', compact('name', 'skills', 'about', 'projectComplete'));
});

Route::get('/admin', function () {
    return view('admin');
});


Route::post('/admin/skills', function(Request $request) {
    // Validate the request data
    $request->validate([
        "name" => "required|string|max:100", 
        "sub_skills" => "required|string|max:255",
        "image" => "required|max:2048|mimes:png,jpg,svg"
    ]);

    // Handle file upload
    if ($request->hasFile('image')) {
       //generate the file name
         $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        //store the file in the root public 
        $image = $request->file('image')->move(public_path('skills'), $fileName);
        $imagePath = 'skills/' . $fileName;
        
    } else {
        $imagePath = null;
    }

    // save to database
    $skill = Skill::create([
        'name' => $request->name,
        'sub_skills' => $request->sub_skills,
        'image' => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Skill added successfully!');


})->name('admin.skills.store');