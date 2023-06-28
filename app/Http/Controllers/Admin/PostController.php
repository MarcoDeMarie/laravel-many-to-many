<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;
use App\Models\Technology;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = 'desc';
        $posts = Post::all();
        return view('admin.posts.index', compact('posts', 'direction'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $form_data = $request->all();

        $form_data['slug'] = Post::generateSlug($form_data['title']);
        $form_data['date'] = date('Y-m-d');

        if(array_key_exists('image', $form_data)){

            // if($post->image_path){
            //     Storage::disk('public')->delete($post->image_path);
            // }

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }

        $new_post = new Post();
        $new_post->fill($form_data);
        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image_path){
            Storage::disk('public')->delete($post->image_path);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', 'Post eliminato correttamente');
    }
}
