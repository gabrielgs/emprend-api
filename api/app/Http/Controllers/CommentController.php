<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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
        return Comment::create($request->all());
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
