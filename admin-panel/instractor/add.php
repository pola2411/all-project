<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$s = "SELECT * FROM `track`";
$s_q = mysqli_query($con, $s);
$errors = [];
if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $phone = strip_tags($_POST['phone']);
  $address = strip_tags($_POST['address']);
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);
  $new_pass = sha1($password);
  $track_id = $_POST['track_id'];
  $image_name = time() . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $type = $_FILES['image']['type'];
  $size = $_FILES['image']['size'];

  if (trim($name) == "") {
    $errors[] = "please enter name";
  }
  if (trim($phone) == "") {
    $errors[] = "please enter phone";
  }
  if (trim($address) == "") {
    $errors[] = "please enter address";
  }
  if (trim($email) == "") {
    $errors[] = "please enter email";
  }
  if (trim($password) == "") {
    $errors[] = "please enter password";
  }
  if (($size / 1024) / 1024 > 1) {
    $errors[] = "you must enter img less than 1:M";
  }
  if (($type == "image/jpeg") || ($type == "image/png") || ($type == "image/jpg")) {
  } else {
    $errors[] = "you must enter img type png jpg jpeg ";
  }
  if (empty($errors)) {
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);
    $i = "INSERT INTO `instractor`(`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `track_id`) VALUES (null,'$name','$email','$new_pass','$phone','$address','$image_name',$track_id)";
    $q_i = mysqli_query($con, $i);
  }
}
?>
<main id="main" class="main">
<h3>Instractor</h3>
  <hr>
  <div class="container col-md-8">
    <div class="card">
      <?php if (empty($errors)) {
      } else { ?>
        <div class="alert alert-danger" role="alert">
          <ul>
            <?php foreach ($errors as $errors_view) { ?>
              <li><?= $errors_view ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">image</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">track</label>
            <select class="form-control" name="track_id">
              <?php foreach ($s_q as $data) { ?>
                <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" name="send" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>