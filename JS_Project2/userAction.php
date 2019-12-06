<?php
//load and initialize database class
require_once 'DB.class.php';
require_once 'db.php';
$db = new DB();

$tblName = 'hause';


if (($_GET['action'] == 'edit') && !empty($_GET['id'])) {

    //update data
    $userData = array(
        'owner' => $_GET['owner'],
        'address' => $_GET['address'],
        'email' => $_GET['email'],
        'description' => $_GET['description'],
        // 'imgdb' => $_GET['imgdb']
    );
    $condition = array('id' => $_GET['id']);
    $update = $db->update($tblName, $userData, $condition);
    // var_dump($update);
    if ($update) {
        // var_dump($update);

        $returnData = array(
            'status' => 'ok',
            'msg' => ' data has been updated successfully.',
            'data' => $userData,
            'update' => $update,
            'c' => $condition
        );
        // var_dump($returnData);
    } else {
        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.',
            'data' => ''
        );
    }

    echo json_encode($returnData);





} elseif (($_GET['action'] == 'add')) {


    $owner = mysqli_real_escape_string($mysqli, $_GET['owner']);

    $address = mysqli_real_escape_string($mysqli, $_GET['address']);

    $email = mysqli_real_escape_string($mysqli, $_GET['email']);

    $description = mysqli_real_escape_string($mysqli, $_GET['description']);

    $file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

    $sql = "INSERT INTO hause(id, owner, address, email, description , img ) VALUES (NULL,'$owner', '$address', '$email' , '$description' , '$file' )";


    if ($mysqli->query($sql) === TRUE) {

        $returnData = array(
            'status' => 'ok',
            'msg' => ' data has been added successfully.',
            // 'data' => $userData
        );
    } else {

        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.',
            'data' => ''
        );
    }
    echo json_encode($returnData);
} elseif (($_POST['action'] == 'delete') && !empty($_POST['id'])) {
    //delete data
    $condition = array('id' => $_POST['id']);
    $delete = $db->delete($tblName, $condition);
    if ($delete) {
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been deleted successfully.'
        );
    } else {
        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.'
        );
    }

    echo json_encode($returnData);
}
die();
