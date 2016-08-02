<?php

namespace App\Http\Controllers;


use App\Tag;
use App\User;
use App\Apero;
use App\Http\Requests\AperoRequest;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{


    public function index($id = null)
    {


        $aperos = Apero::time()->where('status', '=', 'published')->orderBy('date_event')->paginate(3);
        $categories = Category::all();


        return view('front.home', ['aperos' => $aperos, 'categories' => $categories]);


    }


    public function showApero($id)
    {
        $aperos = Apero::find($id);
        $categories = Category::all();

        return view('front.apero.apero', [
            'aperos' => $aperos,
            'categories' => $categories
        ]);
    }

    public function createApero()
    {

        $categories = Category::lists('title', 'id');


        $tags = Tag::lists('name', 'id');

        return view('front.apero.create', compact('categories', 'tags'));
    }

    public function store(AperoRequest $request)
    {


        $apero = Apero::create($request->all());

        $user = User:: create($request->all());

        if (!empty($request->input('email'))) {
            $apero->user_id = $user->id;
            $apero->save();
        }


        if (!empty($request->input('tags'))) {
            $apero->tags()->attach($request->input('tags'));
        }

        // PICTURES

        if (!is_null($request->picture)) {

            $img = $request->picture;

            $ext = $img->getClientOriginalExtension();

            $fileName = md5(uniqid(rand(), true)) . ".$ext";

            $img->move(env('UPLOADS'), $fileName);

            $apero->uri = $fileName;

            $apero->save();


        }


        return redirect('create')
            ->with(['message' => 'votre apero à bien été ajouté']);

    }


}
