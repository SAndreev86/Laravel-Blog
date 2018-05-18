<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use App\Comment;
use UploadImage;
use Dan\UploadImage\Exceptions\UploadImageException;


class BlogController extends Controller
{

    public function index() {

        return view('public.index', [
            'articles' => Article::with('user')->with('categories')->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12)
        ]);
    }


    public function category($slug) {
        $category = Category::where('slug', $slug)->first();

        return view('public.category', [
            'category' => $category,
            'articles' => $category->articles()->with('user')->with('categories')->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12)
        ]);
    }

    public function user($id) {

        return view('public.user', [
            'articles' => Article::with('user')->with('categories')->where('created_by', $id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12),
        ]);
    }




    public function article($slug) {

        $article = Article::with('user')->where('slug', $slug)->first();

        return view('public.article', [
            'categories' => $article->categories()->where('published', 1)->get(),

            'article' => $article,

            'comments' => Comment::with('user', 'children')->where([
                ['article', $article->id],
                ['parent_id', '0']
            ])->get()
        ]);
    }
}
