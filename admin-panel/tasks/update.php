<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s = "SELECT groups.id,track.title FROM `groups` JOIN diplomas on groups.diploma_id =diplomas.id JOIN track on diplomas.track_id=track.id";
$s_q = mysqli_query($con, $s);
$errors = [];
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $s_va = "SELECT * FROM `tasks` where id=$id ";
    $q_s_va = mysqli_query($con, $s_va);
    $row = mysqli_fetch_assoc($q_s_va);
    if (isset($_POST['send'])) {
        $title = strip_tags($_POST['title']);
        $content = strip_tags($_POST['content']);
        $deadline = strip_tags($_POST['deadline']);
        $group_id = $_POST['group_id'];
        if (trim($title) == "") {
            $errors[] = "please enter title";
        }
        if (trim($content) == "") {
            $errors[] = "please enter content";
        }
        if (trim($deadline) == "") {
            $errors[] = "please enter deadline";
        }
        if (empty($errors)) {
            $i = "UPDATE `tasks` SET `title`='$title',`content`='$content',`group_id`='$group_id',`deadline`='$deadline' WHERE id=$id";
            $q_i = mysqli_query($con, $i);
            go("/tasks/list.php");
        }
    }
}
?>
<main id="main" class="main">
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
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" value="<?= $row['title'] ?>" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class=" form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <input type="text" name="content" value="<?= $row['content'] ?>" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class=" form-group">
                        <label for="exampleInputEmail1">deadline</label>
                        <input type="date" name="deadline" value="<?= $row['deadline'] ?>" class="form-control"
                            id="exampleInputEmail1" ">
                    </div>
                    <div class=" form-group">
                        <label for="exampleInputEmail1">group </label>
                        <select class="form-control" name="group_id">
                            <?php foreach ($s_q as $data) { ?>
                            <option value="<?= $data['id'] ?>" <?php if ($data['id'] == $row['group_id']) {
                                                                        echo "selected";
                                                                    } ?>><?= $data['title'] ?></option>
                            <?php } ?>
                        </select>
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