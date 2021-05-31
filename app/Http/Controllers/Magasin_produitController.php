<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magasin_produit;
use App\Models\Magasin;
use App\Models\Produit;
use App\Http\Requests\Magasin_produitRequest;

class Magasin_produitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug=null,$slug2=null)
    {
        $query = $slug ? Magasin::where('slug',$slug)
                ->firstOrFail()
                ->magasin_produits():Magasin_produit::query();
        $magasinProduits = $query->orderBy('id')->get();
        $magasins = Magasin::all()->sortBy('libelleMagasin');
        return view('indexMagasinProduit',  compact('magasinProduits','magasins','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $magasins = Magasin::all()->sortBy('libelleMagasin');
        $produits = Produit::all()->sortBy('libelleProduit');
        return view ('createMagasinProduit',  compact('produits','magasins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Magasin_produitRequest $request, Magasin_produit $magasinProduit)
    {
        $magasinProduit->magasin_id=$request->magasin_id;
        $magasinProduit->produit_id=$request->produit_id;
        $magasinProduit->limiteStockAlerte=$request->limiteStockAlerte;
        $magasinProduit->quantiteStock=$request->quantiteStock;
        $magasinProduit->save();
        return redirect()->route('magasin_produit.index')->with('info','Le produit '.$magasinProduit->produit_id.' a été ajouté dans le magasin '.$magasinProduit->magasin_id.' !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Magasin_produit $magasinProduit)
    {
        $magasins = Magasin::all();
        $magasin_id = $magasinProduit->magasin_id;
        $produits = Produit::all();
        $produit_id = $magasinProduit->produit_id;
        return view('showMagasinProduit',  compact('magasinProduit','magasins','produits','magasin_id','produit_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Magasin_produit $magasinProduit)
    {
        $magasins = Magasin::all();
        $magasin_id = $magasinProduit->magasin_id;
        $produits = Produit::all();
        $produit_id = $magasinProduit->produit_id;
        return view('editMagasinProduit',  compact('magasinProduit','magasins','magasin_id','produits','produit_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Magasin_produitRequest $request, Magasin_produit $magasinProduit)
    {
        $magasinProduit->update($request->all());
        return redirect()->route('magasin_produit.index')->with('info','Le produit dans le magasin a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magasin_produit $magasinProduit)
    {
        $magasinProduit->delete();
        return redirect()->route('magasin_produit.index')->with('info','Le produit dans le magasin a été modifié !');
    }
}
