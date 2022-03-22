<header>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
         <a class="navbar-brand" href="{{ route('comics.index') }}">Comics</a>
         <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('comics.index') ? 'active' : '' }}"
                     href="{{ route('comics.index') }}">Comics</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('comics.create') ? 'active' : '' }}"
                     href="{{ route('comics.create') }}">Aggiungi un
                     Fumetto</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
</header>
