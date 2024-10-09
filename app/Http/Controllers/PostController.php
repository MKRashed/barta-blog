<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Auth;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');

        $user =  Auth::user();

        $posts = Post::whereHas('user', function ($query) use ($search) {
            $query->where('first_name', 'like', "%{$search}%")
                ->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.dashboard', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:5000',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'auth_id' => auth()->id(),
            'body' => $request->input('body'),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => ['required', 'string'],
        ]);

        $post->update($validated);

        return back()
            ->with([
                'message' => 'Post successfully posted!',
            ])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
