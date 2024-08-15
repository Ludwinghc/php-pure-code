<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1><center>Registro Empleados</center></h1>
  <h2>Formulario de Registro de empleado</h2>
  <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
    <label for="ID_EMPLEADO">
      Id del empleado:
      <input type="text" name="idempleado" pattern="\d+">
      <br>
    </label>
    <br>
    <label for="NAME">
      Nombre:
      <input type="text" name="name" >
      <br>
    </label>
    <br>
    <label for="LAST_NAME">
      Apellido:
      <input type="text" name="lastname" >
      <br>
    </label>
    <br>
    <label for="PHONE">
      Celular:
      <input type="text" name="phone" pattern="\d+" maxlength="10" >
      <br>
    </label>
    <br>
    <label for="ADDRESS">
      Dirección:
      <input type="text" name="address" >
      <br>
    </label>
    <br>
    <input type="submit" name="Consultar" value="Consultar">
    <input type="submit" name="Registrar" value="Registrar">
    <input type="submit" name="Actualizar" value="Actualizar">
    <input type="submit" name="Eliminar" value="Eliminar">
  </form>
  <br>
  <h2>Empleados Registrados</h2>
  <?php
  include_once("../capa-datos/conexion.php");
  include_once("../capa-negocio/clase_empleado.php");


  // Consultar event
  if (isset($_POST["Consultar"])) {
    $obj_empleado = new CLASE_EMPLEADO();
    $obj_empleado -> mostrar_empleados();
  }

  // Registrar Event
  if (isset($_POST['Registrar'])) {
    @$ID_EMP = $_POST['idempleado'];
    @$NAME = $_POST['name'];
    @$LAST_NAME = $_POST['lastname'];
    @$PHONE= $_POST['phone'];
    @$ADDRESS = $_POST['address'];

    if (empty($ID_EMP) || empty($NAME) || empty($LAST_NAME) || empty($PHONE) || empty($ADDRESS)) {
      $mensaje = "No se pudo registrar faltan campos!!!";
      echo "<script>alert('$mensaje');</script>";
    }
    else{
      $obj_empleado = new CLASE_EMPLEADO();
      $obj_empleado -> CLASE_EMPLEADO(@$ID_EMP, @$NAME, @$LAST_NAME, @$PHONE, @$ADDRESS);
      $obj_empleado -> registrar_empleados();
    }
  }

  // Actualizar Event
  if (isset($_POST['Actualizar'])) {
    @$ID_EMP = $_POST['idempleado'];
    @$NAME = $_POST['name'];
    @$LAST_NAME = $_POST['lastname'];
    @$PHONE= $_POST['phone'];
    @$ADDRESS = $_POST['address'];

    if (empty($ID_EMP) || empty($NAME) || empty($LAST_NAME) || empty($PHONE) || empty($ADDRESS)) {
      $mensaje = "No se pudo Actualizar faltan campos!!!";
      echo "<script>alert('$mensaje');</script>";
    }
    else{
      $obj_empleado = new CLASE_EMPLEADO();
      $obj_empleado -> actualizar_empleados(@$ID_EMP, @$NAME, @$LAST_NAME, @$PHONE, @$ADDRESS);
    }
  }

  // Eliminar Event
  if (isset($_POST['Eliminar'])) {
    @$ID_EMP = $_POST['idempleado'];

    if (empty(@$ID_EMP)) {
      $mensaje = "No se pudo Eliminar falta el ID!!!";
      echo "<script>alert('$mensaje');</script>";
    }
    else{
      $obj_empleado = new CLASE_EMPLEADO();
      $obj_empleado -> eliminar_empleados($ID_EMP);
    }
  }


  ?>
</body>
</html>