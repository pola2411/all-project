<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$s = "SELECT groups.id,track.title,groups.status,groups.days FROM `groups` JOIN diplomas on groups.diploma_id =diplomas.id JOIN track on diplomas.track_id=track.id";
$s_q = mysqli_query($con, $s);
$errors = [];
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
        $i = "INSERT INTO `tasks`(`id`, `title`, `content`, `group_id`, `deadline`, `created_at`) VALUES (NULL,'$title','$content',$group_id,'$deadline',default)";
        $q_i = mysqli_query($con, $i);
        go("/tasks/list.php");
    }
}
?>
<main id="main" class="main">
    <h3>Tasks</h3>
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
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" ">
        </div>
        <div class=" form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <input type="text" name="content" class="form-control" id="exampleInputEmail1" ">
        </div>
        <div class=" form-group">
                        <label for="exampleInputEmail1">Deadline</label>
                        <input type="date" name="deadline" class="form-control" id="exampleInputEmail1" ">
        </div>
        <div class=" form-group">
                        <label for="exampleInputEmail1">Group </label>
                        <select class="form-control" name="group_id">
                            <?php foreach ($s_q as $data) { ?>
                                <option value="<?= $data['id'] ?>"><?= $data['title'] ?> (<?= $data['status'] ?>  <?= $data['days'] ?>)</option>
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