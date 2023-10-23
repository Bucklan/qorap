<?php

namespace App\Http\Controllers\Client\Open;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create', Comment::class);
        $validate = $request->validate([
            'text' => 'required',
            'gift_id' => 'required|numeric|exists:gifts,id'
        ]);
        Auth::user()->comments()->create($validate);
        return redirect()->back()->with('message', __('session.comment successfully created'));
    }

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        $categories = Category::whereNull('parent_id')->with('categories')->get();
        return view('comments.edit', ['comment' => $comment, 'categories' => $categories]);
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
//    { dd($request);
        $request->validate([
            'text' => 'required|max:255',
//            'gift_id'=>'required|numeric|exists:gifts,id'//$request->post->id
        ]);

        $comment->update([
            'text' => $request->text,
            'gift_id' => $comment->gift->id
        ]);
        return redirect()->route('gift.show', $comment->gift->id)->with('message', __('session.your comment successfully edited'));
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('message', __('session.Your comment successfully deleted'));
    }
//
}
