<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {
    //Returns the main index page
    public function index() {
        $title = 'StarmanW\'s Blog';    //Add the title for index.blade.php
        return view('pages.index')->with('title', $title);
    }

    //Returns the about page
    public function about() {
        $title = 'About Us';    //Add the title for about.blade.php
        return view('pages.about')->with('title', $title);
    }

    //Returns the services page
    public function services() {
        $data = array(          //Add the title for services.blade.php
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );

        return view('pages.services')->with($data);
    }
}
