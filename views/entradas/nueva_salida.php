
<?php 

include_once('overall/header.php');

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Nueva Salida
        <small>Ingrese nueva salida de producto</small>
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
              <h3 class="box-title" id="labelSalida">Nueva Salida#</h3>
      
            <!-- /.box-header -->
            <!-- form start -->
           </div>
              <div class="box-body">

               <!------------------------1ER FORM GROUPT----------------->
                 <form class="form-horizontal">
                   <div class="form-group">
                    <label for="inputICCID" class="col-sm-1 control-label">Depto:</label>
                    <div class="col-sm-3">
                       <select class="form-control select2" id="idDepartamento">        
                       </select>
                    </div>
                      <label for="inputICCID" class="col-sm-1 control-label">Zona:</label>
                    <div class="col-sm-3">
                       <select class="form-control select2" id="idZona">
                           <option value="selected">Juan Carlos </option>
                       </select>
                    </div>
                      <label for="inputICCID" class="col-sm-1 control-label">Canal:</label>
                     <div class="col-sm-2">
                       <select class="form-control select2" id="idCanal">
                           <option value="selected">Juan Carlos </option>
                       </select>
                  </div>
                  </div>
              </form> 

               <!------------------------1ER FORM GROUPT----------------->
                <form class="form-horizontal">
                   <div class="form-group">
                     <label for="inputICCID" class="col-sm-1 control-label">Encargado:</label>
                    <div class="col-sm-3">
                       <select class="form-control select2" id="idEncargado">
                       </select>
                    </div>
                      <label for="inputICCID" class="col-sm-1 control-label">Fecha:</label>
                     <div class="col-sm-2">
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                  </div>
              </form> 

              </div>
             
                
                                <!------------------------1ER FORM GROUPT----------------->
                                <!------------------------2DO FORM GROUPT----------------->
               
                 
              <!-- /.box-body -->
             
             <!-- /.box-footer -->
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detalle </h3>
            </div>
          
            <!-- /.box-header -->
            <div class="box-body">
               <label for="inputIMEI" class="col-sm-1 control-label">IMEI: </label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputIMEI" placeholder="">
                  </div>
                  <div class="col-sm-3">
                    <button class="btn btn-primary" id="btnAdd">Agregar</button>
                  </div>
            </div>
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
                        <button class="btn btn-primary" id='btnEntrar'>ACEPTAR</button>  
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

