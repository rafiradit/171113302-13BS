<?php

//action.php

include('../../database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
    ':id'            => $_POST['id'],
    ':username'      => $_POST['username'],
    ':serialnumber'  => $_POST['serialnumber'],
    ':gender'        => $_POST['gender'],
    ':email'         => $_POST['email'],
    ':time_in'       => $_POST['time_in']
 );

 $query = " UPDATE users SET username = :username, serialnumber = :serialnumber, gender = :gender, email = :email, time_in = :time_in WHERE id = :id ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = " DELETE FROM users WHERE id = '".$_POST["id"]."' ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>