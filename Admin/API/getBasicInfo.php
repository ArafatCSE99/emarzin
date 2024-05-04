
<?php
include "connection.php";

$sql = "SELECT *  FROM basic_info";
$result = $conn->query($sql);

    $npn="";
    $wa="";
    $ea="";
    $a="";
    $mn="";
    $fb="";
    $yt="";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $npn=$row['name'];
    $wa=$row['web_address'];
    $ea=$row['email_address'];
    $a=$row['address'];
    $mn=$row['mobile_no'];
    $fb=$row['facebook'];
    $yt=$row['youtube'];
  }
} 
$conn->close();
?>

<div class="page-header">
              <h3 class="page-title"> Basic Info </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>Configuration</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic Info</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Emarzin Basic Info</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Emarzin Title</label>
                        <input type="text" class="form-control" id="npn" placeholder=" Name" value="<?php echo $npn; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Web address</label>
                        <input type="email" class="form-control" id="wa" placeholder="Web address" value="<?php echo $wa; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="ea" placeholder="Email address" value="<?php echo $ea; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" id="a" placeholder="Address" value="<?php echo $a; ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Mobile No</label>
                        <input type="number" class="form-control" id="mn" placeholder="Mobile No" value="<?php echo $mn; ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Facebook</label>
                        <input type="text" class="form-control" id="fb" placeholder="Facebook" value="<?php echo $fb; ?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Youtube</label>
                        <input type="text" class="form-control" id="yt" placeholder="Youtube" value="<?php echo $yt; ?>">
                      </div>
                      
                      <button type="button" onclick="SaveBasicInfo()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

