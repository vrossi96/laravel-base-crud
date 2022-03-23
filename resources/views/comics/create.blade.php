@extends('layouts.main')

@section('page-title', 'Aggiungi Fumetto')

@section('main')
   <div class="container">
      <div class="row">
         <div class="col-12">
            {{-- FORM PER CHIEDERE INFO PER IL NUOVO FUMETTO, METODO POST PER comics.store --}}
            <form class="form-comic-info" method="POST" action="{{ route('comics.store') }}">
               @csrf
               <div class="row">
                  {{-- TITOLO --}}
                  <div class="col-6">
                     <label for="title">Titolo</label>
                     <input type="text" id="title" name="title">
                  </div>
                  {{-- SERIE --}}
                  <div class="col-6">
                     <label for="series">Serie</label>
                     <input type="text" id="series" name="series">
                  </div>
                  {{-- IMMAGINE --}}
                  <div class="col-6">
                     <label for="img">Immagine</label>
                     <input type="url" id="img" name="thumb">
                  </div>
                  {{-- PREZZO --}}
                  <div class="col-2">
                     <label for="price">Prezzo</label>
                     <input step=".01" type="number" id="price" name="price">
                  </div>
                  {{-- DATA --}}
                  <div class="col-2">
                     <label for="sale_date">Data di uscita</label>
                     <input type="date" id="sale_date" name="sale_date">
                  </div>
                  {{-- TIPO --}}
                  <div class="col-2">
                     <label for="type">Tipo di fumetto</label>
                     <select name="type" id="type">
                        @foreach ($comic_type as $key => $type)
                           <option class="text-uppercase">{{ $key }}</option>
                        @endforeach
                     </select>
                  </div>
                  {{-- DESCRIPTION --}}
                  <div class="col-6">
                     <label for="description">Descrizione</label>
                     <textarea name="description" id="description" rows="10"></textarea>
                  </div>
                  {{-- IMG --}}
                  <div class="col-4 mt-4">
                     <div class="w-100 d-flex justify-content-center">
                        <img id="preview-img" src="https://m.media-amazon.com/images/I/31YAbWpcjYL._AC_.jpg"
                           alt="Comic Preview">
                     </div>
                  </div>
                  {{-- CONFIRM - RESET BUTTON --}}
                  <div class="col-2 mt-4">
                     <div class="h-100 w-100 d-flex justify-content-end align-items-start">
                        <button type="submit" class="btn btn-success mx-1">
                           <i class="fas fa-check"></i>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                           <i class="fas fa-history"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection


@section('custom-script')
   <script>
      const placeholder = "https://m.media-amazon.com/images/I/31YAbWpcjYL._AC_.jpg";
      const previewImg = document.getElementById('preview-img');
      const imgInput = document.getElementById('img');

      imgInput.addEventListener('change', function() {
         // PRENDE LA VALUE DELL'EVENTO IN CUI CI SI TROVA
         const url = this.value;
         if (url) previewImg.setAttribute('src', url);
         else previewImg.setAttribute('src', placeholder);
      });
   </script>
@endsection
