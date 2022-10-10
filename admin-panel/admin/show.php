<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `adminrole` WHERE adID = $id";
    $s = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($s);
}
?>
<main id="main" class="main">
    <h3>Admin</h3>
    <hr>
    <div class="container col-8">
        <div class="card">
            <div class="card-body">
                <img src="./upload/<?= $row['adimage'] ?>" alt="" class="card-img-top container w-100">
                <h3 class="card-title text-center">Name : <?= $row['adname'] ?></h3>
                <h6 class="card-text">Emali <?= $row['ademail'] ?></h6>
                <p class="card-text">Role <?= $row['roldec'] ?></p>
                <a href="/instant/admin-panel/admin/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>