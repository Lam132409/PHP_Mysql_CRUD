<?php

include('db.php');

if (isset($_POST['save'])) {
  $title = $_POST['title'];
  $sku = $_POST['sku'];
  $category = $_POST['category'];
  $color = $_POST['color'];
  $price = $_POST['price'];
  $currency = $_POST['currency'];
  $description = $_POST['description'];
  $status = $_POST['status'];
  $image=$_FILES['image']['name'];
  $upload="uploads/".$image;
  $query = "INSERT INTO products(title, sku, category, image, color, price, currency, description, status) VALUES ('$title', '$sku', '$category', '$image', '$color', '$price', '$currency', '$description', '$status')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
