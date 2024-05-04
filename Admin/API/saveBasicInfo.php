<?php

    $npn=$_POST['npn'];
    $wa=$_POST['wa'];
    $ea=$_POST['ea'];
    $a=$_POST['a'];
    $mn=$_POST['mn'];
    $fb=$_POST['fb'];
    $yt=$_POST['yt'];

include "connection.php";


$sqlc = "SELECT * FROM basic_info";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {

    $sql = "UPDATE basic_info set name='$npn',web_address='$wa',email_address='$ea',address='$a',facebook='$fb',youtube='$yt',mobile_no='$mn' ";

}
else{

    $sql = "INSERT INTO basic_info (`name`, `web_address`, `email_address`, `address`, `mobile_no`, `facebook`, `youtube`)
VALUES ('$npn', '$wa', '$ea','$a','$mn','$fb','$yt')";
}



if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>