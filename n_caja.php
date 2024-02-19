<?php
include "menu.php";
include "conexion.php";
?>

<br><br>
<form action="">
<div class="row g-3 container">
  <div class="col-sm-7">
    <input type="text" class="form-control" placeholder="CAJA" aria-label="City">
  </div>
  <div class="form-group col-md-6 ">
            <label for="exampleFormControlInput1">ESTANTE</label>
            <?php 
    $resultado=mysqli_query($conex,"SELECT id_estante,n_estante FROM n_estante");
    $row=mysqli_num_rows($resultado);
    
    echo "<select name='id_almacen' id='id_almacen' onChange='ejecutarAjax(this.value)' class='form-control'>" ; 

  echo "<option value='todo'>Seleccione un Estante </option>";
         if($row>0){
              do{
              echo "<option value='".$var['id_estante']."'>".utf8_encode($var['n_estante'])." </option>";   
              }while ($var=mysqli_fetch_array($resultado));
            }
        echo "</select>";
        ?>
        </div>   
        <div class="form-group col-md-6 ">
            <label for="exampleFormControlInput1">ESTANTE</label>
            <?php 
    $resultado=mysqli_query($conex,"SELECT id_pasillo,n_pasillo FROM n_pasillo");
    $row=mysqli_num_rows($resultado);
    
    echo "<select name='id_almacen' id='id_almacen' onChange='ejecutarAjax(this.value)' class='form-control'>" ; 

  echo "<option value='todo'>Seleccione un Pasillo </option>";
         if($row>0){
              do{
              echo "<option value='".$var['id_pasillo']."'>".utf8_encode($var['n_pasillo'])." </option>";   
              }while ($var=mysqli_fetch_array($resultado));
            }
        echo "</select>";
        ?>
        </div> 
  <button class="btn btn-primary" type="button">REGISTRAR</button>
</div>


</form>