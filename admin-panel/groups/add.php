<?php

include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$errors = [];


$s_dip = "SELECT diplomas.id as dip_id,track.title FROM `diplomas` JOIN track ON diplomas.track_id=track.id";
$q_s_dip = mysqli_query($con, $s_dip);
if (isset($_POST['send'])) {
    $dip_id = strip_tags($_POST['dip_id']);
    $stutus = strip_tags($_POST['stutus']);
    $days = strip_tags($_POST['days']);


    if (trim($days) == "") {
        $errors[] = "please enter days";
    }
    if (empty($errors)) {
        $i = "INSERT INTO `groups`(`id`, `diploma_id`, `status`, `days`) VALUES (null,$dip_id,'$stutus','$days')";
        $q_i = mysqli_query($con, $i);
        go("/groups/add.php");
    }
}
$s = "SELECT groups.id,groups.status,groups.days ,track.title FROM `groups`JOIN diplomas on groups.diploma_id=diplomas.id JOIN track ON diplomas.track_id=track.id;";
$s_q = mysqli_query($con, $s);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $d = "DELETE FROM `groups` WHERE id=$id";
    $q_d = mysqli_query($con, $d);
    go("/groups/add.php");
}
?>
<main id="main" class="main">
<h3>Groups</h3>
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
                    <div class="form-group ">
                        <label for="exampleInputEmail1">diploma</label>
                        <select name="dip_id" class="form-control" id="">
                            <?php foreach ($q_s_dip as $data) { ?>
                                <option value="<?= $data['dip_id'] ?>"><?= $data['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">status</label>
                        <select name="stutus" class="form-control" id="">
                            <option value="offline">offline</option>
                            <option value="online">online</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Days</label>
                        <input type="text" name="days" class="form-control">
                    </div>
                    <button type="submit" name="send" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-10">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Days</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td> <?= $data['title'] ?></td>
                        <td> <?= $data['status'] ?></td>
                        <td> <?= $data['days'] ?></td>
                        <td><a href="/instant/admin-panel/groups/add.php?delete=<?= $data['id'] ?>"><i class='bx bxs-message-x'></i></a></td>
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