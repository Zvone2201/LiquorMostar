<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style tyoe="text/css">

        .center
        {
            margin:auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .vel_slike
        {
            width: 150px;
            height: 150px;

        }

        .th_color
        {
            background: lightgreen;
        }

        .th_dizajn
        {
            padding: 30px;
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

                <h2 class="font_size">Svi Proizvodi</h2>

                <table class="center">

                <tr class="th_color">
                    <th class="th_dizajn">Naziv</th>
                    <th class="th_dizajn">Opis</th>
                    <th class="th_dizajn">Količina</th>
                    <th class="th_dizajn">Kategorija</th>
                    <th class="th_dizajn">Cijena</th>
                    <th class="th_dizajn">Popust</th>
                    <th class="th_dizajn">Slika</th>
                    <th class="th_dizajn">Izbriši</th>
                    <th class="th_dizajn">Uredi</th>
                </tr>

                @foreach($proizvodi as $proizvodi)

                <tr>
                    <td>{{$proizvodi->naziv}}</td>
                    <td>{{$proizvodi->opis}}</td>
                    <td>{{$proizvodi->količina}}</td>
                    <td>{{$proizvodi->kategorije}}</td>
                    <td>{{$proizvodi->cijena}}</td>
                    <td>{{$proizvodi->popust}}</td>
                    <td>
                        <img class="vel_slike" src="/proizvodi/{{$proizvodi->slika}}">
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Želite li ovo obrisati?')"href="{{url('izbrisi_proizvodi',$proizvodi->id)}}">Izbriši</a>
                    </td>
                    <td>
                    <a class="btn btn-success"href="{{url('uredi_proizvodi',$proizvodi->id)}}">Uredi</a>
                    </td>
                </tr>

                @endforeach

                </table>

            </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>