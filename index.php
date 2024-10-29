<?
include('incl/connect.php');
include('incl/head.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page == 'registration'){
                include('pages/registration.php');
            }elseif($page == 'login'){
                include('pages/login.php');
            }elseif($page == 'home'){
                include('pages/home.php');
            }elseif($page == 'account'){
                include('pages/account.php');
            }elseif($page == 'add'){
                include('pages/add.php');
            }elseif($page == 'book_once'){
                include('pages/book_once.php');
            }elseif($page == 'update'){
                include('pages/update.php');
            }elseif($page == 'delete'){
                include('pages/delete.php');
            }
            else{
                include('pages/home.php');
            }
        }else{
            include('pages/home.php');
        }
    ?>
</body>
</html>