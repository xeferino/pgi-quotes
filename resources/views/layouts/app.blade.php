<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema CONSULTORIO VIRTUAL</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> --}}
      <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
      <link href="{{ asset('css/zabuto_calendar.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/easy-autocomplete.min.css') }}">
      <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

      
      
      
    <style>
        body{
            /*font-family: 'Poppins', sans-serif;*/
            font-family: 'Archivo', sans-serif;
            color: black;
        }
    </style>

  
    
</head>
<body>
    
        <!-- navbar -->

        @if (Auth::guest())
            @include('layouts.components.navbar-without-auth');
        @else
            

            @include('layouts.components.navbar-auth');
                 
        @endif


        @yield('content')

        <footer>
            <p class="text-center" style="color:#bbb">Sistema CONSULTORIO VIRTUAL - 2020</p>
			<p class="text-center" style="color:#bbb">Pst. Rocendo Romero</p>
        </footer>
  

        <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/zabuto_calendar.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
        
    
        
    <script>

    $(document).ready(function () {
        var day_quote = '{{ date('Y-m-d') }}';
        $.ajax({
            url: '{{ url('ajax/quotes') }}/'+day_quote,
            type: 'get',
            dataType: 'json',
            success: function(data){
                if(data!=0){
                    $("#count-quote").text(data.quotes.length);
                    $("#count-list-quotes").html(function(){
                        var html ='';
                        $.each(data.quotes, function(i,item){
                            html +='<li class="dropdown-header" role="menu"><a href="#"><i class="fa fa-minus"></i> '+item.title+'</a></li>';
                            html +='<li role="separator" class="divider"></li>';
                        });
                            html +='<li class="dropdown-header" role="menu"><a href="{{ url('/dash/quote/list') }}" class="btn btn-warning btn-large btn-block">Lista de citas <i class="fa fa-eye "></i></a></li>';

                        return html;
                    });
                }else{
                    console.log('Servidor no Responde');
                }
            }
        }); 
    });
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
    </script>


    @yield('scripts')
</body>
</html>
