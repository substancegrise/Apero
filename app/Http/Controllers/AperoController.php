<?php

namespace App\Http\Controllers;

use App\Apero;
use App\Tag;
use App\User;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;

class AperoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aperos = Apero::paginate(5);

        return view('admin.apero.index', ['aperos' => $aperos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title', 'id');

        // ['category' => $category] <=> compact('category')

        $tags = Tag::lists('name', 'id');

        return view('admin.apero.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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


        return redirect()
            ->route('admin.apero.index')
            ->with(['message' => 'votre apero à bien été ajouté']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::lists('title', 'id');
        $tags = Tag::lists('name', 'id');

        $apero = Apero::find($id);

        return view('admin.apero.edit', compact('apero', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, $id)
    {
        $apero = Apero::find($id);

        $apero->update($request->all());


        if (!empty($request->tags)) {
            $apero->tags()->detach();
            $apero->tags()->attach($request->input('tags'));
        } else {
            $apero->tags()->detach();
        }

        // Supression de l'image

        if (!is_null($request->delete_picture) || !is_null($request->picture))
        {

            $this->deleteImage($apero);


            $this->createImage($request, $apero);

        }

        /*if (!is_null($request->picture)) {

            $img = $request->picture;

            $ext = $img->getClientOriginalExtension();

            $fileName = md5(uniqid(rand(), true)) . ".$ext";

            $img->move(env('UPLOADS'), $fileName);

            $apero->uri = $fileName;

            $apero->save();


        }*/


        return redirect()
            ->route('admin.apero.index')
            ->with(['message' => 'success update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $apero = Apero::find($id);
        $this->deleteImage($apero);
        $apero->delete();


        Apero::destroy($id);

        return back()->with(['message' => 'success destroy']);
    }

    public function deleteImage($apero)

    {
        if (!is_null($apero->uri)) {
            $fileName = public_path('assets/images/' . $apero->uri);


            if (File::exists($fileName)) {
                File::delete($fileName);
                Apero::destroy($apero->uri);

            }
        }

    }

    private function createImage(Request $request,$apero)
    {
        if (!is_null($request->picture)) {


            $img = $request->picture;

            $ext = $img->getClientOriginalExtension();


            $fileName = md5(uniqid(rand(), true)) . ".$ext";

            $img->move(env('UPLOADS'), $fileName);

            $apero->uri = $fileName;

            $apero->save();

        }

    }


}
