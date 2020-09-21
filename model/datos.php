<?php
    class Image
    {
        private $id;
        private $ruta;
        private $fecha;

        public function setId($id){
            $this->id=$id;
        }
        public function getId(){
            return $this->id;
        }
        public function setRuta($ruta){
            $this->ruta=$ruta;
        }
        public function getRuta(){
            return $this->ruta;
        }
        public function setFecha($fecha){
            $this->fecha=$fecha;
        }
        public function getFecha(){
            return $this->fecha;
        }
    }

    class Manager_i 
    {
        private $conexion;

        public function __construct($conexion){
			$this->setConnection($conexion);
		}
		public function setConnection(PDO $conexion){
			$this->conexion=$conexion;
        }
        
        public function setImagen(Image $imagen){
            $sql="INSERT INTO images (id,ruta,fecha) VALUES (NULL,'" . $imagen->getRuta() . "','" . $imagen->getFecha() . "')";
            $this->conexion->query($sql);
        }
        public function getImagenes(){
            $row=array();
            $i=0;
            $sql="SELECT * FROM images ORDER BY fecha DESC,id DESC";
            $resultado=$this->conexion->query($sql);
            while($aux=$resultado->fetch(PDO::FETCH_ASSOC)){
                $thumb_data=new Image();
                
                $thumb_data->setId($aux['id']);
                $thumb_data->setRuta($aux['ruta']);
                $thumb_data->setFecha($aux['fecha']);
                
                $row[$i]=$thumb_data;
                $i++;
            }
            return $row;
        }
        public function contImagenes(){
            $sql="SELECT * FROM images ORDER BY fecha DESC, id DESC";
            $resultado=$this->conexion->query($sql);
            $cantidad=$resultado->rowCount();
            return $cantidad;
        }
        public function borrarImagen($id){
            $sql="DELETE FROM images WHERE id=$id";
            $this->conexion->exec($sql);
        }
        public function mostrarImagenes(){
            $num_img=$this->contImagenes();
            $ipf=4;//imagenes por fila
            $cant_filas=ceil($num_img/$ipf);
            if ($num_img==0) {
                echo "<div class='row carrete-row'>
                    <span class='col-md-6 offset-md-3 col-sm-12 carrete-empty'><center><h2>Aún no hay nada.</h2></center></span>
                    </div>";
            }else{
                $imagenes=$this->getImagenes();
                
                echo "<div class='row carrete-row'>";
                echo "<p class='col-md-10 offset-md-1 col-sm-12'><b>Cantidad de imagenes: $num_img </b></p>"; 
                    $i=0;
                        foreach($imagenes as $thumb){
                            $id_img="img" . ($i+1);
                            echo "<span class='col-md-3 col-sm-6 col-6 contenedor-img'><a href='#ventana' data-toggle='modal'><img src='" . $thumb->getRuta() . "' id='" . $id_img . "' title='" . $thumb->getId() . "' class='carrete-img img-thumbnail'></a></span>";
                            $i++;
                            
                        }
                    echo "</div>";
            }
        }
        
    }
    

?>