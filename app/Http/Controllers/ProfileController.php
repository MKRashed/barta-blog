<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $posts = Post::where('auth_id', $user->id)->latest()->get();

        return view('admin.profile', compact('user', 'posts'));
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
        //
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
        $user = User::find($id);

        return view('admin.edit-profile', compact('user'));
    }


    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'bio' => ['nullable', 'string'],
        ]);

        $imagePath = $user->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $user->update($validated + [
                'image' => $imagePath,
            ]);
        } else {
            $user->update($validated);
        }

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }


    public function destroy(string $id)
    {
        //
    }
}
