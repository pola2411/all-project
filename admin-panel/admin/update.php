<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s = "SELECT * FROM `role`";
$s_q = mysqli_query($con, $s);
$errors = [];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * From `admin` where id=$id";
    $s = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($s);
}
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $role_id = $_POST['role_id'];
    if (empty($_FILES['image']['name'])) {
        $image_name = $row['image'];
    } else {
        unlink("./upload/$row[image]");
        $image_name = time() . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $type = $_FILES['image']['type'];
        $size = $_FILES['image']['size'];
        if (($type == "image/jpeg") || ($type == "image/png") || ($type == "image/jpg")) {
        } else {
            $errors[] = "you must enter img type png jpg jpeg ";
        }
    }
    if (trim($name) == "") {
        $errors[] = "please enter name";
    }
    if (trim($email) == "") {
        $errors[] = "please enter email";
    }
    if (trim($password) == "") {
        $errors[] = "please enter password";
    }
    if (empty($errors)) {
        $location = "./upload/$image_name";
        move_uploaded_file($tmp_name, $location);
        $up = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`image`='$image_name',`role_id`='$role_id' WHERE id=$id";
        $q_i = mysqli_query($con, $up);
        go("/admin/list.php");
    }
}
?>
<main id="main" class="main">
    <h3>Admin</h3>
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
                        <label for="exampleInputEmail1"> Name</label>
                        <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" value="<?= $row['password'] ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">role</label>
                        <select class="form-control" name="role_id">
                            <?php foreach ($s_q as $data) { ?>
                                <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="send" class="btn btn-info mt-3">edit</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>