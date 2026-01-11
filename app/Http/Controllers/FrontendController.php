<?php
namespace App\Http\Controllers;

use App\Models\Skill;

class FrontendController extends Controller
{
    public function home()
    {

        $skills = Skill::all();

        $name = "Saidur";

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
    }
}
