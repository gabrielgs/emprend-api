<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function show($id)
    {
        return Comment::find($id);
    }

    public function store(Request $request)
    {
        return Auth::user()->comments()->save(new Comment($request->all()));
    }

    public function update(Request $request, $id)
    {
        $article = Comment::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Comment::findOrFail($id);
        $article->delete();

        return 200;
    }
}
