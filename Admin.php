<?php 
include 'htlmbox/htmheader.php';
?>
<?php

session_start();
if(isset($_SESSION['id']) && ($_SESSION['email'] )){


if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    $delete = "DELETE FROM `product` WHERE id = $id";
    $delet_chek=mysqli_query($conn,$delete);
}


?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light  bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addproduct.php">Add product</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="addproduct.php" id="navbarDropdown" role="menu" data-bs-toggle="dropdown" aria-expanded="false">
            Add product
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <button class=" btn btn-info" type="submit" ><a href="logout.php"><?php echo $_SESSION['email'] ?></a> </button>
      </form>
    </div>
  </div>
</nav>
    </div>
  </div>
</div>


    <div class="container">
        <div class="row " > 
        <?php 
      if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'change') {
      ?>
          <span style="color:red;font-size:22px;" class="text-center text-white bg-danger mt-2 w-50 m-auto">User Status Become Inactive</span>
      <?php 
      }
      ?>

<?php 
      if(isset($_REQUEST['statusalready']) && $_REQUEST['statusalready'] == 'already_nonactive') {
      ?>
          <span style="color:red;font-size:22px;"class="text-center text-white bg-danger mt-2 w-50 m-auto">User Status already non active</span>
      <?php 
      }
      ?>
    <!-- active file -->
<?php 
      if(isset($_REQUEST['statusalreadyactive']) && $_REQUEST['statusalreadyactive'] == 'already_active') {
      ?>
          <span style="color:red;font-size:22px; " class="text-center text-white bg-danger mt-2 w-50 m-auto">User Status already  Active</span>
      <?php 
      }
      ?>
<!--  -->
      <?php 
      if(isset($_REQUEST['instatus']) && $_REQUEST['instatus'] == 'inchange') {
      ?>
          <span style="color:red;font-size:22px;" class="text-center text-white bg-danger mt-2 w-50 m-auto">User Status Become Active</span>
      <?php 
      }
      ?>
            <div class="col-md-12 ">
                <div class="bg-success mt-5  text-center" >
                <h1 style="font-size: 60px;" class="text-light">Wellcome to Home Admin</h1>
                <h1 style="font-size: 30px;" class="text-light pb-3">how are you( <?php echo $_SESSION['email']; ?>)</h1>
                </div>
            </div>
        </div>
        <?php 
    $sql = "SELECT * FROM `registration` where `roll` = 'user'";
    $display_crud = mysqli_query($conn, $sql);
?>

<?php
if (isset($_REQUEST['user_role'])) {
  // Retrieve form data
  $user_role = $_REQUEST['user_role'];

  // Construct SQL query to check status
  $sql_check_status = "SELECT `status` FROM `registration` WHERE `id` = '$user_role'";
  $result_check_status = mysqli_query($conn, $sql_check_status);

  if ($result_check_status) {
      if (mysqli_num_rows($result_check_status) > 0) {
          $row = mysqli_fetch_assoc($result_check_status);
          $status = $row['status'];

          // If the user is already non-active, redirect with status=already_nonactive parameter
          if ($status == '0') {
              echo '<script>window.location.href="Admin.php?statusalready=already_nonactive";</script>';
          } else {
              // Construct SQL query to update status
              $sql_update = "UPDATE `registration` SET `status` = '0' WHERE `id` = '$user_role'";

              // Execute the SQL query to update status
              $sql_result = mysqli_query($conn, $sql_update);

              // Redirect to Admin.php with status=change parameter after updating
              if ($sql_result) {
                  echo '<script>window.location.href="Admin.php?status=change";</script>';
              } else {
                  // Handle error if the update query fails
                  echo "Error updating status: " . mysqli_error($conn);
              }
          }
      } else {
          // Handle the case when user_role is not found
          echo '<script>window.location.href="Admin.php?status=error";</script>';
      }
  } else {
      // Handle SQL query error
      echo "Error: " . mysqli_error($conn);
  }
}






