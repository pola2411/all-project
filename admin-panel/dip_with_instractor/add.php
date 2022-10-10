<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s_show = "SELECT diploma_with_instractor.id,instractor.name,track.title FROM `diploma_with_instractor` JOIN instractor on diploma_with_instractor.instractor_id=instractor.id JOIN diplomas on diploma_with_instractor.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id";
$q_s_show = mysqli_query($con, $s_show);
if (isset($_POST['send'])) {
    $dip_id = strip_tags($_POST['dip_id']);
    $in_id = strip_tags($_POST['in_id']);
    echo"$in_id";
    $i = "INSERT INTO `diploma_with_instractor`  VALUES(NULL,$dip_id,$in_id)";
    $q_i = mysqli_query($con, $i);
    go("/dip_with_instractor/add.php");
}
$s_dip = "SELECT diplomas.id as dip_id,track.title FROM `diplomas` JOIN track ON diplomas.track_id=track.id";
$q_s_dip = mysqli_query($con, $s_dip);
$s_in = "SELECT * FROM `instractor`";
$q_s_in = mysqli_query($con, $s_in);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $d = "DELETE FROM `diploma_with_instractor` WHERE id=$id";
    $q_d = mysqli_query($con, $d);
    go("/dip_with_instractor/add.php");
}
?>
<main id="main" class="main">
    <h3>Diploma With Instractor</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <div class="card-body ">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Diploma</label>
                        <select name="dip_id" class="form-control" id="">
                            <?php foreach ($q_s_dip as $data) { ?>
                                <option value="<?= $data['dip_id'] ?>"><?= $data['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Instractor</label>
                        <select name="in_id" class="form-control" id="">
                            <?php foreach ($q_s_in as $data) { ?>
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">Title</th>
                    <th scope="col"><i class='bx bxs-message-x'></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($q_s_show as $data) { ?>
                    <tr>
                        <td> <?= $data['name'] ?></td>
                        <td> <?= $data['title'] ?></td>
                        <td><a href="/instant/admin-panel/dip_with_instractor/add.php?delete=<?= $data['id'] ?>"><i class='bx bxs-message-x'></i></a></td>
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