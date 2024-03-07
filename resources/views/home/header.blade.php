<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">POČETNA <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           
                        
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('proizvode')}}">Proizvodi</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('o_nama')}}">O nama</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{'kontakt'}}">Kontakt</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('prikazi_kosaricu')}}">Košarica</a>
                        </li>
                        <form class="form-inline">
                           
                        </form>

                        @if (Route::has('login'))

                        @auth

                        <li class="nav-item">
                            <x-app-layout>

                            </x-app-layout>
                        </li>

                        @else

                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth

                        @endif 
                        
                       
                     </ul>
                  </div>
               </nav>
            </div>
         </header>