<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nueva Entrada
        <small>Ingrese Nueva Entrada</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

         <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Entradas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  
                   <label for="inputIMEI" class="col-sm-1 control-label">IMEI</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputIMEI" placeholder="">
                  </div>
                  <label for="inputICCID" class="col-sm-1 control-label">ICCID</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputICCID" placeholder="">
                  </div>
                  <label for="inputICCID" class="col-sm-1 control-label">Precio:</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputPrecio" placeholder="">
                  </div>
                 
                </div>
                 <div class="form-group">
                    <label for="inputModel" class="col-sm-1 control-label">Marca</label>
                  <div class="col-sm-2">
                         <select class="form-control select2" id="idMarca" style="width: 100%;">
                      
                         </select>
                      
                  </div>
                  <label for="inputPassword3" class="col-sm-1 control-label">Modelo</label>
                  <div class="col-sm-2">
                     <select class="form-control select2" id="idModelo" style="width: 100%;">
                      
                    </select>
                  </div>
                  <label for="inputIMEI" class="col-sm-1 control-label">PrecioTAE: </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputPrecioTae" placeholder="">
                  </div>
                  <label for="inputIMEI" class="col-sm-1 control-label">Fecha: </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
                <!------------------------1ER FORM GROUPT----------------->
                
                                <!------------------------1ER FORM GROUPT----------------->
                                <!------------------------2DO FORM GROUPT----------------->
               
                  <div class="form-group">
                    <div class="col-sm-5">
                      
                  
                </div>
                  <!------------------------2DO FORM GROUPT----------------->
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            </form>
            
                  </div>
                    <button class="btn btn-primary" id="btnAgregar" >Agregar</button>  
             <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalle </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>IMEI</th>
                  <th>ICCID</th>
                  <th>MARCA</th>
                  <th>MODELO</th>
                  <th>PRECIO</th>
                  <th>TAE</th>
                </tr>
                </thead>
                <tbody>
               
              </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
            <div class="form-group">
                    <div class="col-sm-5">
                        <button class="btn btn-primary" id='btnEntrar'>ACEPTAR</button>  
                  </div>
          </div>
    

    </section>
    <!-- /.content -->
  </div>
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="views/entradas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/entradas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="views/entradas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/entradas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="views/entradas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="views/entradas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/entradas/bower_components/fastclick/lib/fastclick.js"></script>
<script src="views/entradas/dist/js/adminlte.min.js"></script>
<script>

 $(document).ready(function() {
  function buscarentabla(imei)
  { 
    var table = $('#example1').DataTable();
    var band = 0;
    table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
         var data = this.data();
          if(imei == data[0])
          {
            console.log("imei"+imei+",data0"+data[0]);
            band = 1;
          }
      });
      return band;

  }

     $('#datepicker').datepicker({
           autoclose: true, format: 'yyyy-mm-dd',
    });
     $("#datepicker").datepicker("setDate", new Date());


         $('#inputICCID').keyup(function(event) {
           var message =  $('#inputICCID').val();
              if(message.length == 15)
       setTimeout(function() { $('#inputPrecio').focus() }, 1);
/*    var message =  $('#inputICCID').val();
    if(message.length == 16)
       setTimeout(function() { $('#inputIMEI').focus() }, 1);*/
      }); //endTextMessage keyup

      $('#inputIMEI').keyup(function(event) {
        var message =  $('#inputIMEI').val();
    if(message.length == 15)
       setTimeout(function() { $('#inputICCID').focus() }, 1);
    /*var message =  $('#inputIMEI').val();
    if(message.length == 16)
       setTimeout(function() { $('#idMarca').focus() }, 1);*/
      }); //endTextMessage keyup

/*-------------------SetSelecChange*/

$('#idMarca').on('change', function() {
      $.ajax({
            type:'GET',
            url:'models/models.php?mode=getModelofromMarca&marca='+this.value,
            success:function(datos){
             var select = $('#idModelo');
              select.empty();
             var dat = jQuery.parseJSON(datos);
        //     console.log(dat);
               $.each(dat,function(i,value){
                 $('#idModelo').append($('<option>').text(dat[i].Modelo).attr('value', dat[i].Modelo));

                  })
                  }})

    });

        

