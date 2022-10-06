<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s = "SELECT * FROM `instractor`";
$s_q = mysqli_query($con, $s);
$sg = "SELECT groups.id,groups.status,groups.days ,track.title FROM `groups`JOIN diplomas on groups.diploma_id=diplomas.id JOIN track ON diplomas.track_id=track.id;";
$s_g = mysqli_query($con, $sg);
$errors = [];
if (isset($_POST['send'])) {
    $instractor = $_POST['instractor'];
    $title = $_POST['title'];
    $group = $_POST['group'];
    $created_at = $_POST['date'];
    if (trim($instractor) == "") {
        $errors[] = "please enter instractor";
    }
    if (trim($title) == "") {
        $errors[] = "please enter title";
    }
    if (trim($group) == "") {
        $errors[] = "please enter group";
    }
    if (trim($created_at) == "") {
        $errors[] = "please enter date";
    }
    if (empty($errors)) {
        $i = "INSERT INTO `material`(`id`, `instractor_id`, `title`, `group_id`, `created_at`) VALUES (null,$instractor,'$title',$group,'$created_at')";
        $q_i = mysqli_query($con, $i);
        go("/material/list.php");
    }
}
?>
<main id="main" class="main">
    <h3>Material</h3>
    <hr>
    <div class="container col-10">
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
                        <label for="exampleInputEmail1">instractor</label>
                        <select class="form-control" name="instractor">
                            <?php foreach ($s_q as $data) { ?>
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">group</label>
                        <select class="form-control" name="group">
                            <?php foreach ($s_g as $data) { ?>
                                <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">created at</label>
                        <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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