@extends('layouts.main')

@section('page-title', 'Comics')

@section('main')
   <div class="container">
      <div class="row">
         @forelse ($comics as $comic)
            <div class="col-6">
               <div class="card mb-3" style="max-width: 540px;">
                  {{-- CONTENUTO CARD --}}
                  <div class="row g-0">
                     {{-- IMMAGINE CARD --}}
                     <div class="col-md-4">
                        <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
                     </div>
                     {{-- DESCRIZIONE CARD --}}
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title">{{ $comic->title }}</h5>
                           <p class="card-text"><strong>Serie:</strong> {{ $comic->series }}</p>
                           <p class="card-text"><strong>Data di uscita:</strong> {{ $comic->sale_date }}</p>
                           <p class="card-text text-capitalize"><small class="text-muted"><strong>Tipo:</strong>
                                 {{ $comic->type }}</small></p>
                           <a href="{{ route('comics.show', $comic->id) }}" class="btn details">Scopri di più</a>
                        </div>
                     </div>
                  </div>
                  {{-- DELETE BTN --}}
                  <a class="dlt-comic" href="{{ route('comics.destroy', $comic->id) }}"><i
                        class="fa-solid fa-trash-can"></i></a>
               </div>
            </div>
         @empty
            <h1 class="text-center">Nessun Fumetto da mostrare</h1>
         @endforelse
      </div>
   </div>
@endsection
