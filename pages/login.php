<?php
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_r = $_POST['password_r'];

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Вы не зарегистированы </p>',
        '<p class="error">Неверный логин или пароль</p>'
    ];
}
?>


<div class="login">
    <form action="" class="form" method="POST" name="login">
        <div class="form_div">
            <label for="email"> Введите E-mail* </label>
            <input type="text" name="email" placeholder="E-mail">
        </div>
        <? if (isset($_POST['login'])) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $res = $connect->query($sql)->fetch(2);
            if (empty($email)) {
                echo $errors[0];
                $flag = 'false';
            } elseif (!$res) {
                echo $errors[1];
                $flag = 'false';
            }
        } ?>
        <div class="form_div">
            <label for="password">Введите пароль* </label>
            <input type="password" name="password" placeholder="Пароль">
        </div>
        <? if (isset($_POST['login'])) {
            if (empty($password)) {
                echo $errors[0];
                $flag = 'false';
            } elseif (!password_verify($password, $res['password'])) {
                echo $errors[2];
                $flag = 'false';
            }
        } ?>
        <input type="submit" value="Войти" name="login">
    </form>
    <? if (isset($_POST['login'])) {
        if ($flag != false) {
            $_SESSION['USER']=$res['id'];
            echo '<script> document.location.href="?page=home"</script>';

        }
    }
    ?>
</div>