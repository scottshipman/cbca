<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use EditorTrait;



    public function index(Request $request, Page $page)
    {
       $background="DJI_0101-min.jpg";
        if (Auth::check()) {
            return view('welcome')->with('background', $background);
        }

        return view('welcome')->with('background', $background);
    }

    public function about(Request $request, Page $page)
    {
        $background = "faith-mission.jpg";
        return view('about')->with('background', $background);
    }

    public function liveOakPark(Request $request, Page $page)
    {
        $background = "P1016604.jpg";
        return view('live-oak-park')->with('background', $background);
    }

    public function pier(Request $request, Page $page)
    {
        $background = "P1017040.jpg"; //P1016938.jpg  P1017066.jpg
        return view('pier')->with('background', $background);
    }

    public function cbca(Request $request, Page $page)
    {
        $background = "coastal.jpeg";
        return view('cbca')->with('background', $background);
    }

    public function cbce(Request $request, Page $page)
    {
        $background = "grasses.png";
        return view('cbce')->with('background', $background);
    }

    public function calendar(Request $request, Page $page)
    {
        $background = "events.png";
        return view('calendar')->with('background', $background);
    }

}