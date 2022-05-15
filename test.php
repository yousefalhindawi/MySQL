<?php

function calculate($num1, $num2,$operator){
    $result;
    if($operator == 'Add'){
        $result = $num1 + $num2;
    }else if($operator == 'Subtract'){
        $result = $num1 - $num2;
    }else if($operator == 'Multiple'){
        $result = $num1 * $num2;
    }else if($operator == 'Divion'){
        $result = $num1 / $num2;
    } else if($operator == 'None'){
        $result ='You need to choose an operator to calculate';
    }
    return $result;
}
if (isset($_GET['calculate'])){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operator = $_GET['operator'];
    $show_result = calculate($num1, $num2,$operator);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="yousef">
  <meta name="generator" content="Hugo 0.72.0">
  <title>TEST</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="container col-4 my-5">
<form class="needs-validation" validate method="GET" action="">
  <div class="">
    <label for="validationCustom01" class="form-label">First Number</label>
    <input type="text" class="form-control" name="num1" id="validationCustom01" value="" required>
  </div>

  <div class="">
    <label for="validationCustom02" class="form-label">Secound Number</label>
    <input type="text" class="form-control" name="num2" id="validationCustom02" value="" required>
    
  </div>
 
      <div class="form-group">
        <label for="validationCustom03" class="form-label">Operator</label>
      <select class="form-control" name="operator" id="validationCustom03" required>
        <option >None</option>
        <option >Add</option>
        <option >Subtract</option>
        <option >Multiple</option>
        <option >Divion</option>
      </select>
    </div>
  <div class="">
      <button class="btn btn-primary my-3" type="submit" name="calculate">Calculate</button>
    </div>
    <div class="">
      <label for="validationCustom04" class="form-label">Result</label>
      <input type="text" class="form-control" id="validationCustom04" value="<?php echo $show_result ??=''; ?>">
    </div>
</form>
</div>

<div class="container d-flex justify-content-center">
<?php
    $dayofweek = date("w");
    switch ($dayofweek) {
        case 6:
            echo "it's Satarday";
            break;
        case 0:
            echo "it's Sunday";
            break;
        case 1:
            echo "it's Monday";
            break;
        case 2:
            echo "it's Tuesday";
            break;
        case 3:
            echo "it's Wednesday";
            break;
        case 4:
            echo "it's Thursday";
            break;
        case 5:
            echo "it's Friday";
            break;
    }
    ?>
    </div>

    <?php
        //indexed array
        $indexed = array('yousef','mohee','mohammad');
        //associative array
        $associative = array('brother1'=>'yousef','brother2'=>'mohee','brother3'=>'mohammad');
        // another way of associative array
        $associative2 ;
        $associative2['brother1'] = 'yousef';
        $associative2['brother2'] = 'mohee';
        $associative2['brother3'] = 'mohammad';
        //multidimensional array
        $multidimensional = array('children'=>array('yousef','mohee','mohammad','sala'),'parent'=>array('fayiz','maria'));

        echo' <pre>';
         var_dump($indexed);
        echo '</pre>';

        echo' <pre>';
         var_dump($associative);
        echo '</pre>';

        echo' <pre>';
         var_dump($associative2);
        echo '</pre>';

        echo' <pre>';
         var_dump($multidimensional);
        echo '</pre>';

        $x = 10;
        function test() {
            echo $GLOBALS['x'];
        }
        test() ;

        setcookie('cname','value',time()+(60*60*24));//create a new cookie
        setcookie('cname','value',time()-1);//destroy the cookie

        $_SESSION['sname'] = 'value';
        start_session();
        destroy_session();
        end_session();
    ?>

</body>
</html>
