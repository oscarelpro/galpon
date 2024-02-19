

<?php
include "menu.php";
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <br>

   <div class="form-group col-md-2 ">
            
            <?php 
    $resultado=mysqli_query($conex,"SELECT id_caja,caja FROM n_caja");
    $row=mysqli_num_rows($resultado);
    
    echo "<select name='id_almacen' id='id_almacen' onChange='ejecutarAjax(this.value)' class='form-control'>" ; 

  echo "<option value='todo'>Seleccione una caja </option>";
         if($row>0){
              do{
              echo "<option value='".$var['id_caja']."'>".utf8_encode($var['caja'])." </option>";   
              }while ($var=mysqli_fetch_array($resultado));
            }
        echo "</select>";
        ?>
        </div> 
 
   <form class="form-inline container" method="post">
  
  <div class="form-group mx-sm-3 mb-2">
    <center><h2><label for="inputPassword2" class="sr-only">ENTRADAS</label></h2></center>
    <input type="text" class="form-control" id="inputPassword2" placeholder="INGRESE EL CODIGO DEL PRODUCTO" name="codigo">
  </div>

</form>

   <?php
    if(isset($_POST['codigo'])){
    ?>
   <br>
   <br>
   <br>
    <table class="table container table-dark table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">CODIGO</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">PRECIO</th>
      <th scope="col">STOCK</th>
     
    </tr>
  </thead>
  <tbody>
   <?php


        //aqui genero una consulta el cual me retornara el valor de su estock actual para aumentarle uno 

        $consulta2=mysqli_query($conex,"SELECT stock FROM tbl_producto where codigo='$_POST[codigo]'");
        while($var2=mysqli_fetch_array($consulta2)){
            $resultado=$var2[0]+1;
            //echo $resultado;
            $acualizacion=mysqli_query($conex,"UPDATE `tbl_producto` SET `stock`='$resultado' where codigo='$_POST[codigo]'");
        }



//ejecurto la funcion insert into para que me modifique el valor 
    

      //consula multi tabla para obtener categoria y ubicacion de los productos
   
      // se procede a la busqueda por codigo de barra
      // pr.nom_producto,pr.cantidad,pr.cod_barra,pr.precio,pr.fecha,pr.detalle,pr.ubicacion,cat.categoria,al.nombre from tbl_producto pr INNER JOIN tbl_categoria cat ON pr.categoria = cat.id_categoria INNER JOIN tbl_almacen al ON pr.ubicacion = al.id_almacen WHERE pr.cod_barra='$_POST[codigo]'
      $consulta=mysqli_query($conex,"SELECT * FROM tbl_producto where codigo='$_POST[codigo]'");
     if(mysqli_num_rows($consulta)==1){

     
    
    
    
     
      while($var1=mysqli_fetch_array($consulta)){
      
        
      ?>
    <tr>
      <td><?php echo $var1[1];?></td>
      <td><?php echo $var1[2];?></td>
      <td><?php echo $var1[3].'$';?></td>
      <td><?php echo $var1[4];?></td>
     
    
      
     
      <?php  
      }
    }else{
      
       ?>
                                    <!-- BOTON DISPARADOR DEL MODAL  -->

<div class="contaioner"><center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  REGISTRAR
</button></center></div>
                                              <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><center>REGISTRO DE PRODUCTO</center></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                            <!--contenido del modal -->
                                            <form class="row g-3">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">CODIGO</label>
    <input type="email" class="form-control" id="inputEmail4" value=""  placeholder="CODIGO DE BARRA ">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">PRODUCTO</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="PRODUCTO" name="producto">
  </div>
  <div class="col-md-12 ">
  <label for="inputPassword4" class="form-label">MARCA</label> 
            <?php 
    $resultado=mysqli_query($conex,"SELECT id_marca,marcas FROM tbl_marca");
    $row=mysqli_num_rows($resultado);
    
    echo "<select name='id_almacen' id='id_almacen' onChange='ejecutarAjax(this.value)' class='form-control'>" ; 

  echo "<option value='todo'>SELECCIONE UNA MARCA </option>";
         if($row>0){
              do{
              echo "<option value='".$var['id_marca']."'>".utf8_encode($var['marcas'])." </option>";   
              }while ($var=mysqli_fetch_array($resultado));
            }
        echo "</select>";
        ?>
        </div> 
  <div class="col-12">
    <label for="inputAddress2" class="form-label">PRECIO</label>
    <input type="text" class="form-control" id="inputAddress2" >
  </div>
  <br>
  
  <center><div class="col-13 ">
    <button type="submit" class="btn btn-primary">GUARDAR</button>
  </div></center>
</form>


      </div>
     
    </div>
  </div>
</div>
<?php




    }
      ?>
    </tr>
  
   
  </tbody>
</table>

    
<?php
    
  }
    ?>



</body>

</html>