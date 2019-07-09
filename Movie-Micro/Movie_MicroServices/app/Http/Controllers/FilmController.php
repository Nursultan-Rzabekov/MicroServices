<?php

namespace App\Http\Controllers;
use App\Film;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Response;
use App\Category;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::paginate(2);
        return $film;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function getFilmsByCategoryId(Category $category)
    {
        return $category->films;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmRequest $request)
    {
        $film = Film::create($request->validated());
        //$category = Category::find([5,6]);
        //$category = $request->category;
        //$film->categories()->attach($category);
        // $LanguageID = $request->LanguageID;
        // dd($LanguageID);

        $film->categories()->sync($request->input('category'));
        return Response::json(['status' => "success"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return $film;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $film->Title = $request->Title;
        $film->save();
        return $film;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return $film;
    }
}
