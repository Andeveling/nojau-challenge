<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $query = Tag::query();
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
        $tags = $query->paginate(8);

        return view('tag.index', compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * $tags->perPage());
    }

    public function create()
    {
        $tag = new Tag();
        return view('tag.create', compact('tag'));
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tag.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index')
            ->with('success', 'Tag updated successfully');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')
            ->with('success', 'Tag deleted successfully');
    }
}
