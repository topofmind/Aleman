<?php
    $nombre_archivo = "fotos/".$_FILES['imagen']['name']; 
    $tipo_archivo = $_FILES['imagen']['type'];
        // tamano_archivo= Almacena el tamaño del archivo en bytes
        $tamano_archivo = $_FILES['imagen']['size']; 
        //compruebo si las características del archivo son las que deseo 
        if($nombre_archivo!='fotos/'){
        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 600000))) { 
          //el tamaño o la extension del archivo no son correctas se pone error=1
          $error=1;

                         
        }else{ 
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $nombre_archivo)){
         // El archivo ha sido cargado con éxito     
           
        }    
     }  
    }
    ?>