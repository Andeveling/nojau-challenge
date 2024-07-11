<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
        $users = $query->paginate(8);

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
        // Validar y crear el usuario
        $user = User::create($request->validated());

        // Sincronizar los tags seleccionados
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $user->tags()->sync($tags);
        }

        // Redireccionar
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
