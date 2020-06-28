<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilos.css')); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    
      <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
      <link href="<?php echo e(asset('css/zabuto_calendar.min.css')); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('css/easy-autocomplete.min.css')); ?>">
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
    <input type="hidden" id="day" value="<?php echo e(date('Y-m-d')); ?>">
    <div id="calendar_content"></div>
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
                                        <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 54px">
                                    </div>
                                </div>
                                <div id="quotes_day" style="display: none"></div>   
                            </div>
                        </div>
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        
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
                                        <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 54px">
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
                                                    <input type="datetime-local" class="form-control check-key" name="date" id="date" required autofocus>
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
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('js/axios.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo e(asset('js/jquery.easy-autocomplete.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/zabuto_calendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert2.all.min.js')); ?>"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
        
    <script>
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
        });

        $(document).ready(function () {
            legend();

            $("#calendar_content").zabuto_calendar({
                language: "es",
                cell_border: true,
                today: true,
                weekstartson: 0,
                nav_icon: {
                prev: '<i class="fa fa-chevron-circle-left"></i>',
                next: '<i class="fa fa-chevron-circle-right"></i>'
                },
                ajax: {
                    url: '<?php echo e(url('ajax/quotes/calendar/')); ?>',
                    modal: false
                },
                action: function () {
                    return myDateFunction(this.id);
                }
            });

            $('#quote-new').on('click', function(){
            $('#quote-content').hide();
            $('#quote-persons').hide();
            $.ajax({
                url: '<?php echo e(url('ajax/quote/persons')); ?>',
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
                    url: '<?php echo e(url('/ajax/quote/save')); ?>',
                    method: "POST",
                    dataType:"JSON",
                    data:$("#save-quote").serialize(),
                    beforeSend: function(){
                        $('.loading_modal_create').show();
                    },
                    success: function(data){
                        if(data!=0){
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
                            timer: 5000
                            });
                            calendar();
                            legend();
                        }
                    },
                    error: function(e){
                        console.log(e);
                    }
                });
                return false;
            });
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

        

        function myDateFunction(id) {
        
            var hasEvent = $("#" + id).data("hasEvent");
            var date    = $("#" + id).data("date");
            var day     = $('#day').val();
            var f1      = new Date(date);
            var f2      = new Date(day);
            $('#quotes_day').hide();

            if(hasEvent==true){
                $.ajax({
                    url: '<?php echo e(url('ajax/quotes')); ?>/'+date,
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

        function calendar(){
        $('.loading_calendar').show();
        axios.get('<?php echo e(route('calendar-quote')); ?>', {
        }).then(response => {
            $(".loading_calendar").fadeOut();
            $("#my-calendar").html(response.data);
        }).catch(e => {
            $(".loading_calendar").fadeOut();
            console.log(e);
        });

       /*  $.ajax({
            url: '<?php echo e(url('/ajax/calendar/quote')); ?>/',
            type: 'get',
            dataType: 'json',
            beforeSend: function(){
                $('.loading_calendar').show();
            },
            success: function(data){
                $("#my-calendar").html(data);
            },
            error: function(e){
                console.log(e);
            }
        });  */
    }

    function legend(){
        var day_quote = $('#day').val();
        $.ajax({
            url: '<?php echo e(url('ajax/quotes')); ?>/'+day_quote,
            type: 'get',
            dataType: 'json',
            beforeSend: function(){
                $('.loading_calendar').show();
            },
            success: function(data){
                if(data!=0){
                    $('.loading_calendar').hide();
                    $('#content-calendar').show();
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
                    
                }else if (data==0){
                    $('#content-calendar').show();
                    $('.loading_calendar').hide();
                    Swal.fire({
                        icon: 'warning',
                        title: 'No hay Citas Programadas',
                        text: "Para más Detalles Consulte el Calendario",
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#f39c12',
                        timer: 5000
                        });
                    $('#valid-calendar').html('<div class="alert alert-warning" role="alert">No hay Citas Programadas</div>').show();
                    setTimeout(() => { $('#valid-calendar').hide(); }, 5000);
                }else{
                    console.log('Servidor no Responde');
                }
            }
        }); 
    }
    </script>
</body>
</html>
