<?php 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-arrow-down-a"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Entradas</span>
              <span class="info-box-number" id="entradas">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-home-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bodega</span>
              <span class="info-box-number" id="bodega">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-arrow-up-a"></i></span>

            <div clss="info-box-content">
              <span class="info-box-text">Salidas</span>
              <span class="info-box-number" id="salidas">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Liquidaciones</span>
              <span class="info-box-number" id="liquidaciones"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
     <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Salidas Sin Liquidar</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
            

        <!-- /.col -->
      
      <div class="box-body">
        <table>
             <table id="tablaSalidas" class="table table-bordered">
                <thead>
                <tr>
                  <th>IMEI</th>
                  <th>ICCID</th>
                  <th>MARCA</th>
                  <th>MODELO</th>
                  <th>PRECIO</th>
                  <th>TAE</th>
                  <th>DEPARTAMENTO</th>
                  <th>ZONA</th>
                  <th>CANAL</th>
                  <th>ENCARGADO</th>
                  <th>FECHA_SAL</th>
                </tr>
                </thead>
                <tbody>
               
              </tbody>
              
              </table>
        </table>
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
      var table = $('#tablaSalidas').DataTable();
      CargarCajasporMes();
      CargarTablaSalidas();
      function CargarTablaSalidas()
      {
        $.ajax({
            type:'GET',
            url:'models/salida.php?mode=getSalidasnoLiq',
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
                 console.log(dat);
                  table.row.add([dat[i].Imei,dat[i].Iccid,dat[i].Marca,dat[i].Modelo,dat[i].Precio,dat[i].PrecioTAE,dat[i].Departamento,dat[i].Zona,dat[i].Canal,dat[i].Encargado,dat[i].Fecha_Salida]).draw();
                  })
              
               }
                });

      }
       function CargarCajasporMes($mes){
        //-------------------Cargar Entradas----------
                $.ajax({
            type:'GET',
            url:'models/cajas.php?mode=getEntradas',
            success:function(datos){
                    dat = jQuery.parseJSON(datos);
                    console.log(dat[0].Total);
                    $('#entradas').text(dat[0].Total);
                  }
                });


                //------------------
                $.ajax({
            type:'GET',
            url:'models/cajas.php?mode=getSalidas',
            success:function(datos){
                    dat = jQuery.parseJSON(datos);
                    console.log(dat[0].Total);
                    $('#salidas').text(dat[0].Total);
                  }
                });
                //------------------------
                $.ajax({
            type:'GET',
            url:'models/cajas.php?mode=getBodega',
            success:function(datos){
                    dat = jQuery.parseJSON(datos);
                    console.log(dat[0].Total);
                    $('#bodega').text(dat[0].Total);
                  }
                });
                  //------------------------
                $.ajax({
            type:'GET',
            url:'models/cajas.php?mode=getLiquidaciones',
            success:function(datos){
                    dat = jQuery.parseJSON(datos);
                    console.log(dat[0].Total);
                    $('#liquidaciones').text(dat[0].Total);
                  }
                });
          } 

          




    });
 
</script>

<?php 



 ?>
