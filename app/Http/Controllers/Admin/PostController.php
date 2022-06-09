<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        $categories= Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:250',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'exists:tags,id',
            'image'=> 'nullable|image'
        ]);

        $postData = $request->all();
        $newPost = new Post();
        $newPost->fill($postData);

         // img path
         if(array_key_exists('image', $postData)){
        $img_path= Storage::put('uploads', $postData['image']);
        $postData['cover']= $img_path;
        }

        // add slug
        $slug=Str::slug($newPost->title);
        $alternativeSlug = $slug;

        $postFound = Post::where('slug', $slug)->first();

        $counter = 1;
        while($postFound){
            $alternativeSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $alternativeSlug)->first();
        }
        $newPost->slug = $alternativeSlug;
        $newPost->save();

         // add sync
        $newPost->tags()->sync($postData['tags']);



        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        // $category = Category::find($post->category_id);

        if($post){
            return view('admin.posts.show', compact('post'));
        }
        abort(404);
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
        $post = Post::find($id);
        $categories = Category::all();
        $tags= Tag::all();

        if($post){
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        }
        abort(404);
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
        $request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required',
            'category_id' => 'required|exists:categories,id',
            'tags'=>'exists:tags,id',
            'image'=> 'nullable|image'
        ]);
        $post = Post::findOrFail($id);
        $data = $request->all();

        // img path
        if(array_key_exists('image', $data)){
        $img_path= Storage::put('uploads', $data['image']);
        $data['cover']= $img_path;
        }

        // Add Sync

        $post->tags()->sync($post['tags']);

        $post->update($data);
        return redirect()->route('admin.posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

}
