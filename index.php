<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de imagenes!</title>
    <link rel="stylesheet" href="librerias/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="view/estilos.css">
    <script src="librerias/jquery.js"></script>
    <script src="librerias/bootstrap/bootstrap.js"></script>
    <script src="librerias/jquery.validate.js"></script>
    <script src="view/acciones.js"></script>
</head>
<body> 
    <div class="container carrete">
        <div class="row carrete-header">
            <div class="col-md-8 offset-md-1">
                <h2>Álbum</h2>
                <p>Este es un album de prueba</p>
            </div>
            <div class="container">
                <div class="col-md-10 offset-md-1 col-sm-12">
                    <p class="subir"><b> Subir imagen</b></p>
                    <a href="#subir" class="btn btn-success btn-subir" data-toggle="modal"><img src="view/icons/plus.png" class="">Añadir</a>
                </div>
            </div>
        </div>
        <?php 
            include("gestor.php");
        ?>
        

        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="modal fade" id="ventana">
                    <div class="modal-dialog">
                        <div class="modal-content modal-preview">
                            <div class="modal-body"><img src="" id="ventana_img" class="img-thumbnail"></div>
                            <div class="modal-footer">
                                 
                                <form action="gestor.php" id="form_del" method="post">
                                <input type="hidden" name="src_img" id="src_img" value="">
                                <input type="hidden" name="current_img" id="current_img" value="">
                                <input type="submit" class="btn btn-danger" value="Borrar" name="del_img" id="del_img">
                                </form> 
                                <button class="close" data-dismiss="modal" aria-hidden="true"><div class="btn btn-secondary">Close &times;</div></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="modal fade" id="subir">
                    <div class="modal-dialog">
                       <div class="modal-content">
                            <div class="modal-header"><h2 class="modal-title">Adjunta una imagen</h2><button class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>   
                            <form action="gestor.php" method="post" name="form-subir" id="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group form-row">
                                        <div class="col-md-12">
                                            <center><label for="img" class="btn btn-primary">Subir archivo</label></center>
                                            <input type="file" name="img" id="img">
                                        </div>
                                    </div>
                                    <div class="form-group form-row preview-subir">
                                        <div class="col-md-12">
                                            <center>
                                                <label><b> Solo imagenes en formato jpg, png, gif, jpeg de maximo 4mb.</b></label>
                                                <img src="" class="img-fluid preview-img" id="vista_previa">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="reset" class="btn btn-default" data-dismiss="modal" value="cerrar">
                                    <input type="submit" name="send" id="send" class="btn btn-success">
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--fin carrete!-->
        <div class="container-fluid color-black">
            <footer class="row">
                <div class="col-md-12"><center><h2>Elaborado por José De Marzo</h2></center></div>
                <div class="section-footer col-md-3 offset-md-0 col-sm-6 offset-sm-0 col-10 offset-1">
                    <h3>Contacto</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/jose.demarzo">Facebook</a></li>
                        <li><a href="https://twitter.com/Alejos7ven?s=09">Twitter</a></li> 
                    </ul>
                </div>
                <div class="section-footer col-md-3 offset-md-0 col-sm-6 offset-sm-0 col-10 offset-1">
                    <h3>Website</h3>
                    <ul>
                        <li><a href="#">Blog(en construcción)</a></li>
                        <li><a href="http://pgsobreruedas.byethost7.com/registro/index.php">Registro de nombres</a></li>
                        <li><a href="http://pgsobreruedas.byethost7.com/inmobiliaria/index.html">Inmobiliaria(prototipo de interfaz)</a></li>
                    </ul>
                </div>
                <div class="section-footer col-md-3 offset-md-0 col-sm-6 offset-sm-0 col-10 offset-1">
                    <h3>Acerca de</h3>
                    <ul>
                        <li><a href="#">Quien soy</a></li>
                    </ul>
                </div>
                <div class="section-footer col-md-3 offset-md-0 col-sm-6 offset-sm-0 col-10 offset-1">
                    <h3>Información</h3>
                    <ul> 
                        <li>Version- BETA 0.1.2</li>
                        <li><a href="https://ouo.io/Xjp8lV"> Descargar código</a></li>
                    </ul>
                </div>
            </footer>
        </div>
</body>
</html>