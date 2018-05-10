<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;



class BlogController extends Controller
{

    public function index() {
        return view('public.index', [
            'articles' => Article::where('published', 1)->orderBy('updated_at', 'desc')->paginate(12)
        ]);
    }


    public function category($slug) {
        $category = Category::where('slug', $slug)->first();

        return view('public.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12)
        ]);
    }

    public function user($id) {

        return view('public.user', [
            'articles' => Article::where('created_by', $id)->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12),
            'user' => User::where('id', $id)->first()
        ]);
    }

    public function article($slug) {
        return view('public.article', [
            'article' => Article::where('slug', $slug)->first()
        ]);
    }
}
