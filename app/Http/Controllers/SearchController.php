<?php

namespace App\Http\Controllers;

use App\Apero;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    /*public function search() {

        return view ('front.apero.search');
    }*/

    public function search( Request $request)
    {
        $aperos=[];
        $search= '';

        if(!empty($request->all()))
            $search = $request->q;
        $aperos= Apero::search($search)->orderBy("date_event")->paginate(5)->setPath('search?q='.$search);

        return view ('front.apero.search', ['aperos'=>$aperos, 'search'=>$search]);
    }

}
