<?php
require '../Modelo/db.php';
require '../Modelo/DTOEmpleado.php';
require '../Modelo/EmpleadoDAO.php';

$target_dir = "../Recursos/subidas/";
$target_file = $target_dir . basename($_FILES["ficheroSubida"]["name"]);
print "Filename: " . $_FILES['ficheroSubida']['name']."<br>";
print "Type : " . $_FILES['ficheroSubida']['type'] ."<br>";
print "Size : " . $_FILES['ficheroSubida']['size'] ."<br>";
print "Temp name: " . $_FILES['ficheroSubida']['tmp_name'] ."<br>";
print "Error : " . $_FILES['ficheroSubida']['error'] . "<br>";


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["ficheroSubida"]["tmp_name"]);
    if ($check !== false) {
        print "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        print "File is not an image.";
        $uploadOk = 0;
    }
}
else
{
    print "Error de subida";
}

// Check if file already exists
if (file_exists($target_file)) {
  print "EL fichero ya existe.";
  $uploadOk = 0;
}



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  print "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  print "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["ficheroSubida"]["tmp_name"], $target_file)) {
    print "The file ". htmlspecialchars( basename( $_FILES["ficheroSubida"]["name"])). " has been uploaded.";
    //Código para la inserción en BBDD de la ruta de la imagen.
    $edao = new EmpleadoDAO();
    $empleado = new DTOEmpleado(1, "emp prueba fichero", 20, 1,$target_file);
    $edao->addEmpleado($empleado);
  } else {
    print "Sorry, there was an error uploading your file.";
  }
}
?>
