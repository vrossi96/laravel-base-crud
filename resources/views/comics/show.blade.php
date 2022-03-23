@extends('layouts.main')

@section('page-title', $comic->series)

@section('main')
   <div class="container">
      <div class="row">
         <div class="col-8 offset-2">
            <div class="card mb-3">
               <div class="show-card" style="background-image: url({{ $comic->thumb }});"></div>
               <div class="card-body">
                  <h5 class="card-title">{{ $comic->title }}</h5>
                  <p class="card-text"><strong>Serie:</strong> {{ $comic->series }}</p>
                  <p class="card-text"><strong>Data di uscita:</strong> {{ $comic->sale_date }}</p>
                  <p class="card-text"><strong>Prezzo:</strong> {{ $comic->price }}&euro;</p>
                  <p class="card-text">{{ $comic->description }}</p>
                  <p class="card-text text-capitalize"><small class="text-muted"><strong>Tipo:</strong>
                        {{ $comic->type }}</small></p>
                  <a href="{{ route('comics.index') }}" class="btn details">Torna indietro</a>
               </div>
               {{-- DELETE BTN --}}
               <div class="edit-dlt-comic d-flex flex-column">
                  <a class="edit-comic" href="{{ route('comics.edit', $comic->id) }}"><i
                        class="fas fa-edit"></i></a>
                  <a class="dlt-comic" href="{{ route('comics.destroy', $comic->id) }}">
                     <i class="fa-solid fa-trash-can"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
