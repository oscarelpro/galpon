<?php
//formulario de registro completo  de roductos 

include 'menu.php';
include 'conexion.php';
?>

<br><br><br><br>
<div class="container">
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
