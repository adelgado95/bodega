
<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Liquidación
        <small>Ingrese datos liquidación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
         <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" id="labelSalida">Nueva Salida</h3>  
              <span>Liquidador: </span>  
                <span id="idLiquidador"><?php echo $_SESSION['user']?> </span>      
            <!-- /.box-header -->
            <!-- form start -->
           </div>
              <div class="box-body">

               <!------------------------1ER FORM GROUPT----------------->
                 <form class="form-horizontal">
                   <div class="form-group">
                    <label for="inputICCID" class="col-sm-1 control-label">IMEI:</label>
                    <label class="col-sm-2 control-label" id="imeiBuscado"></label>
                  <div class="col-sm-2">
                    <button class="btn btn-primary" id="btnBuscar">Buscar</button>
                  </div>
                  <label class="col-sm-1 control-label">ICCID:</label>
                    <label class="col-sm-2 control-label" id="iccidBuscado"></label> 
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">MARCA:</label>
                     <div class="col-sm-2">
                        <label class="col-sm-1 control-label" id="marcaBuscado"></label>
                  </div>
                    <label class="col-sm-1 control-label">MODELO:</label>
                     <div class="col-sm-2">
                        <label class="control-label text-ligth-blue" id="modeloBuscado"></label>
                  </div>
                    <label class="col-sm-1 control-label">ZONA:</label>
                     <div class="col-sm-2">
                        <label class="col-sm-1 control-label" id="zonaBuscado"></label>
                  </div>
                  <label class="col-sm-1 control-label">CANAL:</label>
                     <div class="col-sm-2">
                        <label class="col-sm-1 control-label" id="canalBuscado"></label>
                  </div>   
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">PRECIO:</label>
                     <div class="col-sm-1">
                        <label class=" control-label" id="precioBuscado"></label>
                  </div>
                    <label class="col-sm-2 control-label">PRECIO_TAE:</label>
                     <div class="col-sm-1">
                        <label class="control-label" id="precioTAEBuscado"></label>
                  </div>
                    <label class="col-sm-1 control-label">No_Factura:</label>
                     <div class="col-sm-2">
                        <input type="text" class="form-control" id="inputFactura" placeholder="">
                  </div>
                  <label class="col-sm-1 control-label">Ejecutivo:</label>
                     <div class="col-sm-2">
                        <select class="form-control select2" id="selectEjecutivo" style="width: 100%;">
                        </select>
                  </div>

                  </div>
                  <div class="form-group">
                        <label class="col-sm-1 control-label">ENCARGADO:</label>
                     <div class="col-sm-2">
                        <label class="col-sm-1 control-label" id="encargadoBuscado"></label>
                  </div>
                  <label class="col-sm-1 control-label">Fecha_Salida:</label>
                     <div class="col-sm-2">
                           <input type="text" class="form-control pull-right" id="fechaBuscado" disabled>
                      </div>
                   <label class="col-sm-1 control-label">Fecha:</label>
                     <div class="col-sm-2">
                           <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                   <label class="col-sm-1 control-label" >Cliente:</label>
                     <div class="col-sm-2">
                           <input type="text" class="form-control pull-right" id="inputCliente">
                  </div>


                  </div>
                   </form> 
                <div class="col-sm-2">
                    <button class="btn btn-primary" id="btnAgreg">Agregar</button>
                  </div>
                  
             
              </div>
            <div class="box">

            <div class="box-header">
              <h3 class="box-title">Detalle </h3>
            </div>
            <!-- /.box-header -->
          
            <div class="box-body">
              <table id="tmovimientos" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>IMEI</th>
                  <th>ICCID</th>
                  <th>MARCA-MODELO</th>    
                  <th>PRECIO</th>
                  <th>PRECIOTAE</th>
                  <th>NO.FACT</th>
                  <th>CLIENTE</th>
                  <th>EJECUTIVO</th>
                  <th>POS</th>
                  <th>ZONA</th>
                  <th>CANAL</th>
                  <th>Fecha_Sal</th>
                  <th>Fecha_Liq</th>
                </tr>
                </thead>
                <tbody>
               
                </tbody>
              
              </table>
            </div>
            </div>
            <!-- /.box-body -->
            <div class="form-group">
                    <div class="col-sm-5">
                        <button class="btn btn-primary" id='btnEntrar'>INGRESAR LIQUIDACION</button>  
                  </div>
          </div>
        </div>
  


    

    </section>
    <!-- /.content -->
     <div class="modal fade" id="modalBuscar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buscar IMEI:</h4>
              </div>
              <div class="modal-body">
              
              <table id="tablaBuscar" class="table table-bordered ">
                <thead>
                <tr>
                  <th>IMEI</th>
                  <th>ICCID</th>
                  <th>MARCA</th>
                  <th>MODELO</th>
                  <th>PRECIO</th>
                </tr>
                </thead>
                <tbody>
               
                </tbody>
              
              </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnCerrar">Aceptar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
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
        var table = $('#tmovimientos').DataTable();
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



    CargarEjecutivos();
    var selected;

  var tabla = $('#tablaBuscar').DataTable({"ordering": false});
   var tabl = $('#tmovimientos').DataTable({"ordering": false});
  function CargarSalidas(){
          tabla.clear().draw();
           $.ajax({
            type:'GET',
            url:'models/salida.php?mode=getAllSalidas',
            success:function(datos){
              if (!$.trim(datos))
              {
                  tabla.clear().draw();
                  return;
              }
               tabla.clear().draw();
             var select = $('#idModelo');
              select.empty();
             var dat = jQuery.parseJSON(datos);
             console.log(dat);
               $.each(dat,function(i,value){
                      tabla.row.add([dat[i].Imei,dat[i].Iccid,dat[i].Marca,dat[i].Modelo,dat[i].Precio]).draw();
                  })
                  }});

             }
   CargarSalidas();
    $('#tablaBuscar tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('active') ) {
             $(this).removeClass('active');
        }
        else {
            tabla.$('tr.active').removeClass('active');
            $(this).addClass('active');
            selected = tabla.row(this).data();
            console.log(tabla.row(this).data());

        }
    });
       $('#btnEntrar').click(function(){

      var list = [];
        var fecha = $('#datepicker').val();
       tabl.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
         var data = this.data();
          item = {}
          item ["imei"] = data[0];
          item ["iccid"] = data[1];
          item ["marcaModelo"] = data[2];
          item ["precio"] = data[3];
          item ["precioTAE"] = data[4];
          item ["factura"] = data[5];
          item ["cliente"] = data[6]
          item ["ejecutivo"] = data[7];
          item ["pos"] = data[8];
          item ["zona"] = data[9];
          item ["canal"] = data[10];
          item ["fecha_sal"] = data[11];
          item ["fecha_liq"] = data[12];
          item["liquidador"] = $('#idLiquidador').text();
        
             console.log(item);   
            list.push(item);
      });
       console.log(list);
          $.ajax({
            type:'POST',
              dataType: 'json',
            data:JSON.stringify(list),
            url:'models/liquidacion_arreglo.php',
            success:function(datos){
           alert("Se han insertado"+datos+"filas");
               tabl.clear().draw(); CargarSalidas();

                  }});
       
       return false;
      });
  $('#btnBuscar').click(function(){
    $('#modalBuscar').modal('show');
    return false;
  });
    $('#btnCerrar').click(function(){
      var imei = selected[0];
      console.log("arreglo obtenido"+imei);
      CargarElementos(imei);
    $('#modalBuscar').modal('hide');
    return false;
  });
      
      function CargarElementos(imei)
      {      $.ajax({
            type:'GET',
            url:'models/salida.php?mode=getSalidaImei&imei='+imei,
            success:function(datos){
                var dat = jQuery.parseJSON(datos);
               $.each(dat,function(i,value){
                      $('#imeiBuscado').text(dat[i].Imei);
                      $('#iccidBuscado').text(dat[i].Iccid);                                            
                      $('#marcaBuscado').text(dat[i].Marca);
                      $('#zonaBuscado').text(dat[i].Zona);
                      $('#canalBuscado').text(dat[i].Canal);
                      $('#modeloBuscado').text(dat[i].Modelo);
                      $('#encargadoBuscado').text(dat[i].Encargado);
                      $('#precioBuscado').text(dat[i].Precio);
                      $('#precioTAEBuscado').text(dat[i].PrecioTAE);
                      $('#fechaBuscado').val(dat[i].Fecha_Salida);
                  })
                  }});
      }
      function CargarEjecutivos()
      {
    $.ajax({
            type:'POST',
            url:'models/ejecutivos.php',
            success:function(data){
              var select = $('#selectEjecutivo');
              select.empty();
              var dat = jQuery.parseJSON(data); 
               $.each(dat,function(i,value){
                 $('#selectEjecutivo').append($('<option>').text(dat[i].Nombres).attr('value',dat[i].Pos));
            });

        }}); 
      }       
       
    $('#btnAgreg').click(function(){
           var imei= $('#imeiBuscado').text();
                if(buscarentabla(imei) == true){
                  alert("Ya esta en tabla");
                  return false;
                }
              if($('#inputFactura').val().length === 0 || $('#inputCliente').val().length === 0 )
              {
                alert("Numero de Factura Vacío");
                return false;
              }

                      var fecha_liq = $('#datepicker').val();
                      var iccid = $('#iccidBuscado').text();                                            
                      var marca = $('#marcaBuscado').text();
                      var zona = $('#zonaBuscado').text();
                      var canal = $('#canalBuscado').text();
                      var modelo = $('#modeloBuscado').text();
                      var encargado = $('#encargadoBuscado').text();
                      var precio = $('#precioBuscado').text();
                      var precioTAE = $('#precioTAEBuscado').text();
                      var factura = $('#inputFactura').val();
                      var ejecutivo = $('#selectEjecutivo option:selected').text();
                      var pos = $('#selectEjecutivo').val();
                      var fecha_sal = $('#fechaBuscado').val();
                      var cliente = $('#inputCliente').val();
                      
      tabl.row.add([imei,iccid,marca+modelo,precio,precioTAE,factura,cliente,ejecutivo,pos,zona,canal,fecha_sal,fecha_liq]).draw();
             $('#imeiBuscado').text('');
                      $('#iccidBuscado').text('');                                            
                      $('#marcaBuscado').text('');
                      $('#zonaBuscado').text('');
                      $('#canalBuscado').text('');
                      $('#modeloBuscado').text('');
                      $('#encargadoBuscado').text('');
                      $('#precioBuscado').text('');
                      $('#precioTAEBuscado').text('');
                       $('#inputFactura').val('');
      return false;
    });
 

});
</script>

<?php 

include_once('overall/footer.php');

 ?>
