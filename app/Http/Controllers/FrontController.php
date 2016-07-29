<?php

namespace App\Http\Controllers;



use App\tag;
use App\Apero;
use App\Http\Requests\AperoRequest;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{

    // page d'accueil



     public function index($id =null)
     {


        $aperos = Apero::time()->where('status','=','published')->orderBy('date_event')->paginate(3);
         $categories = Category::all();


         return view('front.home', ['aperos' => $aperos, 'categories'=> $categories ]);


     }


    /*public function showAll()
    {
        $aperos = Apero::all();
        $categories = Category::all();

        return view('front.apero.search', ['aperos' => $aperos, 'categories'=> $categories ]);
    }*/

    public function showApero($id)
    {
        $aperos = Apero::find($id);
        $categories = Category::all();

        return view('front.apero.apero', [
            'aperos' => $aperos,
            'categories'=> $categories
        ]);
    }

    public function createApero()
    {

        $categories = Category::lists('title', 'id');

        // ['category' => $category] <=> compact('category')

        $tags = Tag::lists('name', 'id');

        return view('front.apero.create', compact('categories', 'tags'));
    }

    public function store(AperoRequest $request)
    {
        // function de debug
        //var_dump($_POST)

        // todo validation

        //dd($request->all());

        /*
        $this->validate($request,[
            'title' => 'required|string',
            'category_id' => 'integer',
            'status' => 'in:published,unpublished',
            'tags.*' => 'integer'
        ]);
        */

        // on recupere l'objet hydraté avec les données du post


        $apero = Apero::create($request->all());


        //$request ->tags permet d'acceder plus rapidement à ce champ

        if (!empty($request->input('tags'))) {
            $apero->tags()->attach($request->input('tags'));
        }

        // PICTURES

        //$this->createImage($request, $apero->id);

        if (!is_null($request->picture)) {

            $img = $request->picture;

            $ext = $img->getClientOriginalExtension();

            $fileName = md5(uniqid(rand(), true)) . ".$ext";

            $img->move(env('UPLOADS'), $fileName);

            $apero->uri = $fileName;

            $apero-> save();


        }



        return redirect('create')
            ->with(['message' => 'votre apero à bien été ajouté']);

    }




    /*
     *
     *
     *
     *
     *   private function createImage($request, $aperoId)
    {
        if (!is_null($request->picture)) {

            $img = $request->picture;

            $ext = $img->getClientOriginalExtension();

            $fileName = md5(uniqid(rand(), true)) . ".$ext";

            Apero::updated([
                'uri' => $fileName,
                'apero_id' => $aperoId

            ]);

            $img->move(env('UPLOADS'), $fileName);
        }


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

             return view('front.apero.tag', ['tag'=> $tag]);
         }*/
}
