<?php
include "connection.php";


?>

<div class="page-header">
              <h3 class="page-title"> Sub Category </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Configuration</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                
              
              
              <div class="card">
                  
              <div class="card-body">
                    
              <h4 class="card-title">Sub Category List</h4>                 
                    <table class="table table-bordered" id="subcategoryTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
                        <tr>
                          <th> # </th>
                          <th>Sub Category Name </th>
                          <th>Category Name </th>
                          <th> Is Active </th> 
                          <th> Action </th>                  
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = "SELECT * FROM sub_category";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $name=$row["name"];
     $categoryid=$row["category_id"];
     
     $is_active="Inactive";
     if($row["is_active"]==1)
     {
        $is_active="Active";
     }


$sqlc = "SELECT * FROM category where id=$categoryid";
$resultc = $conn->query($sqlc);
if ($resultc->num_rows > 0) {
  // output data of each row
  while($rowc = $resultc->fetch_assoc()) {
     $cname=$rowc["name"];
  }
}

     echo "<tr>";
     echo "<td>".$slno."</td>";
     echo "<td class='name'>".$name."</td>";
     echo "<td class='subname'>".$cname."</td>";
     echo "<td class='is_active'>".$is_active."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditSubCategory($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'sub_category')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} else {
  echo "0 results";
}
//$conn->close();
?>
                       
                      </tbody>
                    </table>
                    
                    
              </div>
              
              <div class="card-body">
                    <h4 class="card-title">Sub Category</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Sub Category Name" >
                      </div>

                      <div class="form-group">
  <label for="sel1">Select Category</label>
  <select class="form-control" id="categoryid">
  
  <?php
$sql = "SELECT * FROM category where is_active=1";

$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $cid=$row["id"];
      $cname=$row["name"];
      echo "<option value='$cid'>".$cname."</option>";
  }
}

?>
  </select>
</div>

                      <div class="form-check form-check-success">
                            <label > 
                            Is Active <input style="margin-left:20px;"  id="isactive" type="checkbox" class="form-check-input" checked/>  
                            </label>
                        </div>
                      <button type="button" onclick="SaveSubCategory()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>

                 

                </div>
              </div>
