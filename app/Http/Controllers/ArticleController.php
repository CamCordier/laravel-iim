<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        $articles = Article::paginate(5);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Article();
        $this->validate($request, [
            'title' => 'required|min:6',
            'body' => 'required|min:10',
            'image' => 'required'

        ],
            [
                'title.required' => 'Le titre est requis',
                'body.required' => 'Le contenu est requis'
            ]);

        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        $image->title = $request->title;
        $image->body = $request->body;
        if ($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $article = new Article;

            $article->fill($input)->save();
            $name = $timestamp . '-' . $file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path() . '/images/', $name);
            $image->fill($input)->save();

            return redirect()->route('article.index')
                ->with('success', 'L\'article a bien été publié');

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view ('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view ('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|min:6',
            'body' => 'required|min:10',

        ],
            [
                'title.required' => 'Le titre est requis',
                'body.required' => 'Le contenu est requis'
            ]);
        $article = Article::find($id);
        $input = $request->input();

        $input['user_id'] = Auth::user()->id;

        $article = new Article;

        $article->fill($input)->save();

        return redirect()->route('article.update')
            ->with('success', 'L\'article a bien été modifié');
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
        $article->delete();

        return redirect()->route('article.index')
          ->with('success', 'L\'article a bien été supprimé');
    }

    public function isLikedByMe($id)
    {
        $post = Post::findOrFail($id)->first();
        if (Like::whereUserId(Auth::id())->wherePostId($post->id)->exists()){
            return 'true';
        }
        return 'false';
    }

    public function like(Post $post)
    {
        $existing_like = Like::withTrashed()->wherePostId($post->id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id()
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
