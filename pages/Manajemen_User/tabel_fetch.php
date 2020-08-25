<?php

//fetch.php

include('../../database_connection.php');

$column = array("id", "username", "serialnumber", "gender", "email", "time_in" );

$query = "SELECT * FROM users ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE username LIKE "%'.$_POST["search"]["value"].'%" 
 OR serialnumber LIKE "%'.$_POST["search"]["value"].'%" 
 OR username LIKE "%'.$_POST["search"]["value"].'%" 
 OR email LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id ASC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['username'];
 $sub_array[] = $row['serialnumber'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['time_in'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM users";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
