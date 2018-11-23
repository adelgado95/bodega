
<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Productos en Bodega
        
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
              <h3 class="box-title">Productos en Bodega</h3>
            </div>
            <div class="box-body">
             <div class="form-group">
                
             </div>
            </div>
            <!-- /.box-header -->
          
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
                      <th>MARCA</th>
                      <th>MODELO</th>
                      <th>PRECIO</th>
                      <th>TAE</th>
                      <th>FECHAENTR</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
                </div>
            <!-- /.box-body -->
            <div class="form-group">
                    <div class="col-sm-5">
                        <button class="btn btn-success">EXPORTAR</button>  
                  </div>
              </div>
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

var table = $('#tmovimientos').DataTable();
    CargarTabla(table);
    function CargarTabla(table){
           $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getBodega',
            success:function(datos){
             if (datos == '0')
              {  
                
                return;
              }
              else{
               table.clear().draw();
             var dat = jQuery.parseJSON(datos);
             console.log(dat);
               $.each(dat,function(i,value){
                 console.log(dat[i].Iccid+"IMEI"+dat[i].Imei)
                       table.row.add([dat[i].Imei,dat[i].Iccid,dat[i].Marca,dat[i].Modelo,dat[i].PrecioTAE,dat[i].Precio,dat[i].Fecha_Entrada,dat[i].Estado]).draw();
                 
                  });
               }
                  }});
    }
     



});

    
</script>

<?php 

 ?>
