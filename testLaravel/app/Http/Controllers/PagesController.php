<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller {
    //Returns the main index page
    public function index() {
        return view('pages.index');
    }

    //Returns the about page
    public function about() {
        return view('pages.about');
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

    /*
     * Get the value from the URL parameter
     * and echo it out
    public function getParam(Request $request) {
        echo $request->input('name');       //Also works if using $request->name;
    }
     */

    /* SANDBOX AREA */
    public function sandbox() {
        return view('sandbox.test')->with('test', '');
    }

}
