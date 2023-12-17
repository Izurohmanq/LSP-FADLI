<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin === 'on' ? true : false
        ]);
        return redirect(route('users.index'));
    }
    public function edit(User $user)
    {
        // if (auth()->user()->id === $user->id) {
        //     return redirect(route('users.index'));
        // }
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2000'],
        ]);

        if ($request->hasFile('image')) {
            $oldImagePath = $user->image;

            // Delete old image
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }

            // Generate a unique filename for the image
            $image = fake()->uuid() . '.' . $request->file('image')->getClientOriginalExtension();

            // Move the uploaded file to the desired directory
            $request->file('image')->move(public_path('/img/images'), $image);

            // Set the image path for the user
            $user->image = "/img/images/$image";
        }

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect(route('users.index'))->with('success', 'User data updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->user()->id === $user->id) {
            return redirect(route('users.index'));
        }
        $user->delete();
        return back();
    }
}
