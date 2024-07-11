<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function create()
    {
        $user = new User();
        $tags = Tag::all();
        return view('user.create', compact('user', 'tags'));
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        // Debo tambien buscar las tags que el usuario ya tiene
        $user = User::findOrFail($id);
        $userTags = $user->tags()->get();
        $tags = Tag::all();
        return view('user.edit', compact('user', 'tags', 'userTags'));
    }

    public function update(UserRequest $request, User $user)
    {


        //   array:4 [▼ // app/Http/Controllers/UserController.php:55
        //   "_method" => "PATCH"
        //   "_token" => "PSREdG4DhCf1TFKijW1tCoGMLLxeeQMRQ7vfB3RD"
        //   "name" => "Andres"
        //   "tags" => array:2 [▼
        //     0 => "7"
        //     1 => "8"
        //   ]
        // ]


        $user->name = $request->input('name');

        // Actualizar las tags asociadas al usuario
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $user->tags()->sync($tags);
        } else {
            // Si no se selecciona ninguna tag, desasociar todas las existentes
            $user->tags()->detach();
        }

        $user->save();
        // $user->update($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function editTags(User $user)
    {
        $tags = Tag::all();
        $userTags = $user->tags()->pluck('tags.id')->toArray();

        return view('user.editTags', compact('user', 'tags', 'userTags'));
    }

    public function updateTags(Request $request, User $user)
    {
        $request->validate([
            'tags' => 'required|array',
        ]);

        $user->tags()->sync($request->tags);

        return redirect()->route('users.index')->with('success', 'Tags updated successfully.');
    }
}
