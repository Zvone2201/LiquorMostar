<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">

        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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
            <h2 class="h2_font">Dodaj Kategoriju</h2>

            <form action="{{url('/add_kategorije')}}" method="POST">

                @csrf

                <input class="input_color" type="text" name="kategorije" placeholder="Napiši naziv kategorije">

                <input type="submit" class="btn btn-primary" name="submit" value="Dodaj kategoriju">
            </form>
        </div>

        <table class="center">

            <tr>
                <td>Naziv Kategorije</td>
                <td>Action</td>
            </tr>

            @foreach($data as $data)

            <tr>
                <td>{{$data->naziv_kategorije}}</td>
                <td>

                    <a onclick="return confirm('Jeste li sigurni da ovo želite izbrisati')" class="btn btn-danger" href="{{url('izbriši_kategorije',$data->id)}}">Izbriši</a>
                
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