<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

if (isset($_POST['add'])) {
  $content = $_POST['content'];
  $track = $_POST['track'];
  $insert = "INSERT INTO `content`(`id`, `track_id`, `description`) VALUES (null,$track,'$content')";
  mysqli_query($con, $insert);
}
$select = "SELECT * FROM `content`";
$result = mysqli_query($con, $select);

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $d = "DELETE FROM `content` WHERE id=$id";
  $q_d = mysqli_query($con, $d);
  go("/content/add.php");
}

?>
<main id="main" class="main">
  <h3>Content</h3>
  <hr>
  <div class="container col-md-8">
    <div class="card">
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Track</label>
            <select name="track" class="form-control">
              <?php
              $select = "SELECT * FROM `track`";
              $result = mysqli_query($con, $select);
              foreach ($result as $data) {
              ?>
                <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Add Content</button>
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Track</th>
          <th scope="col">Content</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $select = "SELECT content.id id , content.description 'description' ,track.title title
        from content INNER JOIN track on content.track_id = track.id ORDER BY id ASC";
        $result = mysqli_query($con, $select);
        foreach ($result as $data) {
          $id = $data['id'];
        ?>
          <tr>
            <th scope="row"><?= $id ?></th>
            <td><?= $data['title'] ?></td>
            <td><?= $data['description'] ?></td>
            <td><a href="/instant/admin-panel/content/edit.php?edit=<?= $id ?>"><i class='bx bxs-edit-alt'></i></a></td>
            <td><a href="/instant/admin-panel/content/add.php?delete=<?= $id ?>"><i class='bx bxs-message-x'></i></a></td>
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