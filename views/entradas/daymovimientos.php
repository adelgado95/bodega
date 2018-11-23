
<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Movimientos del Día
    
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
              <h3 class="box-title">Seleccionar fecha:</h3>
            </div>
            <div class="box-body">
             <div class="form-group">
                <label for="inputIMEI" class="col-sm-1 control-label">Fecha: </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
             </div>
            </div>
            <!-- /.box-header -->
          
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Entradas </h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                  <table id="tmovimientos" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>IMEI</th>
                      <th>ICCID</th>
                      <th>MARCA</th>
                      <th>MODELO</th>
                      <th>PRECIO</th>
                      <th>PRECIOTAE</th>
                      <th>FECHA_ENTRADA</th>
                      <th>ESTADO</th>
                      <th>FECHA_SAL</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
                   <div class="form-group">
                    <div class="col-sm-5">
                        <button class="btn btn-success" id="btnExportarEntrada">EXPORTAR</button>  
                  </div>
              </div>
                </div>
            <!-- /.box-body -->
           
            </div>
      
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Salidas </h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                  <table id="tsalidas" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.Salida</th>
                      <th>IMEI</th>
                      <th>MODELO</th>
                      <th>DEPARTAMENTO</th>
                      <th>ZONA</th>
                      <th>CANAL</th>
                      <th>ENCARGADO</th>
                      <th>FECHA_SAL</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
                   <div class="form-group">
                    <div class="col-sm-5">
                        <button class="btn btn-success" id="btnExportarSalida">EXPORTAR</button>  
                  </div>
              </div>
                </div>
            <!-- /.box-body -->
           
            </div>        




          </div>
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
    var table = $('#tmovimientos').DataTable({"ordering": false});
  $('#btnExportarEntrada').click(function(){
      var vfecha = $("#datepicker").val();
      var vf = $('#combo1').val();
      location.href ="models/exports/exportentrada.php?fecha="+vfecha;
});
$('#btnExportarSalida').click(function(){
      var vfecha = $("#datepicker").val();
      var vf = $('#combo1').val();
          location.href ="models/exports/exportsalida.php?fecha="+vfecha;
});
$('#datepicker').datepicker({
           autoclose: true, format: 'yyyy-mm-dd',
    });
$("#datepicker").datepicker("setDate", new Date());

var table = $('#tmovimientos').DataTable();
var table2 = $('#tsalidas').DataTable({"ordering": false});
    CargarTabla(table);
    CargarSalidas(table2);
    function CargarSalidas(table){
      var vfecha = $("#datepicker").val();
           $.ajax({
            type:'GET',
            url:'models/salida.php?mode=getSalidasFecha&fecha='+$("#datepicker").val(),
            success:function(datos){
              if (!$.trim(datos))
              {
                  table.clear().draw();
                  return;
              }
               table.clear().draw();
             var select = $('#idModelo');
              select.empty();
             var dat = jQuery.parseJSON(datos);
             console.log(dat);
               $.each(dat,function(i,value){
                      table.row.add([dat[i].IdSalida,dat[i].Imei,dat[i].Modelo,dat[i].Departamento,dat[i].Zona,dat[i].Canal,dat[i].Encargado,dat[i].Fecha_Salida,dat[i].Estado]).draw();
                  //table.row.add([dat[i].Id,dat[i].Zona,dat[i].Departamento,dat[i].Canal,dat[i].Encargado,dat[i].Fecha,dat[i].Cantidad]).draw();
                 
                  })
                  }});

    }



    function CargarTabla(table){
         var vfecha = $("#datepicker").val();
           $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getAll&fecha='+$("#datepicker").val(),
            success:function(datos){
              if (!$.trim(datos))
              {
                  table.clear().draw();
                  return;
              }
               table.clear().draw();
             var select = $('#idModelo');
              select.empty();
             var dat = jQuery.parseJSON(datos);
             console.log(dat);
               $.each(dat,function(i,value){
                  table.row.add([dat[i].Imei,dat[i].Iccid,dat[i].Marca,dat[i].Modelo,dat[i].PrecioTAE,dat[i].Precio,dat[i].Fecha_Entrada,dat[i].Estado,dat[i].Fecha_Salida]).draw();
                  })
                  }});
    }
      $('#datepicker').datepicker().on('changeDate',function(e){

         
         var table2 = $('#tsalidas').DataTable();
         CargarSalidas(table2);
      var vfecha = $("#datepicker").val();
           $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getAll&fecha='+$("#datepicker").val(),
            success:function(datos){
              if (!$.trim(datos))
              {
                  
                  table.clear().draw();
                  return;
              } 
               table.clear().draw();
             var dat = jQuery.parseJSON(datos);
             console.log(dat);
               $.each(dat,function(i,value){
                 console.log(dat[i].Iccid+"IMEI"+dat[i].Imei)
                  table.row.add([dat[i].Imei,dat[i].Iccid,dat[i].Marca,dat[i].Modelo,dat[i].PrecioTAE,dat[i].Precio,dat[i].Fecha_Entrada,dat[i].Estado,dat[i].Fecha_Salida]).draw();
                  })
                  }});
    });



});

    
</script>

<?php 



 ?>
