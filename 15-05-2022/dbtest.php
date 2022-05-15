<?php 
    include_once('./config.php');
?>
<?php
        if(isset($_GET['delete'])){
            $idDelete = $_GET['delete'];
            $sqlDelete = "DELETE FROM register WHERE uid= $idDelete";
            mysqli_query($conn,$sqlDelete);
            header("location:dbtest.php");
        }
       ?>
    <?php
    //Select from database
        $sql = "SELECT * FROM `person`;";//the command line
        $result = mysqli_query($conn, $sql);//the query (we send the command line to the server and return results depend on the command)

        $resultCheck = mysqli_num_rows($result); //the number of rows returned from mysqli_query
        if ($resultCheck > 0) { //we check if there is data in the table inside database
            while ($rows = mysqli_fetch_assoc($result)){ 
                // echo '<pre>';
                // var_dump($rows);
                // echo '</pre>';
                // echo $rows["Pk_Person_Id"];
            }
        }
    ?>

<?php include_once('registerform.php'); ?>
<?php
        //Insert into database
        if (isset($_POST['register'])){

            $fname = mysqli_real_escape_string($conn,$_POST['fname']) ; // To protect from sql injection
            $lname = mysqli_real_escape_string($conn,$_POST['lname']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $rpassword = mysqli_real_escape_string($conn,$_POST['rpassword']);
            
            $sqlinsert = "INSERT INTO register(fname,lname,email,password) VALUES('$fname','$lname','$email','$password');";
            mysqli_query($conn,$sqlinsert);
        }
        // header("location:dbtest.php");
        // $sql = "INSERT INTO person(Pk_Person_Id,Name,EmailId) VALUES (1993,'yousef','y@gmail.com'),(0,'yousef','y@gmail.com'),(1989,'mohee','m@gmail.com') ";
        //mysqli_query($conn,$sql);
        // header("Location:")

        ?>
        <?php 
        //Modify from database
        $sqlModify1 = "UPDATE register SET fname = 'fayiz yousef' , lname = 'alhindawi', email='f@gmail.com' WHERE  uid =  6;";
        mysqli_query($conn,$sqlModify1);
        $sqlModify2 = "UPDATE register SET fname = 'yousef fayiz' , lname = 'alhindawi', email='f@gmail.com' WHERE  uid =  4;";
        mysqli_query($conn,$sqlModify2);
        $sqlModify3 = "UPDATE register SET fname = 'mohee fayiz' , lname = 'alhindawi', email='f@gmail.com' WHERE  uid =  7;";
        mysqli_query($conn,$sqlModify3);
        //Delete from database
        $sqlDelete = "DELETE FROM register WHERE uid=10 ";
        mysqli_query($conn,$sqlDelete);
        ?>

<?php include_once('./header.php') ?>


<div class="container  mt-4">
      <table class="table">
         <thead>
         <tr>
            <th scope="col" class="text-center">First Name</th>
            <th scope="col" class="text-center">Last Name</th>
            <th scope="col" class="text-center">E-mail</th>
            <th scope="col" class="text-center">Action</th>
         </tr>
         </thead>
         <?php
         $sqlSelect = "SELECT * FROM register";
         $select = mysqli_query($conn,$sqlSelect);
          while($row = mysqli_fetch_assoc($select)){ ?>
            <tbody>
         <tr>
            <td class="align-middle text-center"><?php echo $row['fname']; ?></td>
            <td class="align-middle text-center"><?php echo $row['lname']; ?></td>
            <td class="align-middle text-center"><?php echo $row['email']; ?></td>
            <td class="align-middle text-center">
               <a href="update.php?edit=<?php echo $row['uid']; ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit </a>
               <a href="dbtest.php?delete=<?php echo $row['uid']; ?>" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete </a>
            </td>
         </tr>
         </tbody>
      <?php } ?>
      </table>
   </div>
      

   
</body>
</html>