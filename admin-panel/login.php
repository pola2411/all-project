<?php
include('./shared/head.php');

if(isset($_SESSION['admin']) || isset($_SESSION['instractor'])){
    echo "<script>
    window.location.replace('/instant/admin-panel/index.php')
    </script>
    ";
}
?>
<main style="height:100vh; overflow:hidden;" class="">
    <div class="container col-lg-5">
        <div class="card mt-5">
            <div class="card-body">
                <form method="POST" action="/instant/admin-panel/general/check.php" >
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="radio" name="user" value="admin"> Admin
                        <input type="radio" name="user" value="instractor"> Instrector
                    </div>
                    <button type="submit" name="login" class="btn btn-info mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include('./shared/script.php');
?>