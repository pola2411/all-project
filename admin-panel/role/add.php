<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$s = "SELECT * FROM `role`";
$s_q = mysqli_query($con, $s);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $d = "DELETE FROM `role` WHERE id=$id";
    $q_d = mysqli_query($con, $d);
    go("/role/add.php");
}
$errors = [];
if (isset($_POST['send'])) {
    $description = $_POST['description'];
    if (trim($description) == "") {
        $errors[] = "please enter description";
    }
    if (empty($errors)) {
        $i = "INSERT INTO `role` VALUES (null,'$description')";
        $q_i = mysqli_query($con, $i);
        go("/role/add.php");
    }
}
?>
<main id="main" class="main">
    <h3>Role</h3>
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
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="send" class="btn btn-info mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Description</th>
                    <th scope="col"><i class='bx bxs-message-x'></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['description'] ?></td>
                        <td><a href="/instant/admin-panel/role/add.php?delete=<?= $data['id'] ?>"><i class='bx bxs-message-x'></i></a></td>
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