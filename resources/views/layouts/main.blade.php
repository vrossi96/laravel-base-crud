<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css'
      integrity='sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=='
      crossorigin='anonymous' />
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <title>@yield('page-title')</title>
</head>

<body>
   @include('includes.header')
   <div class="container">
      <div class="row">
         @if ($session('message'))
            <div class="col-12">
               <div class="alert alert-info">
                  {{ session('message') }}
               </div>
            </div>
         @endif
      </div>
   </div>

   @yield('main')

   @yield('custom-script')
</body>

</html>
