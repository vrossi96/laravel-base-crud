@extends('layouts.main')

@section('page-title', 'Comics')

@section('main')
   <div class="container">
      <div class="row">
         @forelse ($comics as $comic)
            <div class="col-6">
               <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-4">
                        <img src="{{ $comic->thumb }}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
                     </div>
                     <div class="col-md-8">
                        <div class="card-body">
                           <h5 class="card-title">{{ $comic->title }}</h5>
                           <p class="card-text"><strong>Serie:</strong> {{ $comic->series }}</p>
                           <p class="card-text"><strong>Data di uscita:</strong> {{ $comic->sale_date }}</p>
                           <p class="card-text text-capitalize"><small class="text-muted"><strong>Tipo:</strong>
                                 {{ $comic->type }}</small></p>
                           <a href="#">Scopri di più</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @empty
         @endforelse
      </div>
   </div>
@endsection
