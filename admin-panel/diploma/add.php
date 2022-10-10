<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$errors = [];
if (isset($_POST['add'])) {
    $track = $_POST['track'];
    $content = $_POST['content'];
    $price = strip_tags($_POST['price']);
    $date = strip_tags($_POST['date']);
    $period = strip_tags($_POST['period']);
    $fileName = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];

    if (trim($price) == "") {
        $errors[] = "please enter right price";
    }
    if (trim($date) == "") {
        $errors[] = "please enter right date";
    }
    if (trim($period) == "") {
        $errors[] = "please enter right period";
    }
    if (($size / 1024) / 1024 > 2) {
        $errors[] = "please enter photo less than 2 MB";
    }
    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg" || $type == "image/webp") {
    } else {
        $errors[] = "you must enter photo with type png , jpg , jpeg , webp only ";
    }
    if (empty($errors)) {
        $location = "../images/$fileName";
        move_uploaded_file($tmp_name, $location);
        $insert = "INSERT INTO `diplomas`(`id`, `track_id`, `content_id`, `price`, `start_time`, `period`, `dip_image`) VALUES (null,$track,$content,$price,'$date','$period','$location')";
        mysqli_query($con, $insert);
        go('/diploma/list.php');
    }
}
?>
<main id="main" class="main">
    <h3>Diploma</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between w-100">
                        <div class="form-group w-50 me-5">
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
                        <div class="form-group w-50">
                            <label for="exampleInputEmail1">Content</label>
                            <select name="content" class="form-control">
                                <?php
                                $select = "SELECT * FROM `content`";
                                $result = mysqli_query($con, $select);
                                foreach ($result as $data) {
                                ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Srart Date</label>
                        <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Period</label>
                        <input type="text" name="period" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="add" class="btn btn-primary mt-3">Add Diploma</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>