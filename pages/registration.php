<?php
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_r = $_POST['password_r'];

    $flag = 'true';
    $errors = [
        '<p class="error">Заполните поле ввода</p>',
        '<p class="error">Неверный формат почты</p>',
        '<p class="error">Вы уже зарегистированы </p>',
        '<p class="error">Пароль должен включать не менее 6 символов</p>',
        '<p class="error">Пароли не совпадают</p>'
    ];
}
?>


<div class="registration">
    <form action="" class="form" method="POST" name="reg">
        <div class="form_div">
            <label for="name">Введите имя*</label>
            <input type="text" name="name" placeholder="Имя">
        </div>
        <? if (isset($_POST['reg'])) {
            if (empty($name)) {
                echo $errors[0];
                $flag = 'false';
            }
        } ?>
        <div class="form_div">
            <label for="surname">Введите фамилию*</label>
            <input type="text" name="surname" placeholder="Фамилия">
        </div>
        <? if (isset($_POST['reg'])) {
            if (empty($surname)) {
                echo $errors[0];
                $flag = 'false';
            }
        } ?>
        <div class="form_div">
            <label for="email"> Введите E-mail* </label>
            <input type="text" name="email" placeholder="E-mail">
        </div>
        <? if (isset($_POST['reg'])) {
            if (empty($email)) {
                echo $errors[0];
                $flag = 'false';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo $errors[1];
                $flag = 'false';
            } else {
                $sql = "SELECT * FROM users WHERE email='$email'";
                $res = $connect->query($sql)->fetchColumn();
                if ($res != 0) {
                    echo $errors[2];
                    $flag = 'false';
                }
            }
        } ?>
        <div class="form_div">
            <label for="password">Введите пароль* </label>
            <input type="password" name="password" placeholder="Пароль">
        </div>
        <? if (isset($_POST['reg'])) {
            if (empty($password)) {
                echo $errors[0];
                $flag = 'false';
            }
        } ?>
        <div class="form_div">
            <label for="password_r">Повторите пароль*</label>
            <input type="password" name="password_r" placeholder="Повторите пароль">
        </div>
        <? if (isset($_POST['reg'])) {
            if (empty($password_r)) {
                echo $errors[0];
                $flag = 'false';
            } elseif (strlen($password) < 6) {
                echo $errors[3];
                $flag = 'false';
            } elseif ($password != $password_r) {
                echo $errors[4];
                $flag = 'false';
            }
        } ?>
        <input type="submit" value="Зарегистрироваться" name="reg">
    </form>
    <? if (isset($_POST['reg'])) {
        if ($flag != 'false') {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(`name`, `surname`, `email`, `password`, `role`)
             VALUES ('$name','$surname','$email','$password','1')";
             var_dump($sql);
            $res = $connect->query($sql);
            echo '<script> document.location.href="?page=login"</script>';
        
        }
    }
    ?>
</div>