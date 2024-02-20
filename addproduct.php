<?php include 'htlmbox/htmheader.php' ?>
<?php
session_start();
?>
<?php 
    if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'];
    $price1 = $_POST['price1'];
    $price2 = $_POST['price2'];
    $status = $_POST['status'];
    $sql_confirm = " insert into `product` (title, description, quantity, color, price1, price2, status)  values ('$title', '$description', '$quantity', '$color', '$price1', '$price2', '$status')";
    $sql_checke = mysqli_query($conn , $sql_confirm);
    if($sql_checke){
        header('Location:Admin.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    
    
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
                    <a class="nav-link" href="addproduct.php">Add Product</a>
                    </li><li class="nav-item">
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

<div class="container">
    <div class="row bg-light ">
        <div class="col-md-12 ">
            <form class="mt-5 " method="post">
                <div class="mb-3">
                    <label for="Product Name" class="lead">Product Name</label><br>
                    <input type="text" class="form-control" name="title">

                </div>
                   <div>
                   <label for="Description" class="lead">Description</label>

                        <div class="form-floating">

                          <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                          <label for="floatingTextarea">Description</label>
                    </div>
                   </div>
                <div class="mb-3">
                    <label for="quantity" class="lead">Quantity</label><br>
                    <input type="number" class="form-control" name="quantity">
                </div>
                <div class="mb-3">
                    <label for="color" class="lead">Color</label><br>
                    <input type="text" class="form-control" name="color">
                </div>
                <div class="mb-3">
                    <label for="Price1" class="lead">Price1</label><br>
                    <input type="number" class="form-control" name="price1">
                </div>
                <div class="mb-3">
                    <label for="Price2" class="lead">Price2</label><br>
                    <input type="number" class="form-control" name="price2">
                </div>
                <div class="mb-3">
                    <label for="status" class="lead">status</label><br>
                    <input type="number" class="form-control" name="status">
                </div>
                <div>
                    <input type="submit" value="Creat Product" name="submit" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>
<?php include 'htlmbox/htmfooter.php' ?>