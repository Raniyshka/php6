<?
session_start();
include('incl/connect.php');

if(isset($_SESSION['USER'])){
    $user_id = $_SESSION['USER'];
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $USER = $connect->query($sql)->fetch();
}

if(isset($_GET['exit'])){
    unset($_SESSION['USER']);
    echo '<script> document.location.href="?page=home"</script>';
}
?>