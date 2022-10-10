<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');

?>
<main id="main" class="main">
<h3>Massage</h3>
  <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Open</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "SELECT * FROM massages ORDER BY send_at DESC";
                $result = mysqli_query($con, $select);
                $i=0;
                foreach ($result as $data) {
                    $i++;
                    $id = $data['id'];
                    $email = $data['email'];
                    $subject = $data['subject'];
                    $is_read = $data['is_read'];
                    if ($is_read == 0) :
                ?>
                        <tr style="background-color: #14776345;">
                            <th scope="row"><?= $i ?></th>
                            <td><?= $email ?></td>
                            <td><?= $subject ?></td>
                            <td><a href="/instant/admin-panel/massages/show.php?id=<?= $id ?>" class="btn btn-info">Open</a></td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $email ?></td>
                            <td><?= $subject ?></td>
                            <td><a href="/instant/admin-panel/massages/show.php?id=<?= $id ?>" class="btn btn-info">Open</a></td>
                        </tr>
                <?php
                    endif;
                } ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include('../shared/footer.php');
include('../shared/script.php');
?>