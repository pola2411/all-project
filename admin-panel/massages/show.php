<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM massages WHERE id = $id";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    $update = "UPDATE `massages` SET `is_read`='1' WHERE id = $id";
    mysqli_query($con, $update);
}
?>
<main id="main" class="main">
    <h3>Massage</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center"><?= $row['email'] ?></h3>
                <h6 class="card-text">Subject : <?= $row['subject'] ?></h6>
                <p class="card-text">Content : <?= $row['content'] ?></p>
                <p class="card-text">Sent At : <?= $row['send_at'] ?></p>
                <a href="/instant/admin-panel/massages/list.php" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>