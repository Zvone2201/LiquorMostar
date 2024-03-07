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
      <title>LiquorMostar</title>
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

      
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Naša <span>Pića</span>
               </h2>
            </div>
            <div class="row">

               @foreach($proizvodi as $proizvodis)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('vise_o_proizvodi',$proizvodis->id)}}" class="option1">
                           Više o Proizvodu</a>

                           <form action="{{url('dodaj_kosaricu',$proizvodis->id)}}" method="Post">

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
                     <div class="img-box">
                        <img src="proizvodi/{{$proizvodis->slika}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$proizvodis->naziv}}
                        </h5>

                  

                        @if($proizvodis->popust!=null)

                        <h6 style="color: red">
                           Akcija
                           <br>
                           {{$proizvodis->popust}} KM
                        </h6>

                        <h6 style="text-decoration: line-through; color: green">
                           Cijena
                           <br>
                           {{$proizvodis->cijena}} KM
                        </h6>

                        @else
                        
                        <h6 style="color: green">
                           Cijena
                           <br>
                           {{$proizvodis->cijena}} KM
                        </h6>

                        @endif

                     </div>
                  </div>
               </div>
               @endforeach

               <span style="padding-top: 20px">

                  {!!$proizvodi->appends(Request::all())->links('pagination::bootstrap-5')!!}

               </span>

         </div>   

</section>
      <!-- end product section -->

      
      <!-- footer start -->
      @include('home.kraj_stranice')
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