<?php include 'htlmbox/htmheader.php' ?>
<?php
session_start();
?>
<?php

$id = $_GET['updateid'];

$sql_already = "SELECT * FROM `product` WHERE id= $id";
$result_already = mysqli_query($conn, $sql_already);
$row = mysqli_fetch_assoc($result_already);
    $title = $row['title'];
    $description = $row['description'];
    $quantity = $row['quantity'];
    $color = $row['color'];
    $price1 = $row['price1'];
    $price2 = $row['price2'];
    $status = $row['status'];

    // update form here


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
                    <a class="nav-link" href="addproduct.php">Add Product</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
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
<?php
        if(isset($_POST['submit'])){
            $id = $_GET['updateid'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $color = $_POST['color'];
            $price1 = $_POST['price1'];
            $price2 = $_POST['price2'];
            $status = $_POST['status'];
            $sql = " UPDATE product SET  title='$title' , description= '$description' , color='$color',price1='$price1',price2='$price2',status='$status' WHERE id=$id ";
            $sql_check = mysqli_query($conn, $sql);
            if($sql_check){
                header('Location:Admin.php');
            }
            
            
        }
?>

<div class="container">
    <div class="row bg-light ">
        <div class="col-md-12 ">
            <form class="mt-5 " method="post">
                <div class="mb-3">
                    <label for="Product Name" class="lead">Product Name</label><br>
                    <input type="text" class="form-control" name="title" value="<?php echo $title ?>" >

                </div>
                   <div>
                   <label for="Description" class="lead">Description</label>

                        <div class="form-floating">

                          <textarea class="form-control" name="description" id="floatingTextarea"   ><?php echo $description ?></textarea>
                          <label for="floatingTextarea">Description</label>
                    </div>
                   </div>
                <div class="mb-3">
                    <label for="quantity" class="lead">Quantity</label><br>
                    <input type="number" class="form-control" name="quantity" value="<?php echo $quantity ?>" >
                </div>
                <div class="mb-3">
                    <label for="color" class="lead">Color</label><br>
                    <input type="text" class="form-control" name="color" value="<?php echo $color ?>">
                </div>
                <div class="mb-3">
                    <label for="Price1" class="lead">Price1</label><br>
                    <input type="text" class="form-control" name="price1" value="<?php echo $price1 ?>">
                </div>
                <div class="mb-3">
                    <label for="Price2" class="lead">Price2</label><br>
                    <input type="text" class="form-control" name="price2" value="<?php echo $price2 ?>">
                </div>
                <div class="mb-3">
                    <label for="status" class="lead">status</label><br>
                    <input type="text" class="form-control" name="status" value="<?php echo $status ?>">
                </div>
                <div>
                    <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>
<?php include 'htlmbox/htmfooter.php' ?>