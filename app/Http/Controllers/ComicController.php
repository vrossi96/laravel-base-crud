<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comic = new Comic();
        $comic_type = Comic::get('type')->groupBy('type');
        return view('comics.create', compact('comic_type', 'comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'unique:comics', 'min:5', 'max:75'],
            'thumb' => 'url',
            'price' => ['numeric', 'min:0', 'max:500'],
            'series' => ['required', 'string', 'min:5', 'max:50'],
            'sale_date' => 'date',
            'type' => [Rule::in(['comic book', 'graphic novel']),],
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il campo :attribute richiede almeno 5 caratteri',
            'title.unique' => "Il titolo $request->title esiste già",
            'url' => 'Per l\'immagine è necessario un url valido',
            'numeric' => 'Il :attribute deve essere un numero',
            'price.min' => 'Il :attribute deve essere sopra lo 0',
            'date' => 'Il campo :attribute deve essere una data',
        ]);

        $data = $request->all();

        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic_type = Comic::get('type')->groupBy('type');

        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic', 'comic_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => ['required', 'string', Rule::unique('comics')->ignore($comic->id), 'min:5', 'max:75'],
            'thumb' => 'url',
            'price' => ['numeric', 'min:0', 'max:500'],
            'series' => ['required', 'string', 'min:5', 'max:50'],
            'sale_date' => 'date',
            'type' => [Rule::in(['comic book', 'graphic novel']),],
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il campo :attribute richiede almeno 5 caratteri',
            'url' => 'Per l\'immagine è necessario un url valido',
            'numeric' => 'Il :attribute deve essere un numero',
            'price.min' => 'Il :attribute deve essere sopra lo 0',
            'date' => 'Il campo :attribute deve essere una data',
        ]);

        $data = $request->all();

        $comic->update($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('message', "Fumetto $comic->title eliminato.");
    }
}
