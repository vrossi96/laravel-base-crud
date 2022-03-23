@extends('layouts.main')

@section('page-title', 'Aggiungi Fumetto')

@section('main')
   <div class="container">
      <div class="row">
         <div class="col-12">
            {{-- FORM PER CHIEDERE INFO PER IL NUOVO FUMETTO, METODO POST PER comics.store --}}
            @include('includes/comics/form')
         </div>
      </div>
   </div>
@endsection


@section('custom-script')
   <script src="{{ asset('js/script.js') }}"></script>
@endsection
