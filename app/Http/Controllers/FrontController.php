<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{

    // page d'accueil
    public function index()
    {
   
        $apero = Apero::all();

        return view('front.home', ['apero' => $apero]);
    }
    

    public function showPostByCategory($id)
    {
        $category = Category::find($id);
        $titleCat = $category->title;

        $posts = $category->posts()->with('tags', 'media')->get();

        return view('front.post.index', [
            'titleCat' => $titleCat,
            'posts' => $posts,
        ]);

    }
    
    public function showPostByTag($id)
    {
        $tag= Tag::find($id);

        return view('front.post.tag', ['tag'=> $tag]);
    }
}
