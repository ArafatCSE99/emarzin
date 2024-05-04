
<?php
include "connection.php";


?>

<div class="page-header">
              <h3 class="page-title"> Category </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Configuration</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                
              
              
              <div class="card">
                  
              <div class="card-body">
                    
              <h4 class="card-title"> Category List</h4>                 
                    <table class="table table-bordered" id="categoryTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
                        <tr>
                          <th> # </th>
                          <th> Category Name </th>
                          <th> Is Active </th> 
                          <th> Action </th>                  
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $name=$row["name"];
     
     $is_active="Inactive";
     if($row["is_active"]==1)
     {
        $is_active="Active";
     }

  
     echo "<tr>";
     echo "<td>".$slno."</td>";
     echo "<td class='name'>".$name."</td>";
     echo "<td class='is_active'>".$is_active."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditCategory($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'category')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} else {
  echo "0 results";
}
$conn->close();
?>
                       
                      </tbody>
                    </table>
                    
                    
              </div>
              
              <div class="card-body">
                    <h4 class="card-title"> Category</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category Name" >
                      </div>
                      <div class="form-check form-check-success">
                            <label > 
                            Is Active <input style="margin-left:20px;"  id="isactive" type="checkbox" class="form-check-input" checked/>  
                            </label>
                        </div>
                      <button type="button" onclick="SaveCategory()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>

                 

                </div>
              </div>
