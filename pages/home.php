<header>
    <a href="?page=registration">Зарегистрироваться</a>
    <a href="?page=login">Войти</a>
    <a href="?page=add">Добавление</a>

</header>
<?
if (isset($_SESSION['USER'])) { ?>
    <a href="?exit">Выйти</a>
<? }
?>

<br>
<hr>

<!-- Категории -->
<div class="categories">
    <a href="?page=home">Все новости</a>
    <?
    $sql = "SELECT * FROM `category`";
    $res_cat = $connect->query($sql);
    foreach ($res_cat as $category) { ?>
        <a href="?page=home&category=<?= $category['id'] ?>"><?= $category['name'] ?></a>
    <? } ?> 
</div>


<form action="" method="POST" class="search" name="search">
    <input type="text" name="name" placeholder="Поиск..." value="<? if (isset($_POST['search']))
        echo $_POST['name'] ?>">
        <input type="submit" value="Поиск" name="search">
    </form>


<?
    $sql = "SELECT * FROM `book`";
    $dopSql = "";
    if (isset($_POST['search'])) {
        $text = $_POST['name'];
        $dopSql .= "WHERE `name` LIKE '%" . $text . "%'";
    }

    if (isset($_GET['category'])) {
        $id_category = $_GET['category'];
        $dopSql .= (empty($dopSql) ? "WHERE " : "AND ") . "id_category = $id_category";
    }
    ?>

<!-- $res = $connect->query($sql); -->


<!-- Поиск -->


<div class="catalog">
    <?
    $sql = "SELECT * FROM `book` $dopSql";
    $res = $connect->query($sql);
    $result = $res->rowCount();
    if ($result == 0) { ?>
        <p>По вашему запросу ничего не найдено!</p>
    <? }

    // $res = $connect->query($sql);
    foreach ($res as $book) { ?>
        <div class="book">
            <? $id = $book['id'] ?>
            <img src="<?= $book['img'] ?>" alt="">
            <p>Название: <?= $book['name'] ?></p>
            <p>Автор: <?= $book['author'] ?></p>
            <?
            $cat_id = $book['id_category'];
            $sql = "SELECT * FROM `category` WHERE `id`='$cat_id'";
            $res_cat = $connect->query($sql)->fetch(2);
            ?>
            <p>Категория: <?= $res_cat['name'] ?></p>
            <a href="?page=book_once&id=<?= $id ?>">Подробнее</a>
        </div>
    <? }
    ?>
</div>