
<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="modal fade" id="modalBuscar">
          <div class="modal-dialog" >
            
          </style>>
            <div class="modal-content" style="width:900px">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buscar Factura:</h4>
              </div>
              <div class="modal-body">
              
              <table id="tablaBuscar" class="table table-bordered ">
                <thead>
                <tr>
                  <th>IMEI</th>
                  <th>ICCID</th>
                  <th>MARCAMODELO</th>
                  <th>PRECIO</th>
                  <th>PRECIOTAE</th>
                  <th>FECHA_SAL</th>
                  <th>FECHA_LIQ</th>
                  <th>LIQUIDADOR</th>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Facturas
        <small>Ver Facturas</small>
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
                  <h3 class="box-title">Facturas </h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                  <table id="tmovimientos" class="table table-bordered ">
                  <thead>
                    <tr>
                      <th>FACTURA</th>
                      <th>FECHA</th>
                      <th>CLIENTE</th>
                      <th>EJECUTIVO</th>
                      <th>CANTIDAD</th>
                      <th>LIQUIDADOR</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  </table>
                   <div class="form-group">
                    <div class="col-sm-5">
                        <button class="btn btn-success" id="btnVerDetalle">Ver Detalle</button>  
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
  
//---------------------bOTON PARA VER EL MODAL
  $('#btnVerDetalle').click(function(){
    CargarTablaDetalle();
     $('#modalBuscar').modal('show');
    return false;

  });
  //---------------------ACTIVACION DE DATATABLE
    var table = $('#tmovimientos').DataTable({"ordering": false,"select": {
            "style": 'single'
        }});
    var tabladetalle = $('#tablaBuscar').DataTable();
    function CargarTablaDetalle()
    {
         $.ajax({
            type:'GET',
            url:'models/facturas.php?mode=getDetalle&factura='+selected[0],
            success:function(datos){
              if (!$.trim(datos))
              {
                  table.clear().draw();
                  return;
              }
               tabladetalle.clear().draw();
            
             var dat = jQuery.parseJSON(datos);
             console.log(dat);
               $.each(dat,function(i,value){
                  tabladetalle.row.add([dat[i].Imei,dat[i].Iccid,dat[i].MarcaModelo,dat[i].Precio,dat[i].PrecioTAE,dat[i].Fecha_Sal,dat[i].Fecha_Liq,dat[i].Liquidador]).draw();
                  })
                  }});
    }

$('#datepicker').datepicker({
           autoclose: true, format: 'yyyy-mm-dd',
    });
$("#datepicker").datepicker("setDate", new Date());

var table = $('#tmovimientos').DataTable();
var selected;
  $('#tmovimientos tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('active') ) {
             $(this).removeClass('active');
        }
        else {
            table.$('tr.active').removeClass('active');
            $(this).addClass('active');
            selected = table.row(this).data();
            console.log(table.row(this).data());

        }
    });
 $('#datepicker').datepicker().on('changeDate',function(e){
  CargarTabla();
 });

    CargarTabla();
    function CargarTabla(){
         var vfecha = $("#datepicker").val();
           $.ajax({
            type:'GET',
            url:'models/facturas.php?mode=getFecha&fecha='+$("#datepicker").val(),
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
                  table.row.add([dat[i].Factura,dat[i].Fecha_Liq,dat[i].Cliente,dat[i].Ejecutivo,dat[i].Cantidad,dat[i].Liquidador]).draw();
                  })
                  }});
    }




});

    
</script>

<?php 



 ?>
