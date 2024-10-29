<?
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `book` WHERE `id` = '$id'";
    $book = $connect->query($sql)->fetch(2);
    $old_img = $book['img'];
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    if($_FILES['img']['name'] == null){
        $img = $old_img;
    }else{
        $img = 'assets/img/' . time() . $_FILES['img']['name'];
    }
    // $img = $_FILES['img']['name'];
    

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
    ];
}
?>

<form action="" method="POST" name="update" enctype="multipart/form-data">
    <input type="text" name="name" value="<?=$book['name']?>">
    <? if (isset($_POST['update'])) {
            if (empty($name)) {
                echo $errors[0];
                $flag = 'false';
            }
        } ?>
    <input type="text" name="author" value="<?=$book['author']?>">
    <? if (isset($_POST['update'])) {
            if (empty($author)) {
                echo $errors[0];
                $flag = 'false';
            }
        } ?>
    <textarea name="description" id=""><?=$book['description']?></textarea>
    <? if (isset($_POST['update'])) {
            if (empty($description)) {
                echo $errors[0];
                $flag = 'false';
            }
        } ?>
    <input type="file" name="img">
    <input type="submit" value="Редактировать" name="update">
</form>

<?
if (isset($_POST['update'])) {
    if ($flag != 'false') {
        move_uploaded_file($_FILES['img']['tmp_name'], $img);
        $sql = "UPDATE `book` SET `name`='$name',`author`='$author',`description`='$description',`img`='$img' WHERE `id` = '$id'";
        $res = $connect->query($sql);
    }
}
?>