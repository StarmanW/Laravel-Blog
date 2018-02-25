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
            'services' => ['Good Blogging Site', 'Top-notch user blogging experience :3', 'We have good <a target="_blank" href="https://i.imgur.com/Entxsw6.jpg" style="font-size: 120%"><b>meme</b></a>', 'Some Third Services that I\'m out of idea ;w;']
        );

        return view('pages.services')->with($data);
    }

    //Returns the login page
    public function login() {
        return view('auth.login');
    }

    //Returns the register page
    public function register() {
        return view('auth.register');
    }

    //Returns the register page
    public function passReset() {
        return view('auth.passwords.reset');
    }

}
