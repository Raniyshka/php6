<?
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    // $img = $_FILES['img']['name'];
    $img = 'assets/img/' . time() . $_FILES['img']['name'];

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
    ];
}
?>

<form action="" method="POST" name="add" enctype="multipart/form-data" class="add">
    <input type="text" name="name" placeholder="Название">
    <? if (isset($_POST['add'])) {
        if (empty($name)) {
            echo $errors[0];
            $flag = 'false';
        }
    } ?>
    <input type="text" name="author" placeholder="Автор">
    <? if (isset($_POST['add'])) {
        if (empty($author)) {
            echo $errors[0];
            $flag = 'false';
        }
    } ?>
    <textarea name="description" id="">Описание</textarea>
    <? if (isset($_POST['add'])) {
        if (empty($description)) {
            echo $errors[0];
            $flag = 'false';
        }
    } ?>
    <input type="file" name="img">
    <? if (isset($_POST['add'])) {
        if ($_FILES['img']['name'] == null) {
            echo $errors[0];
            $flag = 'false';
        }
    } ?>

    <select name="" id="">
        <option value="1">Комедия</option>
        <option value="2">Приключения</option>
    </select>

    <input type="submit" value="Создать" name="add">
</form>

<?
if (isset($_POST['add'])) {
    if ($flag != 'false') {
        move_uploaded_file($_FILES['img']['tmp_name'], $img);
        $sql = "INSERT INTO `book`(`name`, `author`, `description`, `img`) VALUES ('$name','$author','$description','$img')";
        $res = $connect->query($sql);
    }
}
?>