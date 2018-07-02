<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Categorie;
use App\Tag;
use Storage;
use App\Http\Requests\StoreArticle;
use App\Http\Requests\StoreArticleNoimg;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        $categories = Categorie::all();
        $user = User::all();
        $tags = Tag::all();
        return view("admin.articles.index",compact('articles', 'user', 'tags','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        return view("admin.articles.create",compact('users', "tags",'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $article = new Article;
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->categories_id = $request->categories_id;
        $article->image = $request->image->store('','imgArticle');
        $article->users_id = Auth::user()->id;

        if($article->save()){
            foreach($request->tags_id as $tag)
            {
                $article->tags()->attach($tag);
            }
        };

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        
        return view("admin.articles.show",compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        $categories = Categorie::all();
        return view('admin.articles.edit', compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleNoimg $request, Article $article)
    {
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->categories_id = $request->categories_id;

        if ($request->image != null)
        {
            Storage::disk('imgArticle')->delete($article->image);
            $article->image = $request->image->store('','imgArticle');
    
        }
        
        $article->tags()->detach();

        if($article->save()){
            foreach($request->tags_id as $tag)
            {
                $article->tags()->attach($tag);
            }
            return redirect()->route('articles.index',['article'=> $article->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        $article->delete();
        return redirect()->route('articles.index');
    }
}
