<?php

/* $targetPath = "uploads".basename($_FILES['inpFile']['name']);

move_uploaded_file($_FILES['inpFile']['tmp_name'] , $targetPath); */

?>


<?php

require_once 'DB.class.php';

require_once 'db.php';

$db = new DB();

// var_dump($_POST['imgdb']);

if (isset($_POST['submit'])) {

    // escape variables for security

    $owner = mysqli_real_escape_string($mysqli, $_POST['owner']);

    $address = mysqli_real_escape_string($mysqli, $_POST['address']);

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    $description = mysqli_real_escape_string($mysqli, $_POST['description']);




    /* 
    if (isset($_POST['submit'])) {

        $name       = $_FILES['file']['name'];

        $temp_name  = $_FILES['file']['tmp_name'];

        if (isset($name)) {
            if (!empty($name)) {
                $location = 'uploads/';
                if (move_uploaded_file($temp_name, $location . $name)) {
                    echo 'File uploaded successfully';
                }
            }
        } else {
            echo 'You should select a file to upload !!';
        }
    } */

/* 

    if (isset($_POST['imgdb'])) {

        var_dump($_POST['imgdb']);

        $name = $_FILES['imgdb']['name'];

        $target_dir = "upload/";

        $target_file = $target_dir . basename($_FILES["imgdb"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {

            // Convert to base64 

            $image_base64 = base64_encode(file_get_contents($_FILES['imgdb']['tmp_name']));

            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

            // Insert record
            // $query = "insert into images(image) values('" . $image . "')";
            //mysqli_query($con, $query); 

            // Upload file
            move_uploaded_file($_FILES['imgdb']['tmp_name'], $target_dir . $name);
        } */



        // $sql = "INSERT INTO hause(id, owner, address, email, description , imgdb) VALUES (NULL,'$owner', '$address', '$email' , '$description' , '$image')";
      
        $sql = "INSERT INTO hause(id, owner, address, email, description ) VALUES (NULL,'$owner', '$address', '$email' , '$description' )";


        if ($mysqli->query($sql) === TRUE) {

            echo "New record created successfully";
        } else {

            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}
?>



