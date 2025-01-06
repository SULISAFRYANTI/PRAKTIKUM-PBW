<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest; // Pastikan ini ada jika Anda menggunakan UserRequest
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('users.form', [
            'user' => new User(),
            'page_meta' => [
                'title' => 'Create new user',
                'method' => 'post',
                'url' => route('users.store'), // Sebaiknya gunakan route name untuk URL
                'submit_text' => 'Create',
            ],
        ]);
    }

    public function store(UserRequest $request)
    { 
        $validated = $request->validated();

        User::create($validated);

        return redirect('/users');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Edit user: ' . $user->name,
                'method' => 'put',
                'url' => route('users.update', $user), // Sebaiknya gunakan route name
                'submit_text' => 'Update',
            ],
        ]);
    }

        public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect('users');
        
    }
    
    
    
}
