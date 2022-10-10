<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$id=$_GET['show'];
echo"$id";
$s = "SELECT * FROM `tasks` where group_id=$id";
$s_q = mysqli_query($con, $s);
?>
<main id="main" class="main">
    <h3>Tasks Group</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                    <th scope="col">time</th>
                   
                    <th scope="col"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['title'] ?></td>
                        <td><?= $data['content'] ?></td>
                        <td>create at <?= $data['created_at'] ?> - deadline<?= $data['deadline'] ?></td>
                        
                        <td><a href="/instant/admin-panel/task_rate/add.php?id=<?= $data['id'] ?>"><i class='bx bx-show'></i></i></a></td>
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