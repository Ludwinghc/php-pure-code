<?php
    class Conexion {
        // Conexion's Variables
        protected $server = 'localhost';
        protected $user = 'root';
        protected $passw = '';
        protected $data_base = 'ventas-aaa';
				
				public function open_conexion(){
				try {					
					$link = mysqli_connect($this->server, $this->user, $this->passw, $this->data_base);
					if (! $link) {
						die("Error al conectar la base de datos :". mysqli_connect_error());
					}
					// echo "Conexion exitosa";
					return $link;
				} catch (Exception $e) {
					echo $e->getMessage();
                    return null;
				}
				}
    }
?>