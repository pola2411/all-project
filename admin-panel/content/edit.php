<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `content` WHERE id = $id";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    if (isset($_POST['update'])) {
        $desc = $_POST['content'];
        $update = "UPDATE `content` SET `description`='$desc' WHERE id =$id";
        mysqli_query($con, $update);
        go("/content/add.php");
    }
}
?>
<main id="main" class="main">
    <h3>Content</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Track</label>
                        <select disabled name="track" class="form-control">
                            <?php
                            $select = "SELECT * FROM `track`";
                            $result = mysqli_query($con, $select);
                            foreach ($result as $data) {
                            ?>
                                <option value=" <?= $data['id'] ?>"><?= $data['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <input type="text" name="content" value="<?= $row['description'] ?>" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mt-3">Update Content</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>