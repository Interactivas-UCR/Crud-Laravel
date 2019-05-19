<?php

namespace TRAINERPOKEMON\Http\Controllers;

use TRAINERPOKEMON\Pokemon;
use TRAINERPOKEMON\Trainer;

use Illuminate\Http\Request;
use TRAINERPOKEMON\Http\Requests\StorePokemonRequest;
use TRAINERPOKEMON\Http\Requests\UpdatePokemonRequest;

use TRAINERPOKEMON\Traits\TransformTextToUrl;

class PokemonController extends Controller
{

    // Los traits se cargan de esta forma
    use TransformTextToUrl;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokemons.pokemons', ['pokemons' => $pokemons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($trainer)
    {
        return view('pokemons.create', ['trainer' => $trainer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePokemonRequest $request)
    {
        $imagen_pokemon = 'image-not-found.png';
        if ($request->hasFile('imagen_pokemon')) {
            $file = $request->imagen_pokemon;

            $imagen_pokemon = time() . $file->getClientOriginalName();
            $file->storeAs('public/pokemons', $imagen_pokemon);
        }

        $pokemon = new Pokemon();

        $pokemon->name  = $request->name;
        $pokemon->type = $request->type;
        $pokemon->level = $request->level;
        $pokemon->nickname = $request->nickname;
        $pokemon->img = $imagen_pokemon;

        $trainer = Trainer::where('slug', $request->trainer)->first();
        $pokemon->trainer()->associate($trainer);

        $pokemon->slug = $this->transformTextToUrl(strtolower($request->name)) . time();

        $pokemon->save();

        return redirect()->route('pokemons.index')->with('success', "Pokemon added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \TRAINERPOKEMON\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', ['pokemon' => $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \TRAINERPOKEMON\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', ['pokemon' => $pokemon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \TRAINERPOKEMON\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePokemonRequest $request, Pokemon $pokemon)
    {
        if ($request->hasFile('imagen_pokemon')) {

            $filePath = storage_path('app/public/pokemons/' . $pokemon->img);

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file = $request->imagen_pokemon;

            $imagen_pokemon = time() . $file->getClientOriginalName();
            $file->storeAs('public/pokemons', $imagen_pokemon);

            $pokemon->img = $imagen_pokemon;
        }

        $pokemon->fill($request->except('img'));
        $pokemon->save();

        return redirect()->route('pokemons.show', $pokemon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \TRAINERPOKEMON\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        $filePath = storage_path('app/public/pokemons/' . $pokemon->img);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $pokemon->delete();
        return redirect()->route(' index ')->with(' success ', ' Pokemon deleted');
    }
}
