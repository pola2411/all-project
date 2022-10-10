<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$errors = [];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `diplomas` WHERE `id` = $id";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    $track_id = $row['track_id'];

    if (isset($_POST['update'])) {
        $track = $_POST['track'];
        $content = $_POST['content'];
        $price = strip_tags($_POST['price']);
        $date = $_POST['date'];
        $period = strip_tags($_POST['period']);

        if (trim($price) == "") {
            $errors[] = "please enter right price";
        }
        if (trim($date) == "") {
            $errors[] = "please enter right date";
        }
        if (trim($period) == "") {
            $errors[] = "please enter right period";
        }
        if (empty($_FILES['image']['name'])) {
            $fileName = $row['dip_image'];
        } else {
            $fileName = time() . $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $type = $_FILES['image']['type'];
            $size = $_FILES['image']['size'];
            if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg" || $type == "image/webp") {
            } else {
                $errors[] = "you must enter photo with type png , jpg , jpeg , webp only ";
            }
            if (($size / 1024) / 1024 > 2) {
                $errors[] = "please enter photo less than 2 MB";
            }
        }
        // var_dump($errors);
        if (empty($errors)) {
            $location = "../images/$fileName";
            move_uploaded_file($tmp_name, $location);
            $update = "UPDATE `diplomas` SET `track_id`='$track', `content_id`='$content',`price`='$price',`start_time`='$date',`period`='$period',`dip_image`='$fileName' WHERE id = $id";
            mysqli_query($con, $update);
            go('diploma/list.php');
        }
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
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="mt-2">Track</label>
                        <select name="track" class="form-control my-2">
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
                        <select name="content" class="form-control my-2">
                            <?php
                            $select = "SELECT * FROM `content`";
                            $result = mysqli_query($con, $select);
                            foreach ($result as $data) {
                            ?>
                                <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" value="<?= $row['price'] ?>" name="price" class="form-control my-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Srart Date</label>
                        <input type="date" value="<?= $row['start_time'] ?>" name="date" class="form-control my-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Period</label>
                        <input type="text" value="<?= $row['period'] ?>" name="period" class="form-control my-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" value="<?= $row['dip_image'] ?>" name="image" class="form-control my-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary my-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>