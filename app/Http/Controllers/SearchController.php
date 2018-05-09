<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function handleTheRequest(SearchRequest $request)
    {
		if ($request->has('word')) {
			return view('search')->with([
				'result' => (new Item)->getByTitleOrTypeName($request->word),
				'word' => $request->word
			]);
		}
		return view('search');
    }
}
