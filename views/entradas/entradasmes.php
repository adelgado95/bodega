<?php 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        
      <div class="row">
       

        <!-- /.col -->
       
     <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Entradas por mes</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
            

        <!-- /.col -->
       <div class="form-group">
                <label class="col-sm-1 control-label">Mes: </label>
                  <div class="col-sm-2">
                    <select class="form-control select2" id="selectMes">
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                  </div>
                   <label class="col-sm-1 control-label">Año: </label>
                  <div class="col-sm-2">
                    <select class="form-control select2" id="selectAnyo">
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                    </select>
                  </div>
                  <button class="btn btn-primary" id="btnAceptar">Aceptar</button>
             </div>
       
      <div class="box-body">
       
        <table>
             <table id="tablaSalidas" class="table table-bordered">
                <thead>
                <tr>
                  <th>MODELO</th>
                  <th>MARCA</th>
                  <th>MES</th>
                  <th>AÑO</th>
                  <th>CANTIDAD</th>
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
       $('#btnAceptar').click(function(){
          var mes = $('#selectMes').val();
          var anyo = $('#selectAnyo').val();
          CargarTablaSalidas(mes,anyo);
       });
      function CargarTablaSalidas(mes,anyo)
      {
        $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getentradasmes&anio='+anyo+'&mes='+mes,
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
                  table.row.add([dat[i].Modelo,dat[i].Marca,dat[i].Mes,dat[i].Anio,dat[i].Cantidad]).draw();
                });
          }
        });
      }
    });

</script>

<?php 

include_once('overall/footer.php');

 ?>
