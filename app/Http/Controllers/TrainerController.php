<?php

namespace TRAINERPOKEMON\Http\Controllers;

use Illuminate\Http\Request;
use TRAINERPOKEMON\Trainer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use TRAINERPOKEMON\Traits\TransformTextToUrl;

use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{

    use TransformTextToUrl;

    protected $user;

    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->user = Auth::user();

            // dd( Auth::user() );
            $this->user->authorizeRoles(['admin']);

            return $next($request);
        });        

        // dd($this->user);
        // die;

        // $this->user->authorizeRoles(['admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.trainers', ['trainers' => $trainers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'img' => 'image|nullable|max:1999',
            'lavel' => 'required',
            'age' => 'required|min:0|max:100'
        ]);

        $image_profile = 'notfound.png';

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $image_profile = time() . $file->getClientOriginalName();

            $file->storeAs('public/images', $image_profile);
        }

        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->img = $image_profile;
        $trainer->slug = $this->transformTextToUrl(strtolower($request->name)) . time();
        $trainer->lavel = $request->lavel;
        $trainer->age = $request->age;

        $trainer->save();

        return redirect('/trainers')->with('success', 'Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        // $trainer = Trainer::findOrFail($id);
        return view('trainers.show', ['trainer' => $trainer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        // $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', ['trainer' => $trainer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $this->validate($request, [
            'name' => 'required',
            'img' => 'image|nullable|max:1999',
            'lavel' => 'required',
            'age' => 'required|min:0|max:100'
        ]);

        // $trainer = Trainer::findOrFail($id);

        if ($request->hasFile('img')) {

            // Eliminar imagen si  se va a actualizar
            $filePath = storage_path('app/public/images/' . $trainer->img);

            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Subir nueva imagen
            $file = $request->file('img');

            $image_profile = time() . $file->getClientOriginalName();

            $trainer->img = $image_profile;

            $file->storeAs('public/images', $image_profile);
        }

        $trainer->name = $request->name;
        $trainer->lavel = $request->lavel;
        $trainer->age = $request->age;

        $trainer->save();

        return redirect()->route('trainers.show', $trainer)->with('success', 'Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {

        $filePath = storage_path('app/public/images/' . $trainer->img);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // File::delete($filePath);

        $trainer->delete();
        return redirect('/trainers')->with('success', 'Eliminado');
    }
}
