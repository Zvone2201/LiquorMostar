<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

      

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
                 
                     <div class="img-box" style="padding: ">
                        <img src="proizvodi/{{$proizvodi->slika}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$proizvodi->naziv}}
                        </h5>

                  

                        @if($proizvodi->popust!=null)

                        <h6 style="color: red">
                           Akcija
                           <br>
                           {{$proizvodi->popust}} KM
                        </h6>

                        <h6 style="text-decoration: line-through; color: green">
                           Cijena
                           <br>
                           {{$proizvodi->cijena}} KM
                        </h6>

                        @else
                        
                        <h6 style="color: green">
                           Cijena
                           <br>
                           {{$proizvodi->cijena}} KM
                        </h6>

                        @endif

                        <h6>Kategorija : {{$proizvodi->kategorije}}</h6>

                        <h6>Opis : {{$proizvodi->opis}}</h6>

                        <h6>Dostupno : {{$proizvodi->količina}}</h6>

                        <form action="{{url('dodaj_kosaricu',$proizvodi->id)}}" method="Post">

                              @csrf

                              <div class="row">

                              <div class="col-md-4">
                              <input type="number" name="količina" value="1" min="1" style="width: 100px">
                              </div>

                              <div class="col-md-4">
                              <input type="submit" value="Dodaj u Košaricu">
                              </div>

                                

                                 

                              </div>

                           </form>


                     </div>
                  </div>
            </div>
      
      
      <!-- footer start -->
      @include('home.kraj_stranice')
      <!-- footer end -->
      <div class="cpy_">

         
         </p>
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