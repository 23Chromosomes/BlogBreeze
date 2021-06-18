<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

use Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $posts = Article::all();
        return view("pages.articles")->with('posts', $posts);
    }

    public function show($slug)
    {
        $post = Article::where('slug', $slug)->firstOrFail();
        return view('pages.article_single')->with('post', $post);
    }

    public function create()
    {
        return view("pages.article_create");
    }

    public function store(Request $request)
    {
        $post = new Article();

        //Image
        if($request->file('images')!==null){
        $imageName = uniqid().'.'.$request->file('images')->getClientOriginalExtension();
        $request->file('images')->move(public_path('images'), $imageName);
        $post->artikels_photo_path = $imageName;
        }

        //Slug & titel
        $titel = $request->input('ArticleTitle');
        $post->naam = $titel;
        $post->slug = $this->createSlug($titel);

        //Inhoud van post
        $post->inhoud = $request->input('ArticleContent');
        $post->user_id = Auth::user()->id;
        $post->save();


        return redirect('/articles');
    }


    public function edit($slug)
    {
        $post = Article::where('slug', $slug)->firstOrFail();
        return view('pages.article_edit')->with('post', $post);
    }

    public function update(Article $post, Request $request)
    {
        //Slug & titel
        $post->naam = $request->input('ArticleTitle');
        $post->slug = $request->input('ArticleSlug');

        //Inhoud van post
        $post->inhoud = $request->input('ArticleContent');
        $post->save();

        return redirect("/article/$post->slug");
    }

    public function createSlug($titel, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($titel, "-");
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Article::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }

    public function destroy(Article $post)
    {
        $post->delete();
        return redirect("/articles");
    }
}
