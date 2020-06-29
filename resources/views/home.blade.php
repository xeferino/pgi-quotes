@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading2">Inicio</div>
                <input type="hidden" id="day" value="{{ date('Y-m-d') }}">
                <div class="text-center loading_calendar style="display: none">
                    Cargando...
                    <div >
                        <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
                    </div>
                </div>
                <div id="content-calendar" style="display: none">
                    <div class="panel-body">
                        <div id="valid-calendar" style="display: none"></div>
                        <div id="my-calendar"></div>
                        <div id="my-calendar-lazy">
                            <div id="my-calendar-ajax"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div id="list"></div>
    </div>
</div>
<!-- Modal quotes-->
<div class="modal fade" id="myModalQuotes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Citas Programadas</h4>
            </div>
    
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center loading_modal style="display: none">
                            Cargando...
                            <div >
                                <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
                            </div>
                        </div>
                        <div id="quotes_day" style="display: none"></div>   
                    </div>
                </div>
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                {{-- <button class="btn btn-default" data-toggle="modal" data-target="#myModalQuotesCreate">Nueva Cita</button>  --}}
                <button class="btn btn-default" id="quote-new">Nueva Cita</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal quotes-->

<!-- Modal create quote-->
<div class="modal fade" id="myModalQuotesCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Nueva Cita</h4>
            </div>
    
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center loading_modal_create style="display: none">
                            Cargando...
                            <div>
                                <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
                            </div>
                        </div>
                        <div id="quote-persons" style="display: none"></div>
                        <div id="quote-content" style="display: none">
                            <form  method="POST" name="save-quote" id="save-quote" onsubmit="document.getElementById('cre').disabled = true">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Título</label>
                                            <input type="text" class="form-control check-key"  placeholder="Ingrese el titulo de la cita" name="title" id="title" required autofocus>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="person">Persona</label>
                                            <select name="persona" id="persona" class="form-control check-key" required autofocus>
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Fecha</label>
                                            <input type="datetime-local" class="form-control check-key" name="date" id="date" value="{{ date('Y-m-d').'T'.date('H:m') }}" min="{{ date('Y-m-d').'T00:00'}}" required autofocus>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Descripción</label>
                                            <textarea class="form-control check-key" placeholder="Ingrese la descripción de la cita" name="description" id="description" required autofocus cols="15" rows="5"></textarea>
                                        </div>
                                    </div>
                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Observación</label>
                                            <textarea class="form-control check-key" placeholder="Ingrese la Observación de la cita" name="observation" id="observation" required autofocus cols="15" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                
                                <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Cita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal create quote-->
