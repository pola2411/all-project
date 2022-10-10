<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $s = "SELECT tasks.id AS tasks_id,tasks.title as tasks_title ,tasks.content,tasks.deadline,tasks.created_at,groups.status,groups.days,track.title as track_title,groups.id as group_id FROM `tasks` JOIN groups on tasks.group_id=groups.id JOIN diplomas on groups.diploma_id=diplomas.id JOIN track on diplomas.track_id=track.id WHERE  tasks.id=$id";
    $q_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s);
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $d = "DELETE FROM `tasks` WHERE id=$id";
    $qd = mysqli_query($con, $d);
    go("/tasks/list.php");
}
?>
<main id="main" class="main">
    <h3>Tasks</h3>
    <hr>
    <div class="container col-md-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Task : <?php echo "$row[tasks_title]" ?></h3>
                <h6 class="card-text">Diploma: <?php echo "$row[track_title]" ?></h6>
                <p class="card-text">Group: <?php echo "$row[group_id]" ?></p>
                <p class="card-text">days: <?php echo "$row[days]" ?></p>
                <p class="card-text">content: <?php echo "$row[content]" ?></p>
                <p class="card-text">status: <?php echo "$row[status]" ?> </p>
                <p class="card-text">deadline: <?php echo "$row[deadline]" ?></p>
                <p class="card-text">created_at: <?php echo "$row[created_at]" ?></p>
                <a href="/instant/admin-panel/tasks/update.php?update=<?php echo "$row[tasks_id]" ?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
                <a href="/instant/admin-panel/tasks/show.php?delete=<?php echo "$row[tasks_id]" ?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
                <a href="/instant/admin-panel/tasks/list.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>
            </div>
        </div>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>