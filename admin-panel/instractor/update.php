<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s = "SELECT * FROM `track`";
$s_q = mysqli_query($con, $s);
$errors = [];
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $s = "SELECT instractor.id as inst_id,instractor.name,instractor.email,instractor.phone,instractor.address,instractor.image,track.title,track.id as tr_id FROM `instractor` JOIN track ON instractor.track_id=track.id WHERE  instractor.id=$id";
    $q_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s);
    if (isset($_POST['send'])) {
        $name = $_POST['name'];
        $phone = strip_tags($_POST['phone']);
        $address = strip_tags($_POST['address']);
        $email = strip_tags($_POST['email']);
        $track_id = $_POST['track_id'];
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
        if (trim($phone) == "") {
            $errors[] = "please enter phone";
        }
        if (trim($address) == "") {
            $errors[] = "please enter address";
        }
        if (trim($email) == "") {
            $errors[] = "please enter email";
        }
        if (empty($errors)) {
            $location = "./upload/$image_name";
            move_uploaded_file($tmp_name, $location);
            $u = "UPDATE `instractor` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`image`='$image_name',`track_id`='$track_id'WHERE id=$id";
            $q = mysqli_query($con, $u);
            if ($q) {
                go("/instractor/list.php");
            }
        }
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
                        <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" value=" <?= $row['phone'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" name="address" value=" <?= $row['address'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value=" <?= $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">track</label>
                        <select class="form-control" name="track_id">
                            <?php foreach ($s_q as $data) { ?>
                                <option value="<?= $data['id'] ?>" <?php if ($data['id'] == $row['tr_id']) {
                                                                        echo "selected";
                                                                    } ?>><?= $data['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>