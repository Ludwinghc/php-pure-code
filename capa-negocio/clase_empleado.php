<?php
// Inclusion de la conexión
include_once("../capa-datos/conexion.php");


class CLASE_EMPLEADO extends conexion
{
	public $EMPLEADO_ID;
	public $NAME;
	public $LAST_NAME;
	public $PHONE;
	public $ADDRESS;
	// Constructor de la clase 
	function CLASE_EMPLEADO($ID_EMP, $NAME_EMP, $LAST_N_EMP, $PHON_EMP, $ADDR_EMP)
	{
		$this->EMPLEADO_ID = $ID_EMP;
		$this->NAME = $NAME_EMP;
		$this->LAST_NAME = $LAST_N_EMP;
		$this->PHONE = $PHON_EMP;
		$this->ADDRESS = $ADDR_EMP;
	}

	function mostrar_empleados()
	{
		$Conexion = $this->open_conexion();
		$query_sentence = "SELECT * FROM empleado";
		$result_query = $Conexion->query($query_sentence)
			or die("Error en: $query_sentence" . mysqli_error($Conexion));
		echo "<table border=2> \n";
		echo "<tr><td>Id empleado</td><td>Nombre</td><td>Apellido</td><td>Celular</td><td>address</td></tr>";
		while ($row = mysqli_fetch_assoc($result_query)) {
			echo "\t<tr>\n";
			foreach ($row as $col_value) {
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "</tr>";
		}
		echo "</table>";
		mysqli_close($Conexion);
	}

	function registrar_empleados()
	{
		$Conexion = $this->open_conexion();
		$query_sentence = "INSERT INTO  empleado(EMPLEADO_ID, NAME, LAST_NAME, PHONE, ADDRESS) VALUES ('$this->EMPLEADO_ID', '$this->NAME',
				'$this->LAST_NAME', '$this->PHONE','$this->ADDRESS')";
		$result_query = $Conexion->query($query_sentence)
			or die("Error en:  $query_sentence" . mysqli_error($Conexion));
		echo "<table border='1'> \n";
		echo "\t<tr>\n";
		if ($result_query) {
			echo "\t\t<td>Empelado registrado</td>\n";
		} else {
			echo "\t\t<td>No se registro el empleado</td>\n";
		}
		echo "\t</tr>\n";
		echo "</table>\n";

		mysqli_close($Conexion);
	}

	function actualizar_empleados($EMP_ID, $NAME,$LAST_NAME,$PHONE,$ADDRESS)
	{
		$Conexion = $this->open_conexion();
		$query_sentence = "UPDATE empleado SET NAME ='$NAME', LAST_NAME = '$LAST_NAME',
				PHONE ='$PHONE', ADDRESS = '$ADDRESS' WHERE EMPLEADO_ID = '$EMP_ID'";
		$result_query = $Conexion->query($query_sentence)
			or die("Error en: $query_sentence" . mysqli_error($Conexion));
		echo "<table border='1'> \n";
		echo "\t<tr>\n";
		if ($result_query) {
			echo "\t\t<td>Empelado Actualizado</td>\n";
		} else {
			echo "\t\t<td>No se actualizo el empleado</td>\n";
		}
		echo "\t</tr>\n";
		echo "</table>\n";

		mysqli_close($Conexion);
	}

	function eliminar_empleados($EMP_ID)
	{
		$Conexion = $this->open_conexion();
		$query_sentence = "DELETE FROM empleado WHERE EMPLEADO_ID = $EMP_ID";
		$result_query = $Conexion->query($query_sentence)
			or die("Error en: $query_sentence" . mysqli_error($Conexion));
			echo "<table border='1'> \n";
			echo "\t<tr>\n";
			if ($result_query) {
				echo "\t\t<td>Empelado Eliminado</td>\n";
			} else {
				echo "\t\t<td>No se elimino el empleado</td>\n";
			}
			echo "\t</tr>\n";
			echo "</table>\n";
	}
}
