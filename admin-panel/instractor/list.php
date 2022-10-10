<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

$s = "SELECT * FROM `instractor`";
$s_q = mysqli_query($con, $s);
?>
<main id="main" class="main">
    <h3>Instractor</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><a href="/instant/admin-panel/instractor/show.php?show=<?= $data['id'] ?>"><i class='bx bx-show'></i></i></a></td>
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