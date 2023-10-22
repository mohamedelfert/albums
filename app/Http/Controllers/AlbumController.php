<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $image = Album::create([
            'name' => $request->name
        ]);

        if ($image) {
            if ($request->hasFile('image')) {
                $image->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }

        session()->flash('success', 'Image create successfully');

        return redirect()->route('albums.index');
    }

    public function edit($id)
    {
        $image = Album::findOrFail($id);

        return view('albums.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required']);

        $image = Album::find($id);
        $image->name = $request->name;
        $image->save();

        if ($image) {
            if ($request->hasFile('image')) {
                $image->clearMediaCollection('images');
                $image->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }

        session()->flash('success', 'Image Update successfully');

        return redirect()->route('albums.index');
    }

    public function destroy($id)
    {
        $image = Album::findOrFail($id);
        $image->delete();

        session()->flash('success', 'Image Delete successfully');

        return redirect()->route('albums.index');
    }
}
