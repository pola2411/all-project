<?php
function go($path)
{
    echo "<script> window.location.replace('/instant/user/$path') </script>
";
}
function auth()
{
    if (isset($_SESSION['user']['email'])) {
    } else {
        go("/login.php");
    }
}
auth();