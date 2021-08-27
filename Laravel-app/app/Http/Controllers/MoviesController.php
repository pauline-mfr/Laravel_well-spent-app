<?php

namespace App\Http\Controllers;
use App\Models\Movies;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // display movies list
    public function index()
    {
        $movies = Movies::all();
        return view('movies', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movies::create($request->all());
        return redirect()->route('movies.index')->with('alert', 'New movie has been registered');

      /*  $movie = new \App\Models\Movies; // create new model instance
        //get properties
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->description= $request->description;
        //$expense->category = $request->category;
        $movie->save(); // DB register  */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movies $movie)
    {
        return view('show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movies $movie)
    {
        return view('edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movies $movie)
    {
        $movie->update($request->all());

        return redirect()->route('movies.index')->with('alert', 'Movie has been modified.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movies $movie)
    {
        $movie->delete();
        // redirige vers la même page, et flash une info dans la session
        return back()->with('alert', 'The movie has been deleted from the database.');
    }
}
