<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        if (\request('tag')) {
            $articles = Tag::where('name', \request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        $this->validateArticle();

        $article = new Article(\request(['title', 'excerpt', 'body']));
        $article->user_id = 2;// auth()->id();
//        Alternative
//        aut()->user()->articles()->create($article);
        $article->save();

        if (\request()->has('tags')) {
            $article->tags()->attach(\request('tags'));
        }

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function destroy()
    {
        //
    }

    /**
     * @return array
     */
    public function validateArticle(): array
    {
        return \request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
