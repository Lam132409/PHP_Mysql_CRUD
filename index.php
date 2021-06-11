<?php
include_once 'db.php';
include_once 'includes/header.php';
include_once 'save_task.php'
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Tên sản phẩm" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="sku" class="form-control" placeholder="Mã sản phẩm" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="category" class="form-control" placeholder="Thẻ loại" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="color" class="form-control" placeholder="Màu sắc" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="price" class="form-control" placeholder="Giá" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="currency" class="form-control" placeholder="Đơn vị tiền" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Mô tả"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="status" class="form-control" placeholder="Trạng thái" autofocus>
          </div>
          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $image; ?>">
            <input type="file" name="image" class="custom-file">
          </div>

          <input type="submit" name="save" class="btn btn-success btn-block" value="Tạo         ">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Hình ảnh</th>
            <th>Sản phảm</th>
            <th>Mã</th>
            <th>Thể loại</th>
            <th>Màu sắc</th>
            <th>giá</th>
            <th>Đơn vị tiền</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Ngày nhập</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM products";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><img src="<?= $row['image']; ?>" width="25"></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['sku']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['color']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['currency']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['create_at']; ?></td>


            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
