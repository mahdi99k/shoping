<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * @param Request $request
     * @return RedirectResponse
     * @var Product $product
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        Comment::query()->create([
            'user_id' => auth()->user()->id,   // just login user
            'product_id' => $product->id,
            'comment' => $request->get('comment'),
            'status' => '0',
        ]);

        return back()->with('success' , 'نظر شما با موفقیت ثبت شد و پس از تایید نمایش داده می شود');
    }

}
