<?php
include "./shared/head.php";
include "./general/connection.php";
$s_a = "SELECT * FROM `academy_year`";
$q_s_a = mysqli_query($con, $s_a);
/* sign up */
$errors = [];
if (isset($_POST['sign_up'])) {
    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $new_password = sha1($password);
    $age = strip_tags($_POST['age']);
    $phone = strip_tags($_POST['phone']);
    $address = strip_tags($_POST['address']);
    $year_id = strip_tags($_POST['year_id']);
    $gender = strip_tags($_POST['gender']);

    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];

    if (trim($first_name) == "") {
        $errors[] = "please enter first_name";
    }
    if (trim($last_name) == "") {
        $errors[] = "please enter last_name";
    }
    if (trim($email) == "") {
        $errors[] = "please enter email";
    }
    if (trim($password) == "") {
        $errors[] = "please enter password";
    }
    if (trim($age) == "") {
        $errors[] = "please enter age";
    }
    if (trim($phone) == "") {
        $errors[] = "please enter phone";
    }
    if (trim($address) == "") {
        $errors[] = "please enter address";
    }
    if (trim($year_id) == "") {
        $errors[] = "please enter year_id";
    }
    if (($size / 1024) / 1024 > 1) {
        $errors[] = "you must enter img less than 1:M";
    }
    if (($type == "image/jpeg") || ($type == "image/png") || ($type == "image/jpg")) {
    } else {
        $errors[] = "you must enter img type png jpg jpeg ";
    }
    if (empty($errors)) {
        $location = "./upload/$image_name";
        move_uploaded_file($tmp_name, $location);
        $i = "INSERT INTO `student`(`id`, `first_name`, `last_name`, `email`, `password`, `age`, `phone`, `address`, `image`, `years_id`, `gender`) VALUES (null,'$first_name','$last_name','$email','$new_password',$age,'$phone','$address','$image_name',$year_id,'$gender')";
        $q_i = mysqli_query($con, $i);
        if($q_i){
        echo "<script> window.location.replace('/instant/user/') </script>";
        }else{
           

        }
    }
}

if (isset($_POST['login'])) {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $new_password = sha1($password);
    $s = "SELECT * FROM `student` where email='$email' AND `password`='$new_password'";
    $q_s = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($q_s);
    $num = mysqli_num_rows($q_s);
    if ($num > 0) {
        $_SESSION['user'] = [
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "email" => $row['email'],
            "id" => $row['id'],
            "image" => $row['image'],
        ];
        echo "<script>
        window.location.replace('/instant/user/')
            </script>
            ";
    }
}

?>

<div class="container-fluid" id="container">
    <div class="forms">
        <div class="signin-signup">
            <form class="sign-in-form" method="POST">

                <h2> Sign in </h2>

                <div class="input1">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input1">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="password">
                </div>
                <button class="btn btn-info" name="login"> Login </button>
                <p class="social-text"> Or sign in with social platforms</p>
                <div class="social-madia">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                        </i>
                    </a>
                </div>

            </form>

            <form class="sign-up-form" method="POST" id="s" enctype="multipart/form-data">
                <h2> Sign Up </h2>
                <div class="input">
                    <input type="text" name="first_name" placeholder="First Name">
                    <input type="text" name="last_name" placeholder="Last Name">
                </div>
                <div class="input">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="password">
                </div>
                <div class="input">
                    <input type="number" name="age" placeholder="Age">
                    <input type="number" name="phone" placeholder="Phone">
                </div>
                <div class="input">
                    <input type="text" name="address" placeholder="Address">
                    <input type="file" name="image">
                </div>
                <div class="input">
                    <select name="year_id" id="" >
                        <option value=""> accedmy year</option>
                        <?php foreach ($q_s_a as $data) { ?>
                            <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                        <?php } ?>
                    </select>
                    <select name="gender" id="">
                        <option value="man">man</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <button class="btn btn-info" name="sign_up"> SIGN UP </button>
            </form>
        </div>
    </div>

    <div class="panels">

        <div class="panel left-panel">
            <div class="content-login">
                <h3>New here ? </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum nihil, expedita cum dolor maiores
                    voluptate facilis eaque suscipit </p>
                <button class="btn transparent" id="sign-up-btn">Sign up</button>
            </div>
            <img src="/instant/user/image/p1.png" class="image img-fluid" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content-login">
                <h3>One of us ? </h3>
                <p>aaaLorem ipsum dolor sit amet consectetur adipisicing elit. Eum nihil, expedita cum dolor maiores
                    voluptate facilis eaque suscipit </p>
                <button class="btn transparent" id="sign-in-btn">Sign in</button>
            </div>
            <img src="/instant/user/image/p2.png" class="image img-fluid" alt="">
        </div>
    </div>

</div>
<script>
    let sign_in_btn = document.getElementById("sign-in-btn");
    let signup_btn = document.getElementById("sign-up-btn");
    let container = document.getElementById("container");
    signup_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
    });
    sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
    });
</script>
<?php
include "./shared/script.php"
?>