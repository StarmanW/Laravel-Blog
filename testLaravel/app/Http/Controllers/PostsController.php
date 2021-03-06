<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        /*
         * Retrieve all posts and return to the index.blade.php page in
         * views > posts
         * Alternate way to get records is Post::all();
         */

        //DB::select('SELECT * FROM POSTS'):                    //SQL way to query data
        //Post::orderBy('title', 'desc')->get();                //Order by title descending
        //Post::orderBy('title', 'desc')->take(2)->get();       //Take 2 records only
        //Post::where('title', 'Post Two')->get();              //Get a specific post by a specific title

        return view('posts.index')->with('posts', Post::orderBy('created_at', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //Authentication check
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login to create post');
        } else {
            return view('posts.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|regex:/[A-z0-9\@\#\$\%\&\!\[\]\'\: ]+/',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle file upload
        if ($request->hasFile('cover_image')) {
            //Get filename
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store, add timestamp for uniqueness of images that
            //might have the same name.
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //Upload Image
            /*
             * By default, storage folder is not accessible.
             * Required to run "php artisan storage:link" command to create a sym link
             * between the storage folder and the public folder.
             */
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'default_cover.jpg';
        }

        //Create a Post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = \auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        //Redirect back to page
        return redirect('/posts')->with('success', 'Post (' . $post->title . ') has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //$id is retrieve from the URL param
        return view('posts.show')->with('post', Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //Authentication check
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login to edit post');
        } else {
            $post = Post::find($id);

            if (Auth::user()->id === $post->user_id) {
                return view('posts.edit')->with('post', $post);
            } else {
                return redirect('/posts/' . $id)->with('error', 'Cannot edit other user\'s post');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => ['required'],
            'body' => ['required']
        ]);

        $post = Post::find($id);

        if (Auth::user()->id === $post->user_id) {

            //Handle file upload
            if ($request->hasFile('cover_image')) {
                //Get filename
                $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

                //Get just filename
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                //Get just extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();

                //Filename to store, add timestamp for uniqueness of images that
                //might have the same name.
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

                //Upload Image
                /*
                 * By default, storage folder is not accessible.
                 * Required to run "php artisan storage:link" command to create a sym link
                 * between the storage folder and the public folder.
                 */
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            }

            //Update the Post
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            if ($request->hasFile('cover_image')) {
                $post->cover_image = $fileNameToStore;
            }
            $post->save();

            //Redirect back to page
            return redirect('/posts/' . $post->id)->with('success', 'Post (' . $post->title . ') has been successfully updated!');
        } else {
            return redirect('/posts/' . $id)->with('error', 'Cannot update other user\'s post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Authentication check
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login to delete post');
        } else {
            $post = Post::find($id);

            if (Auth::user()->id === $post->user_id) {

                //Validate image name.
                //If not default image, delete it; else keep it.
                if($post->cover_image !== 'default_cover.jpg') {
                    //Delete the image
                    Storage::delete('public/cover_images/' . $post->cover_image);
                }

                $post->delete();
                return redirect('/posts')->with('success', 'Post (' . $post->title . ') has been successfully deleted!');
            } else {
                return redirect('/posts/' . $id)->with('error', 'Cannot delete other user\'s post');
            }
        }
    }

}
