<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Product $product)
    {
        /** @var TYPE_NAME $product */
        return view('admin.productComments.index', [
            'product' => $product,
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.productComments.show', [
            'product' => $product,
            'comment' => Comment::all(),
        ]);
    }


    public function edit(Comment $comment)
    {
        return view('admin.productComments.edit', [
            'comment' => $comment,
        ]);
    }


    public function update(Comment $comment)
    {
        /*if ($request->get('status_1')) {
            $comment->update([
                'status' => '1',
            ]);
        } else {
            $comment->update([
                'status' => '0',
            ]);
        }

        $comment->update([
            'comment' => $request->get('comment'),
        ]);*/


        $comment->update([
            'status' => '1',
        ]);
        return back()->with('update', 'نظر کاربر با موفقیت به روزرسانی شد');
    }


    public function destroy(Comment $comment): \Illuminate\Http\RedirectResponse
    {
        $comment->delete();
//      $comment = Comment::query()->findOrFail($id)->delete();
//      Comment::destroy($id);
//      Comment::query()->where('id' , '=' , $id)->delete();
        return back()->with('delete', 'نظر کاربر با موفقیت حذف شد');
    }


}
