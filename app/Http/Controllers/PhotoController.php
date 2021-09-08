<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = '';
        $users = User::where('id', '=', auth()->user()->id)->has('roles')->with('roles')->get();
        foreach ($users as $user) {
            foreach ($user->roles as $roles) {
                $role = $roles->name;
            }
        }

        if ($role == 'admin') {
            $photo = Photo::orderBy('id', 'desc')->with('comment')->paginate(10);
            return view('user.photos.index', compact(['photo']));
        } else {
            $photo = Photo::orderBy('id', 'desc')->where('user_id', '=', auth()->user()->id)->with('comment')->paginate(10);
            return view('user.photos.index', compact(['photo']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.photos.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = Photo::create([
            'title',
            'description',
            'privacy',
            'date',
            'view',
            'user_id' => auth()->user()->id,
        ] + $request->all());

        if ($request->file('image_path')) {
            $photo->image_path = $request->file('image_path')->store('photos', 'public');
            $photo->save();
        }
        return back()->with('status', 'Create successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo =  Photo::find($id);
        return view('user.photos.photo.show', compact(['photo']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('user.photos.photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());
        if ($request->file('image_path')) {
            Storage::disk('public')->delete($photo->image_path);
            $photo->image_path = $request->file('image_path')->store('photos', 'public');
            $photo->save();
        }
        return back()->with('status', 'Update was successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Photo::where('id', $id)->delete();
        return back()->with('status', 'It was successfully deleted');
    }
}
