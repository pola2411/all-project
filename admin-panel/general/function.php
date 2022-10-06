<?php
function go($path){
echo "<script>
window.location.replace('/instant/admin-panel/$path')
</script>
";
}

function auth(){
    if((isset($_SESSION['admin'])) || (isset($_SESSION['instractor']))){
    }else{
        go("login.php");
    }
}
auth();
?>