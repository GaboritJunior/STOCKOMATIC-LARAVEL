<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magasin;
use App\Http\Requests\MagasinRequest;
use Illuminate\Support\Str;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magasins = Magasin::all();
        return view('indexMagasin',compact('magasins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createMagasin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MagasinRequest $request, Magasin $magasin)
    {
        $magasin->referenceMagasin = $request->referenceMagasin;
        $magasin->libelleMagasin = $request->libelleMagasin;
        $libelleMag = $request->libelleMagasin;
        $magasin->adresse = $request->adresse;
        $magasin->ville = $request->ville;
        $magasin->CP = $request->CP;
        $magasin->slug=Str::slug($libelleMag);
        $magasin->save();
        return redirect()->route('magasin.index')->with('info','Le magasin ' . $magasin->libelleMagasin . ' a été crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Magasin $magasin)
    {
        return view('showMagasin', compact('magasin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Magasin $magasin)
    {
        return view('editMagasin', compact('magasin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MagasinRequest $request, Magasin $magasin)
    {
        $magasin->update($request->all());
        return redirect()->route('magasin.index')->with('info', 'Le magasin a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magasin $magasin)
    {
       $magasin->delete();
       return redirect()->route('magasin.index')->with('info', 'Le magasin a bien été supprimée');
    }
}
