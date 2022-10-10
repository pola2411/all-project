<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$errors = [];
if (isset($_POST['send'])) {
  $title = strip_tags($_POST['title']);
  if (trim($title) == "") {
    $errors[] = "please enter title";
  }
  if (empty($errors)) {
    $i = "INSERT INTO `track`(`id`, `title`) VALUES (null,'$title')";
    $q_i = mysqli_query($con, $i);
  }
}
$s = "SELECT * FROM `track`";
$s_q = mysqli_query($con, $s);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $d = "DELETE FROM `track` WHERE id=$id";
  $q_d = mysqli_query($con, $d);
  go("/track/add.php");
}
?>
<main id="main" class="main">
<h3>Track</h3>
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
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" name="send" class="btn btn-primary mt-3">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col"><i class='bx bxs-message-x'></i></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($s_q as $data) { ?>
          <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['title'] ?></td>
            <td><a href="/instant/admin-panel/track/add.php?delete=<?= $data['id'] ?>"><i class='bx bxs-message-x'></i></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>