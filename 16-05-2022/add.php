<?php
    require_once("./config.php");
?>
<?php
 require_once("./form.php")
?>

<?php
    if (isset($_GET['delete'])){
        $deleteItem = $_GET['delete'];
        $sqlDelete = "DELETE FROM products WHERE product_id=$deleteItem;";
        $stmt = $pdo->prepare($sqlDelete);
        $stmt->execute();
        header("location:add.php");
    }
?>

<?php
if(!empty($_POST['name'])&&!empty($_POST['price'])&&!empty($_POST['category']) && isset($_POST['submit'])){
    $itemName = $_POST['name'];
    $itemPrice = $_POST['price'];
    $itemcategory = $_POST['category'];
    $sqlinsert = "INSERT INTO products (product_name, product_price, category_id) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sqlinsert);
    $stmt->execute([$itemName,$itemPrice,$itemcategory]);
} 
?>

<div class="container  mt-4">
      <table class="table">
         <thead>
         <tr>
            <th scope="col" class="text-center">Product Name</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col" class="text-center">Category</th>
            <th scope="col" class="text-center">Action</th>
         </tr>
         </thead>
         
         <?php
         $sqlSelect = "SELECT products.product_id, products.product_name, products.product_price, category.category_name
         FROM products
         LEFT JOIN category
         ON products.category_id = category.category_id;";
         $stmt = $pdo->prepare($sqlSelect);
         $stmt->execute();

          while($product = $stmt->fetch()){ ?>
            <tbody>
         <tr>
            <td class="align-middle text-center"><?php echo $product['product_name']; ?></td>
            <td class="align-middle text-center"><?php echo $product['product_price']; ?></td>
            <td class="align-middle text-center"><?php echo $product['category_name']; ?></td>
            <td class="align-middle text-center">
               <a href="update.php?edit=<?php echo $product['product_id']; ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit </a>
               <a href="add.php?delete=<?php echo $product['product_id']; ?>" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete </a>
            </td>
         </tr>
         </tbody>
      <?php } ?>
      </table>
   </div>
      

   
</body>
</html>