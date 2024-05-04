<?php

    $id=$_POST['id'];
    $name=$_POST['name'];
    $usernames=$_POST['username'];
    $passwords=$_POST['password'];
    $is_active=$_POST['is_active'];

include "connection.php";




if ($id!=0) {

    $sql = "UPDATE vendor set name='$name',is_active='$is_active',username='$usernames',password='$passwords' where id=$id ";

}
else{
    $sql = "INSERT INTO vendor (`name`, `is_active`,`username`,`password`)
    VALUES ('$name', '$is_active','$usernames','$passwords')";
}



if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>