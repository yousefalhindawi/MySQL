<?php require_once ('./config.php');?>
<?php
$id = $_GET['edit'];

if(isset($_POST['update'])){

   $product_name = $_POST['product_name'] ; // To protect from sql injection
   $product_price = $_POST['product_price'];
   $category_id =$_POST['category'];

   
   $update_data = "UPDATE products SET product_name = '$product_name' , product_price = '$product_price', category_id ='$category_id' WHERE  product_id = '$id';";
   $stmt = $pdo->prepare($update_data);
   $stmt->execute();
   header('location:add.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>



<div class="container">

<div class="admin-product-form-container centered">

   <?php
      $sqlSelect = "SELECT * FROM products WHERE product_id = '$id'";
      $stmt = $pdo->prepare($sqlSelect);
      $stmt->execute();
       while($product = $stmt->fetch()){ ?>

<section class="" style="background-color: #eee;">
  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Product</p>

                <form class="mx-1 mx-md-4" action="" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Product Name</label>
                      <input type="text" id="form3Example1c" class="form-control" name="product_name" value="<?php echo $product['product_name']; ?>"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1">Price</label>
                      <input type="text" id="form3Example1" class="form-control" name="product_price" value="<?php echo $product['product_price']; ?>"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                  <select name = "category" class="form-select" id="form3Example3c">
                      <option selected disabled>Choose A Category</option>
                      <?php
                      $sqlSelect = "SELECT * FROM category";
                      $stmt = $pdo->prepare($sqlSelect);
                      $stmt->execute();
                      while($categories = $stmt->fetch()){?>
                      <option value = "<?php echo $categories["category_id"]?>"><?php echo $categories["category_name"]?></option>
                      <?php } ?>
                      </select>
                    
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" value="update" name="update">update</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <a href="add.php" class="btn btn-primary btn-lg">go back!</a>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

</body>
</html>