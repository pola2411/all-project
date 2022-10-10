<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

?>
<main id="main" class="main">
    <h3>Diploma</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">show</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "SELECT `diplomas`.id id , `track`.`title` title FROM `diplomas` INNER JOIN `track` on `diplomas`.`track_id` = `track`.`id` ORDER BY id ASC";
                $result = mysqli_query($con, $select);
                foreach ($result as $data) {
                    $id = $data['id'];
                ?>
                    <tr>
                        <th scope="row"><?= $id ?></th>
                        <td><?= $data['title'] ?></td>
                        <td><a href="/instant/admin-panel/diploma/show.php?id=<?= $id ?>"><i class='bx bx-show'></i></a></td>
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