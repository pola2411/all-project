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
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * From `material` where id=$id";
    $s = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($s);
}
if (isset($_POST['send'])) {
    $instractor = $_POST['instractor'];
    $title =strip_tags( $_POST['title']);
    $content =strip_tags( $_POST['content']);
    $link =strip_tags( $_POST['link']);
    $group = $_POST['group'];
    $created_at = $_POST['date'];
    if (trim($instractor) == "") {
        $errors[] = "please enter instractor";
    }

    if (trim($title) == "") {
        $errors[] = "please enter title";
    }
    if (trim($content) == "") {
        $errors[] = "please enter content";
    }
    if (trim($link) == "") {
        $errors[] = "please enter link";
    }
    if (trim($group) == "") {
        $errors[] = "please enter group";
    }
    if (trim($created_at) == "") {
        $errors[] = "please enter date";
    }
    if (empty($errors)) {
        $i = "UPDATE `material` SET `instractor_id`='$instractor',`title`='$title',`group_id`='$group',`created_at`='$created_at',`content`='$content',`link`='$link' WHERE id=$id ";
        $q_i = mysqli_query($con, $i);
        go("/material/list.php");
    }
}
?>
<main id="main" class="main">
    <h3>Material</h3>
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
                        <label for="exampleInputEmail1">instractor</label>
                        <select class="form-control" name="instractor">
                            <?php foreach ($s_q as $data) { ?>
                                <option value="<?= $data['id'] ?>" <?php if ($data['id'] == $row['id']) {
                                                                        echo "selected";
                                                                    } ?>>
                                    <?= $data['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" name="title" value="<?= $row['title'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" name="content" value="<?= $row['content'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">link</label>
                        <input type="text" name="link" value="<?= $row['link'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                        <input type="date" name="date" value="<?= $row['created_at'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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