$('#idDepartamento').on('change', function() {

      $.ajax({
            type:'GET',
            url:'models/models.php?mode=getModelofromMarca&marca='+this.value,
            success:function(datos){
             var select = $('#idModelo');
              select.empty();
             var dat = jQuery.parseJSON(datos);
               $.each(dat,function(i,value){
                 $('#idModelo').append($('<option>').text(dat[i].Modelo).attr('value', dat[i].Modelo));

                  })
                  }})
    
    });
     
  function CargarDepartamentos()
  {
          $.ajax({
            type:'POST',
            url:'models/departamento.php?mode=getAll',
            success:function(data){
              var select = $('#idDepartamento');
              select.empty();
              var dat = jQuery.parseJSON(data); 
               $.each(dat,function(i,value){
                 $('#idDepartamento').append($('<option>').text(dat[i].Departamento).attr('value', dat[i].Id));
            });

        }}); 
  }

  function CargarZonafromDepartamento()
  {
    var dept;
    if($('#idDepartamento').val() == null)
    {
        dept=1;
    }
    else{ 
      dept= $('#idDepartamento').val();
    }
         $.ajax({
            type:'GET',
            url:'models/zona.php?mode=get&departamento='+dept,
            success:function(data){
              var select = $('#idZona');
              select.empty();
              var dat = jQuery.parseJSON(data); 
               $.each(dat,function(i,value){
                 $('#idZona').append($('<option>').text(dat[i].Zona).attr('value', dat[i].Id));
            });

        }}); 
  }
  function CargarCanales()
  {
    $.ajax({
            type:'POST',
            url:'models/canal.php?mode=getAll',
            success:function(data){
              var select = $('#idCanal');
              select.empty();
              var dat = jQuery.parseJSON(data); 
               $.each(dat,function(i,value){
                 $('#idCanal').append($('<option>').text(dat[i].Canal).attr('value', dat[i].Id));
            });

        }}); 
  }
  function CargarEncargado()
  {
    $.ajax({
            type:'POST',
            url:'models/cajas.php?mode=cargarEncargados',
            success:function(data){
              var select = $('#idEncargado');
              select.empty();

              var dat = jQuery.parseJSON(data); 
               $.each(dat,function(i,value){
                 $('#idEncargado').append($('<option>').text(dat[i].Nombre).attr('value', dat[i].Id));
            });

        }}); 
  }






  CargarDepartamentos();
  CargarZonafromDepartamento();
  CargarCanales();
  CargarEncargado();
  $('#tmovimientos').DataTable();

  $('#idDepartamento').on('change', function() {
    CargarZonafromDepartamento();
    });

  $('#btnAdd').click(function(){
         var table = $('#tmovimientos').DataTable();
           var message =  $('#inputIMEI').val();
           $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getEntrada&IMEI='+message,
            success:function(datos){
             if (datos == '0')
              {  
                alert("dato no encontrado");
                return;
              }
              else{ 

              console.log(datos);
               var dat = jQuery.parseJSON(datos);
              if(buscarentabla(dat.Imei) == true){
                  alert("Ya esta en tabla");
                  return;
              }
              else{
               console.log(dat);
               table.row.add([dat.Imei,dat.Iccid,dat.Marca,dat.Modelo,dat.Precio,dat.PrecioTAE,dat.Fecha_Entrada]).draw();
               $('#inputIMEI').val('');
              }
              }
      }});
    });


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
           autoclose: true,
           format: 'yyyy-mm-dd'
    });
     $("#datepicker").datepicker("setDate", new Date());

 $('#inputIMEI').keyup(function(event) {
    var message =  $('#inputIMEI').val();
    if(message.length == 15){
      this.blur();
    }
 });

       $('#inputIMEI').change(function(event) {
        var table = $('#tmovimientos').DataTable();
           var message =  $('#inputIMEI').val();
              if(message.length == 15){
           $.ajax({
            type:'GET',
            url:'models/entrada.php?mode=getEntrada&IMEI='+message,
            success:function(datos){
             
            if (datos == '0')
              {  
                alert("IMEI no en bodega");
                return;
              }
              else{ 
               var dat = jQuery.parseJSON(datos);
              if(buscarentabla(dat.Imei) == true){
                  alert("Ya esta en tabla");
                  return;
              }
              else{
          
               table.row.add([dat.Imei,dat.Iccid,dat.Marca,dat.Modelo,dat.Precio,dat.PrecioTAE,dat.Fecha_Entrada]).draw();
               $('#inputIMEI').val('');
              }
                }
                  }});

             }
    }); 


  $('#btnEntrar').click(function(){
        var table = $('#tmovimientos').DataTable();
        var fecha = $('#datepicker').val();
        var zona = $('#idZona option:selected').text();
        var departamento = $('#idDepartamento option:selected').text();
        var canal = $('#idCanal option:selected').text();
        var encargado = $('#idEncargado option:selected').text();
        var cantidad = table.rows().count();
        console.log("zona"+zona);
        console.log("depto"+departamento);
        console.log("canal"+canal);
        console.log("encargado"+encargado);
        console.log("cantidad"+cantidad);
     

           $.ajax({
              type:'GET',
              url:'models/salida.php?mode=insert&departamento='+departamento+'&zona='+zona+'&canal='+canal+'&encargado='+encargado+'&fecha='+fecha+'&cantidad='+cantidad,
              success:function(datos){
                  
                    console.log("Salida insertada No."+datos);
                      var list = [];
          //-----------------------------------CArgar cada uno-----------------------
                         
                            table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                            var data = this.data();
                            console.log("datatable:"+data);  
                            item = {}
                            item ["imei"] = data[0];
                            item ["iccid"] = data[1];
                            item ["marca"] = data[2];
                            item ["modelo"] = data[3];
                            item ["precio"] = data[4];
                            item ["fecha_salida"] = fecha;
                            item ["estado"] = "SALIDA";
                            item ["precio_tae"] = data[5];
                            item ["no_salida"] = datos;
                            item ["devuelto"] = "0";
                            console.log(item);   
                            list.push(item);
                          });
                              table.clear().draw();
           

                   console.log(list);
                    
                    $.ajax({
                      type:'POST',
                        dataType: 'json',
                      data:JSON.stringify(list),
                      url:'models/entrada_update.php',
                      success:function(datos){
                     alert("Se han actualizado"+datos+"filas");
                    }});
              
                }});


      
                
                 
              return false;
      
  });
   });  
</script>

<?php 


 ?>
