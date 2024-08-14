<?php
    class Conexion {
        // Conexion's Variables
        protected $server = 'localhost';
        protected $user = 'root';
        protected $passw = '';
        protected $data_base = 'ventas-aaa';
				
				public function open_conexion(){
				try {
					
					$link = mysqli_connect($this->server, $this->user, $this->passw) 
                    or die ('No se pudo conectar con la base de datos');
                    echo 'conexion exitosa';
                    return $link;
				} catch (Exception $e) {
					echo $e -> getMessage();
                    return null;
				}
				}
    }
?>