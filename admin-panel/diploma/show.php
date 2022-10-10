<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT diplomas.id id , diplomas.content_id content , diplomas.price price , diplomas.start_time 'date' ,diplomas.period 'period' , diplomas.dip_image 'image' , track.title title FROM `diplomas` INNER JOIN track on diplomas.track_id = track.id and diplomas.id = $id";
    $result = mysqli_query($con, $select);
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $content = $row['content'];
    $price = $row['price'];
    $date = $row['date'];
    $period = $row['period'];
    $image = $row['image'];
} else {
    go('diploma/list.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $select = "SELECT * from diplomas where id = $id";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    $image = $row['dip_image'];
    var_dump($image);
    unlink($image);
    $delete = "DELETE FROM `diplomas` WHERE id=$id";
    mysqli_query($con, $delete);
    go("diploma/list.php");
}
?>
<main id="main" class="main">
    <h3>Diploma</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <img src="../images/<?= $image ?>" class="card-img-top container w-100">
            <div class="card-body">
                <h4 class="card-title"><?= $title ?></h4>
                <p class="card-text">Content : <?= $content ?></p>
                <p class="card-text">Price : <?= $price ?></p>
                <p class="card-text">Start At : <?= $date ?></p>
                <p class="card-text">Period : <?= $period ?></p>
                <a href="/instant/admin-panel/diploma/show.php?delete=<?= $id ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                <a href="/instant/admin-panel/diploma/edit.php?edit=<?= $id ?>" class=" btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                <a href="/instant/admin-panel/diploma/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
            </div>
        </div>
    </div>
</main>

<?php
include('../shared/footer.php');
include('../shared/script.php');
?>