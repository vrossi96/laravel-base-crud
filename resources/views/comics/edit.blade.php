@extends('layouts.main')

@section('page-title', 'Modifica Fumetto')

@section('main')
   <div class="container">
      <div class="row">
         <div class="col-12">
            {{-- FORM PER CHIEDERE INFO PER MODIFICA FUMETTO, METODO PUT PER comics.update --}}
            @include('includes/comics/form')
         </div>
      </div>
   </div>
@endsection


@section('custom-script')
   <script src="{{ asset('js/script.js') }}"></script>
@endsection
