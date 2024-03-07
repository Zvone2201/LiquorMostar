<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>AlkoLab</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">

        .center
        {
            margin: auto;
            width: 70%;
            text-align: center;
            padding:30px;
        }

        table,th,td
        {
            border: 1px solid grey;
        }

        .th-deg
        {
            font-size: 30px;
            padding: 5px;
            background: lightgreen;
        }

        .dizajn_slike
        {
            height: 160px;
            width: 200px;
        }

        .total_cijena
        {
            font-size: 20px;
            padding: 40px;
        }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         @if(session()->has('message'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}
        </div>
        @endif

      
        <div class="center">

            <table>

                <tr>

                    <th class="th-deg">Naziv proizvoda</th>
                    <th class="th-deg">Količina proizvoda</th>
                    <th class="th-deg">Cijena</th>
                    <th class="th-deg">Slika</th>
                    <th class="th-deg"></th>

                </tr>

                <?php $totalcijena=0; ?>

                @foreach($kosarica as $kosarica)

                <tr>
                    <td>{{$kosarica->naziv_proizvoda}}</td>
                    <td>{{$kosarica->količina}}</td>
                    <td>{{$kosarica->cijena}} KM</td>
                    <td><img class="dizajn_slike" src="/proizvodi/{{$kosarica->slika}}"></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Jeste li sigurni da želite ukloniti ovaj proizvod?')"href="{{url('ukloni_kosaricu',$kosarica->id)}}">Ukloni</a></td>

                </tr>

                <?php $totalcijena=$totalcijena + $kosarica->cijena ?>

                @endforeach

                

            </table>   

            <div>

                <h1 class="total_cijena">Ukupno:  {{$totalcijena}} KM</h1>
            </div>

            <div>

                <h1 style="font-size: 25px; padding-bottom: 15px;">Plaćanje</h1>

                <a href="{{url('placanje_preuzimanjem')}}" class="btn btn-danger">Plaćanje prilikom preuzimanja</a>
                
            </div>

        </div>

       

      <!-- footer start -->
      
      <!-- footer end -->
      <div class="cpy_">

         

      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>