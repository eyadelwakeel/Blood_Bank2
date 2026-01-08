<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'content' => 'required|string',
            'photo'   => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('posts'), $photoName);

        Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'photo'       => $photoName,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $post = Post::findOrFail($id);

    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
        'photo'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->except('photo');

    // لو فيه صورة جديدة
    if ($request->hasFile('photo')) {

        // حذف الصورة القديمة
        if ($post->photo && file_exists(public_path('posts/' . $post->photo))) {
            unlink(public_path('posts/' . $post->photo));
        }

        // حفظ الصورة الجديدة
        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('posts'), $photoName);

        $data['photo'] = $photoName;
    }

    $post->update($data);

    return redirect()
        ->route('admin.posts.index')
        ->with('success', 'Post updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')
        ->with('success', 'Post deleted successfully.');
    }
}