@endsection
@section('scripts')
<!-- initialize the calendar on ready -->
<script type="application/javascript">
    $(document).ready(function () {
        legend();
        $("#my-calendar").zabuto_calendar({
            language: "es",
            cell_border: true,
            today: true,
            weekstartson: 0,
            nav_icon: {
            prev: '<i class="fa fa-chevron-circle-left"></i>',
            next: '<i class="fa fa-chevron-circle-right"></i>'
            },
            ajax: {
                url: '{{ url('ajax/quotes/calendar/') }}',
                modal: false
            },
            action: function () {
                return myDateFunction(this.id);
            }
        });
        $('.check-key').keyup(function(){
            var band=0;
            $('.check-key').each(function(){

                if($(this).val()!=''){
                    band=band+1;
                }else{
                    band=band+0;
                }
                console.log(band);

                if(band==$('.check-key').length){
                    $('#cre').removeAttr('disabled');
                }else{
                    $('#cre').attr('disabled','disabled');
                }
            });
        }); 

        $('#quote-new').on('click', function(){
            $('#quote-content').hide();
            $('#quote-persons').hide();
            $.ajax({
                url: '{{ url('ajax/quote/persons') }}',
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    $("#myModalQuotesCreate").modal("show");
                    $('.loading_modal_create').show();
                },
                success: function(data){
                    if(data!=0){
                        $('#quote-content').show();
                        $('.loading_modal_create').hide();
                        $("#persona").html(function(){
                            var html ='';
                            html +='<option value="">.::Seleccione::.</option>';
                            $.each(data.persons, function(i,item){
                                html +='<option value="'+item.id+'">'+item.fullnames+'</option>';
                            });
                            return html;
                        });
                        
                    }else if (data==0){
                        $('.loading_modal_create').hide();
                        $('#quote-persons').html('<div class="alert alert-warning" role="alert">No hay Personas en el Sistema, para Agregar una Cita Registre una Nueva Persona</div>').show();
                    }else{
                        $('.loading_modal_create').hide();
                        $('#quote-persons').html('<div class="alert alert-danger" role="alert">Error, Servidor no Responde!</div>');
                        console.log('Servidor no Responde');
                    }
                }
            });
        });

        $("#save-quote").submit(function( event ) {
            event.preventDefault();
            $.ajax({
                url: '{{ url('/ajax/quote/save') }}',
                method: "POST",
                dataType:"JSON",
                data:$("#save-quote").serialize(),
                beforeSend: function(){
                    $('.loading_modal_create').show();
                },
                success: function(data){
                    if(data==1){
                        $("#myModalQuotesCreate").modal("hide");
                        $("#myModalQuotes").modal("hide");
                        $('.loading_modal_create').hide();
                        $("#save-quote")[0].reset();

                        Swal.fire({
                        icon: 'success',
                        title: 'Cita Registrada',
                        text: "Para más Detalles Consulte el Calendario",
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#f39c12',
                        timer: 2000
                        });
                        setTimeout(() => { location.href = '{{ route('home') }}'; }, 1000);
                    }else if (data==2){
                        $("#myModalQuotesCreate").modal("hide");
                        $("#myModalQuotes").modal("hide");
                        $('.loading_modal_create').hide();
                        $("#save-quote")[0].reset();

                        Swal.fire({
                        icon: 'success',
                        title: 'Cita Registrada',
                        text: "Para mas Detalles Consulte el Calendario",
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#f39c12',
                        timer: 10000
                        });
                        legend();
                    }else if (data==3){
                        $("#save-quote")[0].reset();
                        $('.loading_modal_create').hide();

                        Swal.fire({
                        icon: 'warning',
                        title: 'Error!, en la fecha seleccionada',
                        text: "La fecha de la cita es menor a la fecha actual.",
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#f39c12',
                        timer: 10000
                        });
                    }
                },
                error: function(e){
                    console.log(e);
                }
            });
            return false;
        });
    });

    function myDateFunction(id) {
    
        var hasEvent = $("#" + id).data("hasEvent");
        var date    = $("#" + id).data("date");
        var day     = $('#day').val();
        var f1      = new Date(date);
        var f2      = new Date(day);
        var h       = '{{ date('H:m') }}';
        $('#quotes_day').hide();
        var dateControl = document.querySelector('input[type="datetime-local"]');
            dateControl.value = date+'T'+h;

        if(hasEvent==true){
            $.ajax({
                url: '{{ url('ajax/quotes') }}/'+date,
                type: 'get',
                dataType: 'json',
                beforeSend: function(){
                    $("#myModalQuotes").modal("show");
                    $('.loading_modal').show();
                },
                success: function(data){
                    if(data!=0){
                        $('.loading_modal').hide();
                        $("#quotes_day").html(function(){
                            var html ='';
                            $.each(data.quotes, function(i,item){
                                html +='<div class="col-md-6">';
                                    html +='<div class="panel panel-warning">';
                                        html +='<div class="panel-heading">'+item.title+' <span class="badge">'+item.date+'</spanle=></div>';
                                        html +='<div class="panel-body">';
                                            html +=''+item.description+'';
                                        html +='</div>';
                                        html +='<div class="panel-footer">'+item.fullnames+' <span class="badge">'+item.email+'</span></div>';
                                    html +='</div>'; 
                                html +='</div>';
                            });
                            return html;
                        }).show();
                        
                    }else if (data==0){
                        $('.loading_modal').hide();
                        $('#quotes_day').html('<div class="alert alert-warning" role="alert">No hay Citas Programadas para el Día Seleccionado </div>').show();
                    }else{
                        $('.loading_modal').hide();
                        $('#quotes_day').html('<div class="alert alert-danger" role="alert">Error, Servidor no Responde!</div>');
                        console.log('Servidor no Responde');
                    }
                }
            });
        }else{
            if(f1 >= f2){
                $('#quote-new').click();
            }
        }
    }

    function legend(){
        var day_quote = $('#day').val();
        $.ajax({
            url: '{{ url('ajax/quotes') }}/'+day_quote,
            type: 'get',
            dataType: 'json',
            beforeSend: function(){
                $('.loading_calendar').show();
            },
            success: function(data){
                if(data!=0){
                    $('.loading_calendar').hide();
                    $('#content-calendar').show();
                    $("#count-quote").text(data.quotes.length);
                    $("#list").html(function(){
                        var html ='';
                        $.each(data.quotes, function(i,item){
                            html +='<div class="col-md-6">';
                                 html +='<div class="panel panel-warning">';
                                     html +='<div class="panel-heading">'+item.title+' <span class="badge">'+item.date+'</spanle=></div>';
                                     html +='<div class="panel-body">';
                                        html +=''+item.description+'';
                                    html +='</div>';
                                    html +='<div class="panel-footer">'+item.fullnames+' <span class="badge">'+item.email+'</span></div>';
                                html +='</div>'; 
                            html +='</div>';
                        });
                        return html;
                    });

                    $("#count-list-quotes").html(function(){
                        var html ='';
                        $.each(data.quotes, function(i,item){
                            html +='<li class="dropdown-header" role="menu"><a href="#"><i class="fa fa-minus"></i> '+item.title+'</a></li>';
                            html +='<li role="separator" class="divider"></li>';
                        });
                            html +='<li class="dropdown-header" role="menu"><a href="{{ url('/dash/quote/list') }}" class="btn btn-warning btn-large btn-block">Lista de citas <i class="fa fa-eye "></i></a></li>';

                        return html;
                    });
                    
                }else if (data==0){
                    $('#content-calendar').show();
                    $('.loading_calendar').hide();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cero (0) Cita(s) para el '+$("#day").val(),
                        text: "Para más Detalles Consulte el Calendario",
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#f39c12',
                        timer: 10000
                        });
                    $('#valid-calendar').html('<div class="alert alert-warning" role="alert">No hay Citas Programadas, para el día '+$("#day").val()+'</div>').show();
                    setTimeout(() => { $('#valid-calendar').hide(); }, 10000);
                }else{
                    console.log('Servidor no Responde');
                }
            }
        }); 
    }
</script>
@endsection
