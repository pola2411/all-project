<?php
include('../shared/head.php');
include('../shared/nav.php');
include('../shared/aside.php');
include('../general/connection.php');
include('../general/function.php');
$id=$_GET['id'];

$s = "SELECT task_rate.id,task_rate.assignment,task_rate.rate,student.first_name,student.last_name FROM `task_rate` JOIN student on task_rate.student_id=student.id  
WHERE task_rate.task_id=$id";
$s_q = mysqli_query($con, $s);

if(isset($_POST['send'])){
    $task_id=$_POST['send'];
    $rate=$_POST['rate'];
    $u="UPDATE `task_rate` SET `rate`='$rate' WHERE id=$task_id";
    $q_u=mysqli_query($con,$u);
    go("/task_rate/add.php?id=$id");

}
?>
<main id="main" class="main">
    <h3>Tasks Group</h3>
    <hr>
    <div class="container col-md-8">
        <table class="table"style="margin-left:  -15px;">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">assignment</th>
                    <th scope="col">rate</th>
                    <th colspan="2" scope="col"></th>
                   
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($s_q as $data) { ?>
                    <tr>
                        <td><?= $data['first_name'] ?> <?= $data['last_name'] ?></td>
                        <td ><a  href="<?= $data['assignment'] ?>">link task</a> </td>
                        <td><?= $data['rate'] ?></td>
                        <form action="" method="POST">
                            <td colspan="2">
                        <select name="rate" id="" >
                        <option value="">rate</option>
                            <option value="A+">A+</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>


                        </select>
                        <button name="send" value="<?= $data['id'] ?>" class="btn btn-info">add</button>
                        </td>

                        </form>
                        
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