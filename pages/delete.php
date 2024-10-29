<?
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `book` WHERE `id` = '$id'";
        $book = $connect->query($sql)->fetch(2);
    }
?>

<p>Удалить книгу "<?=$book['name']?>"?</p>

<a href="?page=delete&del&id=<?=$id?>">Да</a>
<a href="?page=book_once&id=<?=$id?>">Нет</a>

<?
    if(isset($_GET['del'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `book` WHERE `id` = '$id'";
        $book = $connect->query($sql);
    }
?>