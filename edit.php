<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $sku = $row['sku'];
    $category = $row['category'];
    $color = $row['color'];
    $price = $row['price'];
    $currency = $row['currency'];
    $description = $row['description'];
    $status = $row['status'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $sku= $_POST['sku'];
  $category= $_POST['category'];
  $color= $_POST['color'];
  $price= $_POST['price'];
  $currency= $_POST['currency'];
  $description = $_POST['description'];
  $status = $_POST['status'];

  $query = "UPDATE products set title = '$title', sku = 'sku', category = 'category', color = 'color', price = 'price', currency = 'currency', description = '$description', status = 'status' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Tên sản phẩm">
        </div>
        <div class="form-group">
          <input name="sku" type="text" class="form-control" value="<?php echo $sku; ?>" placeholder="Mã sản phẩm">
        </div>
        <div class="form-group">
          <input name="category" type="text" class="form-control" value="<?php echo $category; ?>" placeholder="Loại sản phẩm">
        </div>
        <div class="form-group">
          <input name="color" type="text" class="form-control" value="<?php echo $color; ?>" placeholder="Mà sắc">
        </div>
        <div class="form-group">
          <input name="price" type="text" class="form-control" value="<?php echo $price; ?>" placeholder="Giá">
        </div>
        <div class="form-group">
          <input name="currency" type="text" class="form-control" value="<?php echo $currency; ?>" placeholder="Đơn vị tiền">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
          <div class="form-group">
              <input name="status" type="text" class="form-control" value="<?php echo $status; ?>" placeholder="Trạng thái">
          </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
