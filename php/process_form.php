<?php
if(isset($_GET['opslaan']) == "ja"){
    $user_id = $_SESSION['user_id'];
    // $product_id = $_POST['product_id'];
    // $quantity = $_POST['quantity'];
    $product_id = $_GET['pd'];
    $quantity = $_GET['q'];

    // print_r($user_id);
    // print_r($product_id);
    // print_r($quantity);

    // Validate the input data
    // if (!is_numeric($user_id) || !is_numeric($product_id) || !is_numeric($quantity)) {
    //     // Return an error message
    //     exit;
    // }

    // Insert the shopping bag item into the database
    // $stmt = $mysqli->prepare("INSERT INTO shopping_bag (user_id, product_id, quantity) VALUES (?, ?, ?)");
    // $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    // $stmt->execute();
    $shopping_insert = $mysqli->query("INSERT shopping_bag SET user_id = '".$mysqli->real_escape_string($user_id)."',
                                                                    product_id 	= '".$product_id."',
                                                                    quantity	= '".$quantity."'") or die($mysqli->error.__LINE__);	
  
  // do whatever you want with the form data, like storing it in a database
  // and return a response if needed
  header("Location: ".$url."winkelwagen");
  exit;
}

if($_GET['deleteID']){
  $user_id = $_SESSION['user_id'];
  $product_delete_id = $_GET['deleteID'];

  $shopping_delete = $mysqli->query("DELETE FROM `shopping_bag` WHERE user_id = '".$mysqli->real_escape_string($user_id)."' AND product_id = '".$product_delete_id."'") or die($mysqli->error.__LINE__);	

  header("Location: ".$url."winkelwagen");
  exit;
}
?>