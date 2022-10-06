<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    // $s="SELECT * FROM `material`JOIN groups on  material.group_id=groups.id JOIN instractor on material.instractor_id=instractor.id JOIN diplomas
    // ON groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id";
    $s = "SELECT * from `material` where id=$id";
    $q_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s);
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $d = "DELETE FROM `material` WHERE id=$id";
    $qd = mysqli_query($con, $d);
    go("/material/list.php");
}
?>
<main id="main" class="main">
    <h3>Material</h3>
    <hr>
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Title : <?php echo "$row[title]" ?></h3>
                <h6 class="card-text">instractor: <?php echo "$row[instractor_id]" ?></h6>
                <p class="card-text">Group: <?php echo "$row[group_id]" ?></p>
                <p class="card-text">created_at: <?php echo "$row[created_at]" ?></p>
                <a href="/instant/admin-panel/material/show.php?delete=<?php echo "$row[id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                <a href="/instant/admin-panel/material/update.php?update=<?php echo "$row[id]" ?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                <a href="/instant/admin-panel/material/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>