<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <base href="/public">
    @include('admin.css')

    <style type="text/css">

        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .font_size
        {
            font-size: 40px;
            padding-bottom 40px;
        }

        .text_color
        {
            color: black;
            paddin-bottom: 20px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

        .div_design
        {
            padding-bottom: 15px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.traka')
      <!-- partial -->
      @include('admin.header_admin')
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

         @if(session()->has('message'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

            {{session()->get('message')}}
        </div>
        @endif

            <div class="div_center">

                <h1 class="font_size">Uredi proizvod</h1>


                <form action="{{url('/uredi_proizvodi_potvrdi',$proizvodi->id)}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div_design">
                <label>Naziv proizvoda:</label>
                <input class="text_color" type="text" name="naziv" placeholder="Napiši naziv" required="" value="{{$proizvodi->naziv}}">
                </div>

                <div class="div_design">
                <label>Opis proizvoda:</label>
                <input class="text_color" type="text" name="opis" placeholder="Napiši opis" required="" value="{{$proizvodi->opis}}">
                </div>

                <div class="div_design">
                <label>Cijena proizvoda:</label>
                <input class="text_color" type="number" name="cijena" placeholder="Napiši cijenu" required="" value="{{$proizvodi->cijena}}">
                </div>

                <div class="div_design">
                <label>Popust:</label>
                <input class="text_color" type="number" name="popust" placeholder="Napiši popust" value="{{$proizvodi->popust}}">
                </div>

                <div class="div_design">
                <label>Količina proizvoda:</label>
                <input class="text_color" type="number" min="0" name="količina" placeholder="Napiši količinu" required="" value="{{$proizvodi->količina}}">
                </div>

                <div class="div_design">
                <label>Kategorija proizvoda:</label>
                <select class="text_color" name="kategorije" required="">
                    <option value="{{$proizvodi->kategorije}}" selected="">{{$proizvodi->kategorije}}</option>

                    @foreach($kategorije as $kategorije)
                    <option value="{{$kategorije->naziv_kategorije}}">{{$kategorije->naziv_kategorije}}</option>

                    @endforeach

                </select>
                </div>

                <div class="div_design">
                <label>Trenutna slika proizvoda:</label>
                <img style="margin:auto;" height="100" width="100" src="/proizvodi/{{$proizvodi->slika}}">
                </div>

                <div class="div_design">
                <label>Promjeni sliku proizvoda:</label>
                <input type="file" name="slika">
                </div>

                <div class="div_design">
 
                <input type="submit" value="Uredi Proizvod" class="btn btn-primary">
                </div>

                </form>


            </div>

            
            

        </div>

    </div>

        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>