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
   <form class="form-inline container" method="post">
  
  <div class="form-group mx-sm-3 mb-2">
    <center><h2><label for="inputPassword2" class="sr-only">SALIDA DE PRODUCTOS</label></h2></center>
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
            $resultado=$var2[0]-1;
            //echo $resultado;
            $acualizacion=mysqli_query($conex,"UPDATE `tbl_producto` SET `stock`='$resultado' where codigo='$_POST[codigo]'");
        }



//ejecurto la funcion insert into para que me modifique el valor 
    

      //consula multi tabla para obtener categoria y ubicacion de los productos
   
      // se procede a la busqueda por codigo de barra
      // pr.nom_producto,pr.cantidad,pr.cod_barra,pr.precio,pr.fecha,pr.detalle,pr.ubicacion,cat.categoria,al.nombre from tbl_producto pr INNER JOIN tbl_categoria cat ON pr.categoria = cat.id_categoria INNER JOIN tbl_almacen al ON pr.ubicacion = al.id_almacen WHERE pr.cod_barra='$_POST[codigo]'
      $consulta=mysqli_query($conex,"SELECT * FROM tbl_producto where codigo='$_POST[codigo]'");
      while($var1=mysqli_fetch_array($consulta)){
      
        
      ?>
    <tr>
      <td><?php echo $var1[1];?></td>
      <td><?php echo $var1[2];?></td>
      <td><?php echo $var1[3].'$';?></td>
      <td><?php echo $var1[4];?></td>
     
    
      
     
      <?php  }?>
    </tr>
  
   
  </tbody>
</table>

    
<?php
    
  }
    ?>



</body>

</html>