<?
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `book` WHERE `id` = '$id'";
    $book = $connect->query($sql)->fetch(2);
}
?>

<img src="<?= $book['img'] ?>" alt="">
<p>Название: <?= $book['name'] ?></p>
<p>Автор: <?= $book['author'] ?></p>
<a href="?page=update&id=<?= $id ?>">Редактировать</a>
<a href="?page=delete&id=<?= $id ?>">Удалить</a>
<hr>