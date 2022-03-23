@extends('layouts.main')

@section('page-title', 'Modifica Fumetto')

@section('main')
   <div class="container">
      <div class="row">
         <div class="col-12">
            {{-- FORM PER CHIEDERE INFO PER IL NUOVO FUMETTO, METODO POST PER comics.store --}}
            <form method="POST" action="{{ route('comics.update', $comic->id) }}">
               @method('PUT')
               @csrf
               <div class="row">
                  {{-- TITOLO --}}
                  <div class="col-6">
                     <label for="title">Titolo</label>
                     <input type="text" id="title" name="title" value="{{ $comic->title }}">
                  </div>
                  {{-- SERIE --}}
                  <div class="col-6">
                     <label for="series">Serie</label>
                     <input type="text" id="series" name="series" value="{{ $comic->series }}">
                  </div>
                  {{-- IMMAGINE --}}
                  <div class="col-6">
                     <label for="img">Immagine</label>
                     <input type="url" id="img" name="thumb" value="{{ $comic->thumb }}">
                  </div>
                  {{-- PREZZO --}}
                  <div class="col-2">
                     <label for="price">Prezzo</label>
                     <input step=".01" type="number" id="price" name="price" value="{{ $comic->price }}">
                  </div>
                  {{-- DATA --}}
                  <div class="col-2">
                     <label for="sale_date">Data di uscita</label>
                     <input type="date" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
                  </div>
                  {{-- TIPO --}}
                  <div class="col-2">
                     <label for="type">Tipo di fumetto</label>
                     <select name="type" id="type">
                        @foreach ($comic_type as $key => $t)
                           <option @if ($comic->type === $key) selected @endif class="text-uppercase">
                              {{ $key }}
                           </option>
                        @endforeach
                     </select>
                  </div>
                  {{-- DESCRIPTION --}}
                  <div class="col-6">
                     <label for="description">Descrizione</label>
                     <textarea name="description" id="description" rows="10">{{ $comic->description }}</textarea>
                  </div>
                  {{-- CONFIRM - RESET BUTTON --}}
                  <div class="col-6">
                     <div class="h-100 w-100 d-flex justify-content-end align-items-end">
                        <button type="submit" class="btn btn-primary mx-3">Conferma modifiche</button>
                        <button type="reset" class="btn btn-secondary">Reimposta</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
