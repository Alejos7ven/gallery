<?php
    include_once("model/datos.php");
    try { 
        $conexion=new PDO('mysql:host=localhost; dbname=gallery', 'root', '');//conectando con PDO
        //$conexion=new PDO('mysql:host=sql201.byetcluster.com; dbname=b7_26152903_gallery', 'b7_26152903', 'josedemarz0M');
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec('SET CHARACTER SET utf8');
        $gestor=new Manager_i($conexion);
        if(isset($_POST["send"])){
            $nueva_imagen=new Image();
             
                $ruta='uploads-img/';
                $generado="img_" . date("Y-m-d") . "_" . rand(9,99989) . ".";
				$type_img=strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION)) ;
                $size_img= $_FILES['img']['size'];
                $new_file_name=$generado . $type_img;
                $img_name=strtolower($ruta . basename($new_file_name));
				if($size_img<=4000000){
                    
					if($type_img=='jpeg' || $type_img=='png' || $type_img=='jpg' || $type_img=='gif'){
                       echo $size_img . "bytes" . $_FILES['img']['name'] . $type_img . $img_name; 
						move_uploaded_file($_FILES['img']['tmp_name'],$img_name);
						$nueva_imagen->setRuta($img_name);
                        $nueva_imagen->setFecha(date("Y-m-d H:i:s"));
                        $gestor->setImagen($nueva_imagen);
					}else{
						echo 'imagen debe ser en formato jpg, png';
					}
				}
            
            header("location:index.php");
        }
        if (isset($_POST["del_img"])) {
            # borrando imagen
            $current=$_POST["current_img"];
            $src_img=$_POST["src_img"];
            $gestor->borrarImagen($current); 
            unlink("uploads-img/" . $src_img);
            header("location:index.php");
        }
        $ver=new Manager_i($conexion);
        $ver->mostrarImagenes();

    } catch (Exception $e) {
        die("Error: " ). $e->getMessage;
    }
?>