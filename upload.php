<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Fitxer massa gran.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Error de pujada.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El fitxer ". basename( $_FILES["fileToUpload"]["name"]). " s'ha copiat correctament a la ruta http://forarasr01/absis/graficas/uploads/". basename( $_FILES["fileToUpload"]["name"]);
    } else {
        echo "Hi ha hagut algun error al pujar el fitxer.";
    }
}
?>
