<!DOCTYPE html>
<html lang="en">
<head>

  @include('admin.css')

  <style type="text/css">

    .naslov
    {

      text-align: center;
      font-size: 25px;
      font-weight: bold;
      padding-bottom: 40px;
    }

    .tablica
    {

      border: 2px solid white;
      width: 100%;
      margin: auto;
      text-align: center;
    }

    .th_diz
    {

      background-color: lightgreen;
    }

    .vel_slika
    {
      width: 150px;
      height: 150px;
    }

  </style>

  
</head>
<body>
<div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.traka')
      <!-- partial -->
      @include('admin.header_admin')
      <div class="main-panel">
        <div class="content-wrapper">
        

          <h1 class="naslov">Narudžbe</h1>

          <table class="tablica">

            <tr class="th_diz">

              <th>Ime</th>
              <th>Email</th>
              <th>Adresa</th>
              <th>Mobitel</th>
              <th>Naziv proizvoda</th>
              <th>Količina</th>
              <th>Cijena</th>
              <th>Status plaćanja</th>
              <th>Status dostave</th>
              <th>Slika</th>
              <th>Isporučeno</th>

            </tr>

            @foreach($narudzba as $narudzba)

            <tr>

              <td>{{$narudzba->name}}</td>
              <td>{{$narudzba->email}}</td>
              <td>{{$narudzba->adresa}}</td>
              <td>{{$narudzba->mobitel}}</td>
              <td>{{$narudzba->naziv_proizvoda}}</td>
              <td>{{$narudzba->količina}}</td>
              <td>{{$narudzba->cijena}}</td>
              <td>{{$narudzba->status_placanja}}</td>
              <td>{{$narudzba->status_isporuke}}</td>
              <td>

                <img class="vel_slika" src="/proizvodi/{{$narudzba->slika}}">
              </td>

              <td>

                @if($narudzba->status_isporuke=='U tijeku')

                <a href="{{url('isporuceno',$narudzba->id)}}" class="btn btn-primary">Isporučeno</a>

                @else

                <p style="color: green">Isporučeno</p>

                @endif
              </td>
            </tr>

            @endforeach 

             

          </table>

        </div>

    </div>

    @include('admin.script')

</body>
</html>