if (isset($_REQUEST['user_role_2'])) {
  // Retrieve form data
  $user_role_2 = mysqli_real_escape_string($conn, $_REQUEST['user_role_2']);

  // Construct SQL query to check status
  $sql_check_status = "SELECT `status` FROM `registration` WHERE `id` = '$user_role_2'";
  $result_check_status = mysqli_query($conn, $sql_check_status);

  if ($result_check_status) {
      if (mysqli_num_rows($result_check_status) > 0) {
          $row = mysqli_fetch_assoc($result_check_status);
          $status = $row['status'];

          // If the user is already active, redirect with status=already_active parameter
          if ($status == '1') {
              echo '<script>window.location.href="Admin.php?statusalreadyactive=already_active";</script>';
              exit; // Stop further execution
          } else {
              // Construct SQL query to update status
              $sql_update = "UPDATE `registration` SET `status` = '1' WHERE `id` = '$user_role_2'";

              // Execute the SQL query to update status
              $sql_result = mysqli_query($conn, $sql_update);

              // Redirect to Admin.php with status=change parameter after updating
              if ($sql_result) {
                  echo '<script>window.location.href="Admin.php?instatus=inchange";</script>';
                  exit; // Stop further execution
              } else {
                  // Handle error if the update query fails
                  echo "Error updating status: " . mysqli_error($conn);
              }
          }
      } else {
          // Handle the case when user_role is not found
          echo '<script>window.location.href="Admin.php?status=error";</script>';
      }
  } else {
      // Handle SQL query error
      echo "Error: " . mysqli_error($conn);
  }
}
?>
       

       <div class="row">
    <div class="col-md-12">
        <!-- Start of the table -->
        <table class="table table-striped table-bordered">
            <!-- Table header -->
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info">Name</th> <!-- Table header for Name column -->
                    <th class="bg-info">Email</th> <!-- Table header for Email column -->
                    <th class="bg-info">Status</th> <!-- Table header for Status column -->
                    <th class="bg-info">Inactive Status</th> <!-- Table header for Inactive Status column -->
                    <th class="bg-info">Active Status</th> <!-- Table header for Active Status column -->
                    <th class="bg-info">Roll</th> <!-- Table header for Roll column -->
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <?php 
                if($display_crud) { // Checking if $display_crud variable is set and not empty
                    while($row = mysqli_fetch_assoc($display_crud)) { // Loop through each row in the result set
                        $id = $row['id']; // Assigning the value of 'id' column to $id variable
                        $name = $row['Name']; // Assigning the value of 'Name' column to $name variable
                        $email = $row['email']; // Assigning the value of 'email' column to $email variable
                        $password = $row['password']; // Assigning the value of 'password' column to $password variable
                        $status = $row['status']; // Assigning the value of 'status' column to $status variable
                        $roll = $row['roll']; // Assigning the value of 'roll' column to $roll variable
                        ?>
                        <!-- Start of a table row -->
                        <tr>
                            <!-- Displaying the value of $name variable in a table cell -->
                            <td><?php echo $name; ?></td>
                            <!-- Displaying the value of $email variable in a table cell -->
                            <td><?php echo $email; ?></td>
                            <!-- Displaying the value of $status variable in a table cell -->
                            <td><?php echo $status;?> </td>
                            <!-- Displaying a button to set the status to inactive -->
                            <td><a class="btn btn-danger" href="Admin.php?user_role=<?php echo $id; ?>">Inactive Status</a></td>
                            <!-- Displaying a button to set the status to active -->
                            <td><a class="btn btn-success" href="Admin.php?user_role_2=<?php echo $id; ?>">Active Status</a></td>
                            <!-- Displaying the value of $roll variable in a table cell -->
                            <td><?php echo $roll; ?> </td>
                        </tr> <!-- End of a table row -->
                        <?php } ?> <!-- End of the while loop -->
                <?php } ?> <!-- End of the if statement -->
            </tbody>
        </table> <!-- End of the table -->
    </div> <!-- End of the column -->
</div> <!-- End of the row -->

<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-md-12">
    <a href="addproduct.php" class="btn btn-danger mt-5 mb-5">Add Product</a>

      <h1 class=" text-center text-danger mt-5">product</h1>
    <table class="table">
  <thead>
    <tr class="bg-danger text-white">
      <th scope="col">Id</th>
      <th scope="col">Product</th>
      <th scope="col">Desciption</th>
      <th scope="col">Quantity</th>
      <th scope="col">Color</th>
      <th scope="col">Price1</th>  
      <th scope="col">Price2</th>  
      <th scope="col">Status</th>  
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   
    
  

<?php
    $sql_select = "SELECT * FROM `product`";
    $sql_ok = mysqli_query($conn,$sql_select);
    $i=1;
    
    if( $sql_ok){
      while($row= mysqli_fetch_assoc($sql_ok)){
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $quantity =$row['quantity'];
        $color = $row['color'];
        $price1 = $row['price1'];
        $price2 = $row['price2'];
        $status = $row['status'];
        echo '
        <tr class="bg-dark text-white">
        <th scope="row">'.$i.'</th>
        <td>'.$title.'</td>
        <td>'.$description.'</td>
        <td>'.$quantity.'</td>
        <td>'.$color.'</td>

        <td>'.$price1.'</td>
        <td>'.$price2.'</td>
        <td>'.$status.'</td>
        
        <td>
          <a href="updateproduct.php?updateid='.$id.'" class="text-light">
              <i class="ri-file-edit-line hover" style="cursor:pointer;"></i>
          </a>
        </td>
        <td>
            <form method="post">
            <input type="hidden" value=" '.$id.'" name="delete">
            <button type="submit" name="submit" style="background: none; border: none; cursor:pointer;">
                <i class="ri-delete-bin-line text-white"></i>
            </button>
            </form>
        </td>

      </tr>
        ';
        $i++;
      }
     
    }
    

?>

</tbody>
</table>
    </div>
  </div>
</div>
<?php 
include 'htlmbox/htmfooter.php';
?>
<?php
}else{
    header("Location:form.php"); 

    exit();
}
?>