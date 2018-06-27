<?php

namespace App\Http\Controllers;

use App\Allergen;
use Illuminate\Http\Request;

class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
		foreach(Allergen::all() as $allergen)
		{
			$allergen->translate = prettyTranslate($allergen->getTranslate()->get());
			$data[$allergen->id] = $allergen->toArray();
		}

        return response()->json($data,200);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function show(Allergen $allergen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function edit(Allergen $allergen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergen $allergen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergen $allergen)
    {
        //
    }
}
