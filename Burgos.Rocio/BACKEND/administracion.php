<?php
require_once "./Clases/fabrica.php";

$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$dni = $_POST["txtDni"];
$legajo = $_POST["txtLegajo"];
$sueldo = $_POST["txtSueldo"];
$sexo = $_POST["cboSelect"];
$turno = $_POST["rdoTurno"];
$hdnModificar = $_POST['hdnModificar'];
       

if(isset($hdnModificar)) 
    {
        $ruta = "./Archivos/empleados.txt";
        $archivoDeEmpleados = fopen($ruta, "r");
        $unEmpleado;
        while (!feof($archivoDeEmpleados)) 
        {
            $lineaDeTexto = trim(fgets($archivoDeEmpleados));
            if ($lineaDeTexto) 
            {
                $datoEmpleado = explode("- ", $lineaDeTexto);
                if ($datoEmpleado[2] == $dni) 
                {
                    $unEmpleado = new Empleado($datoEmpleado[1], $datoEmpleado[0], $datoEmpleado[2], $datoEmpleado[3], $datoEmpleado[5], $datoEmpleado[4], $datoEmpleado[6]);
                    $unEmpleado->SetPathFoto($datoEmpleado[7]);
                                        
                    fclose($archivoDeEmpleados);
                    $laFabrica = new Fabrica("Panaderia", 7);
                    $laFabrica->TraerDeArchivo("./Archivos/empleados.txt");
                
                    if ($laFabrica->EliminarEmpleado($unEmpleado)) 
                    {
                        $laFabrica->GuardarEnArchivo("./Archivos/empleados.txt");
                        if (!unlink($unEmpleado->GetPathFoto())) 
                        {
                            echo "No se pudo elimiinar la foto";
                        }
                    // echo "Modificado";
                    }
                  
                    break;     
                }
            }
        }
//        fclose($archivoDeEmpleados);  
    }

        $destino = "Fotos/" . $_FILES["foto"]["name"];
        $uploadOk = TRUE;
        $esImagen = getimagesize($_FILES["foto"]["tmp_name"]);
        if($esImagen==false){

            echo "No se puede subir el archivo,  no es una imagen";
        }
        else{
                $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);
                if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif" && $tipoArchivo != "png" && $tipoArchivo != "bmp") {
                    echo "Solo son permitidas imagenes con extension JPG, JPEG, BMP ,PNG o GIF.";
                    $uploadOk = FALSE;
                }
    
                if ($_FILES["foto"]["size"] > 1000000) {
                    echo "El archivo es demasiado grande. Verifique!!!";
                    $uploadOk = FALSE;
                }
    
                if (file_exists($destino)) {
                    echo "El archivo ya existe. Verifique!!!";
                    $uploadOk = FALSE;
                }
        }


        if($uploadOk){
            $rutaFoto="./Fotos/".$dni."-".$apellido.".".$tipoArchivo;  

                $unEmpleado= new Empleado($nombre,$apellido,$dni,$sexo,$sueldo,$legajo,$turno);
                $unEmpleado->SetPathFoto("Fotos/".$dni."-".$apellido.".".$tipoArchivo);

                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {
                     rename($destino,$rutaFoto);
                 }else{
                     echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
                 }


                $unaFabrica= new Fabrica("Carrefour",7);
                $unaFabrica->TraerDeArchivo("./Archivos/empleados.txt");
                    
            if( $unaFabrica->AgregarEmpleado($unEmpleado)){
                $unaFabrica->GuardarEnArchivo("./Archivos/empleados.txt");
                echo "<a href='mostrar.php'>Mostrar</a>";
            }else{
                echo "No se pudo agregar al empleado.";
                echo "<br><a href='index.html'>Inicio</a>";
            }
        }else {

            echo "<br/>NO SE PUDO SUBIR EL ARCHIVO.";
        } 
     
?>