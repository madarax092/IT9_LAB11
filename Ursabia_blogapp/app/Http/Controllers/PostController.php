<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
     /**
     * Display lists of all posts.
     */
   public function index()
   {
    $post = Post::latest()->get();
    return view('posts.index', compact('posts'));
   }
   /**
    * Display show form.
    */
   public function create()
   {
    return view('posts.create');
   }

   /**
    * Store created post.
    */
   public function store(Request $request)
   {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required'
    ]);
    Post::create($validated);
    return redirect()->route('posts.index');
   }

   /**
    * Display single post.
    */
   public function show($id)
   {
    $post = Post::find($id);
    return view('posts.show', compact('post'));
   }

   /**
    * Display edit form.
    */	
   public function edit($id)
   {
    $post = Post::find($id);
    return view('posts.edit', compact('post'));
   }
   /**
    * Update post.
    */	
   public function update(Request $request, Post $post)
   {
    $validated = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required'
    ]);

    $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully.');
    }


}
