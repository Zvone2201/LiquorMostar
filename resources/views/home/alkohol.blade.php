<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Naša <span>Pića</span>
               </h2>

               <br><br>

               <div>
                  <form action="{{url('proizvode_trazi')}}" method="GET">

                     @csrf
                     <input style="width: 500px" type="text" name="search" placeholder="Traži proizvode">
                     <input type="submit" name="" value="Traži">
                  </form>
               </div>
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