<?php

    $category_id=$_POST['categoryid'];
    $name=$_POST['name'];
    $is_active=$_POST['is_active'];
    $id=$_POST["id"];

include "connection.php";


    if($id==0){
    $sql = "INSERT INTO sub_category (`name`, `is_active`,category_id)
    VALUES ('$name', '$is_active',$category_id)";
    }
    else{
        $sql="update sub_category set name='$name' , is_active='$is_active', category_id='$category_id'";
    }




if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>