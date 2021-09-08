<?php

namespace App\Http\Controllers;

use App\Album;
use App\Location;
use App\Photo;
use App\User;

use Illuminate\Http\Request;

class AlbumController extends Controller
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
            $album = Album::orderBy('id', 'desc')->with('location', 'photo')->paginate(10);
            return view('user.albums.index', compact(['album']));
        } else {
            $album = Album::orderBy('id', 'desc')->where('id_user', '=', auth()->user()->id)->with('location', 'photo')->paginate(10);
            return view('user.albums.index', compact(['album']));
        }
    }
    // dd($users[0]->roles[0]->name);

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $albums = Album::with('allLocations', 'photo')->get();
        // dd($albums);
        $photos = Photo::get();
        $locations = Location::get();
        return view('user.albums.album.create', compact('locations', 'photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->id_location)) {
            return back()->with('status', 'you have to select a location');
        }
        $album = Album::create([
            'title',
            'description',
            'id_user' => auth()->user()->id,
            'id_location',
            'id_photo',
        ] + $request->all());
        return back()->with('status', 'Create successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album =  Album::find($id);
        return view('user.albums.album.show', compact(['album']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('user.albums.album.edit', compact(['album']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->update($request->all());
        return back()->with('status', 'Update was successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::where('id', $id)->delete();
        return back()->with('status', 'It was successfully deleted');
    }
}
