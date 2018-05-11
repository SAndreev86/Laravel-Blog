<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UploadImage;
use Dan\UploadImage\Exceptions\UploadImageException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create', [
            'article'    => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $arrayRequest = $request->all();

        // Upload and save image.
        try {
            // Upload and save image.
            $arrayRequest['image'] = UploadImage::upload($arrayRequest['image'], 'article')->getImageName();
        } catch (UploadImageException $e) {

            return back()->withInput()->withErrors(['image', $e->getMessage()]);
        }

        $article = Article::create($arrayRequest);

        // Categories
        if($request->input('categories')) :
            $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $article['image'] = UploadImage::load('article').$article['image'];

        return view('admin.articles.edit', [
            'article'    => $article,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $arrayRequest = $request->all();
        unset($arrayRequest['slug']);

        if(!empty($arrayRequest['image'])) {
            try {
                $arrayRequest['image'] = UploadImage::upload($arrayRequest['image'], 'article')->getImageName();

                if(!empty($article->image)) {
                    UploadImage::delete($article->image, 'article');
                }

            } catch (UploadImageException $e) {
                return back()->withInput()->withErrors(['image', $e->getMessage()]);
            }
        }

        $article->update($arrayRequest);

        // Categories
        $article->categories()->detach();

        if($request->input('categories')) {
            $article->categories()->attach($request->input('categories'));
        }

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();

        if(!empty($article->image)) {
            UploadImage::delete($article->image, 'article');
        }

        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}