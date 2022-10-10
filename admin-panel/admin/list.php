<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$s = "SELECT * FROM `admin`";
$s_q = mysqli_query($con, $s);
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $s = "SELECT `image` from `admin`WHERE id=$id ";
    $q_s_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s_s);
    $d = "DELETE FROM `admin` WHERE id=$id";
    $qd = mysqli_query($con, $d);
    unlink("./upload/$row[image]");
    go("/admin/list.php");
}
?>
<main id="main" class="main">
    <h3>Admin</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">show more</th>
                    <th scope="col">update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><a href="/instant/admin-panel/admin/show.php?show=<?= $data['id'] ?>"><i class='bx bx-show text-danger '></i></i></a></td>
                        <td><a href="/instant/admin-panel/admin/update.php?edit=<?= $data['id'] ?>" class='btn btn-warning '>edit</a></td>
                        <td><a href="/instant/admin-panel/admin/list.php?delete=<?= $data['id'] ?>" class='btn btn-danger '>delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>