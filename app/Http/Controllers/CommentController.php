<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $x = Album::with('location');
        // dd($x);
        $comment = Comment::orderBy('id', 'desc')->paginate(10);
        return view('user.comments.index', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::get();
        return view('user.comments.comment.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (empty($request->all())) {
        //     return back()->with('status', 'you have to fill all');
        // }
        Comment::create([
            'date',
            'content',
            'id_photo'
        ] + $request->all());
        return back()->with('status', 'Create successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment =  Comment::find($id);
        return view('user.albums.album.show', compact(['album']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment =  Comment::find($id);
        return view('user.comments.comment.edit', compact(['comment']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return back()->with('status', 'Update was successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id', $id)->delete();
        return back()->with('status', 'It was successfully deleted');
    }
}
