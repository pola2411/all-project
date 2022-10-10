<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $s = "SELECT instractor.id,instractor.name,instractor.email,instractor.phone,instractor.address,instractor.image,track.title FROM `instractor` JOIN track ON instractor.track_id=track.id WHERE  instractor.id=$id";
    $q_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s);
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $s = "SELECT `image` from `instractor`WHERE id=$id ";
    $q_s_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s_s);
    $d = "DELETE FROM `instractor` WHERE id=$id";
    $qd = mysqli_query($con, $d);
    unlink("./upload/$row[image]");
    go("/instractor/list.php");
}
?>
<main id="main" class="main">
    <h3>Instractor</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <div class="card-body">
                <img src="/instant/admin-panel/instractor/upload/<?php echo "$row[image]" ?>" alt="" class="card-img-top container w-100">
                <h3 class="card-title text-center">Name : <?= "$row[name]" ?></h3>
                <p class="card-text">Age: <?= $row['phone'] ?> </p>
                <p class="card-text">Address: <?= $row['address'] ?></p>
                <p class="card-text">Email: <?= $row['email'] ?></p>
                <p class="card-text">Role: <?= $row['title'] ?></p>
                <a href="/instant/admin-panel/instractor/show.php?delete=<?php echo "$row[id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                <a href="/instant/admin-panel/instractor/update.php?update=<?php echo "$row[id]" ?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                <a href="/instant/admin-panel/instractor/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>