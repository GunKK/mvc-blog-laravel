<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = $request->postId;
        $comment->NoiDung = $request->content;
        $comment->save();
        return redirect()->route('post.show', ['id' => $request->postId])->with('success', 'Gửi bình luận thành công');
    }

    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->NoiDung = $request->content;
        $comment->save();
        return redirect()->route('post.show', ['id' => $request->postId])->with('success', 'Cập nhật bình luận thành công');;
    }

    public function destroy(Request $request, string $comment)
    {
        $comment = Comment::findOrFail($comment)->delete();
        return redirect()->route('post.show', ['id' => $request->postId])->with('success', 'Xóa bình luận thành công');
    }
}
