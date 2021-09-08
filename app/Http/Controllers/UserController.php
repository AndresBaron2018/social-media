<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Location;
use App\Photo;
use App\User;


class UserController extends Controller
{
    public function index()
    {
        $photos = Photo::get();
        $locations = Location::get();
        $location = Location::orderBy('id', 'desc')->paginate(10);
        return view('user.indexCRUD', compact('locations', 'photos', 'location'));
    }

    public function show()
    {
        $locations = Location::get();
        $location = Location::orderBy('id', 'desc')->paginate(10);

        $role = '';
        $users = User::where('id', '=', auth()->user()->id)->has('roles')->with('roles')->get();
        foreach ($users as $user) {
            foreach ($user->roles as $roles) {
                $role = $roles->name;
            }
        }
        // dd($role);
        if ($role == 'admin') {
            $albums = Album::get();
        } else {
            $albums = Album::where('id_user', '=', auth()->user()->id)->get();
        }
        if ($role == 'admin') {
            $photos = Photo::orderBy('id', 'desc')->with('comment')->paginate(10);
        } else {
            $photos = Photo::orderBy('id', 'desc')->where('user_id', '=', auth()->user()->id)->with('comment')->paginate(10);
        }



        return view('user.index', compact('locations', 'photos', 'location', 'albums'));
    }
}
