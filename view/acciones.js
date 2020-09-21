$(document).ready(function(){
    $("#img").hide();
    var imagenes=document.querySelectorAll(".img-thumbnail");
    var ruta=new Array();
    var ident=new Array();//variable para identificar las imagenes con jquery
    for (var i=0;i<imagenes.length;i++){ 
        ruta[i]=imagenes[i].src; 
        ident[i]="#"+imagenes[i].id; 
        $(ident[i]).click(function (e) { 
            $("#ventana_img").attr("src", e.target.src);
            var imagen_a_borrar=e.target.title;
            $("#current_img").attr("value",imagen_a_borrar);
            var cadena_imagen=e.target.src;
            for(var i=0;i<cadena_imagen.length;i++){
                if(cadena_imagen.charAt(i)=="/"){
                    cadena_imagen=cadena_imagen.slice(i+1);//eliminando directorios hasta obtener el nombre de la imagen
                }
            }
            $("#src_img").attr("value",cadena_imagen);
        }); 
        $(ident[i]).hover(function (e) { 
            $(e.target).css("opacity", "0.2");
            $("#ventana_img").css("opacity", "1");
        },function (e) { 
            $(e.target).css("opacity", "1");
            $("#ventana_img").css("opacity", "1");
        }); 
    }

    $("#img").change(function(e){
        let reader=new FileReader();//objeto que lee archivos
        reader.readAsDataURL(e.target.files[0]);//leemos archivo y lo pasamos a la variable
        reader.onload=function(){
            let preview=document.getElementById("vista_previa");
            preview.src=reader.result;
        }
    });

    $("#form").submit(function(e){
        var imagen=document.getElementById("img").value;
        if(imagen==""){
            alert("Debe subir almenos una imagen");
            return false;
        }
    });
     
    $("#form_del").submit(function(){
        var master_pass=prompt("ingrese clave maestra:");
        if(master_pass!="1234"){
            return false;
        }else{
            return true;
        }
            
    });

});
