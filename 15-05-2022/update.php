<?php

include_once 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update'])){

   $fname = mysqli_real_escape_string($conn,$_POST['upfname']) ; // To protect from sql injection
   $lname = mysqli_real_escape_string($conn,$_POST['uplname']);
   $email = mysqli_real_escape_string($conn,$_POST['upemail']);

   
   $update_data = "UPDATE register SET fname = '$fname' , lname = '$lname', email='$email' WHERE  uid = '$id';";
   mysqli_query($conn, $update_data);
   header('location:dbtest.php');
};

?>

<?php include_once('./header.php')?>;



<div class="container">

<div class="admin-product-form-container centered">

   <?php
      $sqlSelect = "SELECT * FROM register WHERE uid = '$id'";
      $select = mysqli_query($conn,$sqlSelect);
       while($row = mysqli_fetch_assoc($select)){ ?>

<section class="" style="background-color: #eee;">
  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit your account</p>

                <form class="mx-1 mx-md-4" action="" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw mb-4 mx-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="upfname" value="<?php echo $row['fname']; ?>"/>
                      <label class="form-label" for="form3Example1c">First Name</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw mb-4 mx-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1" class="form-control" name="uplname" value="<?php echo $row['lname']; ?>"/>
                      <label class="form-label" for="form3Example1">Last Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw mb-4 mx-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="upemail" value="<?php echo $row['email']; ?>"/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" value="update" name="update">update</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <a href="dbtest.php" class="btn btn-primary btn-lg">go back!</a>
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
<?php }; ?>

</body>
</html>