/*-----------------Cargar---Select-------------*/
    $.ajax({
            type:'POST',
            url:'models/marca.php?mode=getAll',
            success:function(data){
              var select = $('#idMarca');
              select.empty();
              var dat = jQuery.parseJSON(data); 
               $.each(dat,function(i,value){
                 $('#idMarca').append($('<option>').text(dat[i].Marca).attr('value', dat[i].Id));
            });

        }}); 

        $.ajax({
            type:'GET',
            url:'models/models.php?mode=getModelofromMarca&marca=1',
            success:function(datos){
             var select = $('#idModelo');
              select.empty();
             var dat = jQuery.parseJSON(datos);
           //  console.log(dat);
               $.each(dat,function(i,value){
                 $('#idModelo').append($('<option>').text(dat[i].Modelo).attr('value', dat[i].Modelo));
                 
                  })
                  }});
  var table = $('#example1').DataTable();
    $('#btnAgregar').click(
      function(){
         if($('#inputIMEI').val().length === 0 | $('#inputIMEI').val().length === 0 | $('#inputPrecio').val().length === 0 | $('#inputPrecioTae').val().length === 0)
              {
                alert("Por favor llene todos los campos");
                return false;
              }
        var result="0";
      var IMEI = $('#inputIMEI').val();
       if(buscarentabla(IMEI) == true){
                  alert("Ya esta en tabla");
                  return false;
                }
                else{
        $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getIMEI&IMEI='+IMEI,
            success:function(datos){
             result = parseInt(datos);
             if(result)
             {
                alert("Ese IMEI ya existe");
             }
             else{
                var body = $('#example1 tbody');
                var ICCID = $('#inputICCID').val();
                var IMEI = $('#inputIMEI').val();
                var marca = $('#idMarca option:selected').text();
                var modelo = $('#idModelo option:selected').text();
                var precio = $('#inputPrecio').val();
                var preciotae = $('#inputPrecioTae').val();
                table.row.add([IMEI,ICCID,marca,modelo,precio,preciotae]).draw();
                $('#inputICCID').val("");
                $('#inputIMEI').val("");
             }
               }
                });

       return false;
     }
      });

     $('#btnEntrar').click(
      function(){
        var list = [];
        var fecha = $('#datepicker').val();

       table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {

         var data = this.data();
          item = {}
          item ["imei"] = data[0];
          item ["iccid"] = data[1];
          item ["marca"] = data[2];
          item ["modelo"] = data[3];
          item ["precio"] = data[4];
          item ["fecha_entrada"] = fecha;
          item ["fecha_salida"] = "null";
          item ["estado"] = "ENBODEGA";
          item ["precio_tae"] = data[5];
          item ["no_salida"] = "-1";
          item ["devuelto"] = "0";


                //  var row = '{"iccid":"'+data[0]+'","imei":"'+data[1]+'","marca":"'+data[2]+'","modelo":"'+data[3]+'","precio":"'+data[4]+'","fecha_entrada":"2018-10-22","fecha_salida":"2018-10-22","estado":"ENBODEGA","no_salida":"-1","devuelto":"0"}';
              
             console.log(item);   
            list.push(item);



//---------------------------Mandar solicitud-----------------------------
/*         $.ajax({
            type:'GET',
              url:'http://localhost/bodega/mainapp/models/entrada.php?mode=save,iccid='+data[0]+'&imei='+data[1]+'&marca='+data[2]+'&modelo='+data[3]+'&precio='+data[4]+"&fecha_entrada=2018-10-22&fecha_salida=2018-10-22&estado=ENBODEGA&no_salida=-1&devuelto=0",
            success:function(datos){
              console.log(datos);
          
                  }});*/
      });

    
       console.log(list);
          $.ajax({
            type:'POST',
              dataType: 'json',
            data:JSON.stringify(list),
            url:'models/entrada_arreglo.php',
            success:function(datos){
           alert("Se han insertado"+datos+"filas");

                  }});

    
       table.clear().draw();
       return false;
      
      });

});  
</script>

<?php 

include_once('overall/footer.php');

 ?>
