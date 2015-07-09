<?
//Funion para crear una carpeta con el nombre almacenado en la
//variable indicada (en este caso es $name)
function createFolder($name){
        //Remplazamos los espacios en blanco por '_'
        //Este será el nombre que tendrá la carpera que crearemos
        $nombreFolder = str_replace(' ','_',$name);

        //Ruta donde se va a crear la nueva carpeta
        //$_SERVER["DOCUMENT_ROOT"] = "/var/www/html"
        $dirFolder = $_SERVER["DOCUMENT_ROOT"]."/Registro/documentos/";

        //Concatenamos la ruta con el nombre que tendrá la carpeta 
        $newFolder = $dirFolder.$nombreFolder;

        //mkdir devuelve verdadero en caso de éxito y falso en
        //caso de fracaso
        $isCreate = mkdir($newFolder);
        //Comprobamos que se haya creado correctamente la carpeta
        if($isCreate){
                echo "Carpeta creada con exito en $dirFolder";
        }
        else {
                echo "No se pudo crear la carpeta en $dirFolder";
        }
        //Por comodidad pasamos el contenido de $_FILES a $archivos
        //de esta manera es más clara la manipulación.
        //Los archivos subidos a traves de un formulario se almacenan
        //temporalmente en el servidor en /tmp
        $archivos = $_FILES['q6']['tmp_name']; //Obtenemos los nombres temporales  
        $nombreArchivo = $_FILES['q6']['name']; //Obtenemos los nombre reales
        $cantidad = count($archivos); //Almacenamos el numero de elementos

        for($i="0";$i<$cantidad; $i++){
                //Movemos el archivo de su ubicación temporal a una dirección
                //definitiva. Si la operación se ejecuta con éxito la función
                //move_uploaded_file devuelve verdadero; en caso contrario, false. 
                if(move_uploaded_file($archivos[$i],$newFolder."/".$nombreArchivo[$i])){
                        echo "Archivo $archivos[$i] subido satisfactoriamente!!";
                }
                else{
                        echo "No se pudo subir su archivo";
                }
        }
}
?>
