<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Http\Requests\ProduitRequest;
use Illuminate\Support\Str;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($slug=null){
        $query = $slug ? Categorie::where('slug',$slug)
                ->firstOrFail()
                ->produits():Produit::query();
        $produits = $query->orderBy('id')->get();
        $categories = Categorie::all();
        return view('indexProduit', compact('produits','categories','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();
        return view('createProduit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request, Produit $produit)
    {
        $produit->reference=$request->reference;
        $produit->libelleProduit=$request->libelleProduit;
        $libelleProd = $request->libelleProduit;
        $produit->prix=$request->prix;
        $produit->description=$request->description;
        $produit->categorie_id=$request->categorie_id;
        $produit->slug=Str::slug($libelleProd);
        $produit->save();
        return redirect()->route('produit.index')->with('info','Le produit ' . $produit->reference . ' a été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        $categorie=$produit->categorie->libelleCategorie;  
        return view('showProduit', compact('produit','categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        $categorie_id = $produit->categorie_id;
        return view('editProduit', compact('produit', 'categories', 'categorie_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitRequest $request, Produit $produit)
    {
        $produit->update($request->all());
        return redirect()->route('produit.index')->with('info', 'Le produit a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit) {
        $produit->delete();
        return redirect()->route('produit.index')->with('info', 'Le produit bien été suprimée');
    }
}
