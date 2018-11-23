
<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Reporte de Entradas
        <small></small>
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
                <label for="inputIMEI" class="col-sm-1 control-label">Fecha Inicio: </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control pull-right" id="datepicker1">
                  </div>
                    <label for="inputIMEI" class="col-sm-1 control-label">Fecha Fin: </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control pull-right" id="datepicker2">
                  </div>
                   <label for="inputIMEI" class="col-sm-1 control-label"></label>
                  <div class="col-sm-3">
                    <button class="btn btn-primary" Id="btnAceptar">Aceptar</button>
          &nbsp
                    <div class="col-sm-5">
                        <button class="btn btn-success" id="btnExportarEntrada">EXPORTAR</button>  
                  </div>
                
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
                      <th>PREC</th>
                      <th>TAE</th>
                      <th>FECHA_EN</th>
                      <th>ESTADO</th>
                      <th>FECHA_SAL</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
                   
                </div>
            <!-- /.box-body -->
           
            </div>
      
           



          </div>
        </div>

      </section>
      </div>

    

    <!-- /.content -->

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
  $('#btnAceptar').click(function(){
    CargarSalidas();
  });
  $('#btnExportarEntrada').click(function () {
        var vfecha = $("#datepicker1").val();
      var vfecha2 = $('#datepicker2').val();
      location.href ="models/exports/exportentradasfechas.php?fechai="+vfecha+"&fechaf="+vfecha2;
  });
  var table = $('#tmovimientos').DataTable({
    "autoWidth": true
  });
    function CargarSalidas(){
      var vfecha = $("#datepicker1").val();
      var vfecha2 = $('#datepicker2').val();
           $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=reportentradasfechas&fechai='+vfecha+'&fechaf='+vfecha2,
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
                      table.row.add([dat[i].Imei,dat[i].Iccid,dat[i].Marca,dat[i].Modelo,dat[i].Precio,dat[i].PrecioTAE,dat[i].Fecha_Entrada,dat[i].Estado,dat[i].Fecha_Salida]).draw();
                    })
                  }});
         

       }


  $('#datepicker1').datepicker({
           autoclose: true, format: 'yyyy-mm-dd',
    });
$("#datepicker1").datepicker("setDate", new Date());
  $('#datepicker2').datepicker({
           autoclose: true, format: 'yyyy-mm-dd',
    });

$("#datepicker2").datepicker("setDate", new Date());

});


    
</script>

<?php 



 ?>
