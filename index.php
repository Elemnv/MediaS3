<?php require_once "form.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="/" method="post" class="flex-block">
    <span>Имя</span>
    <input type="text" name="firstName" value="">
    <span>Фамилия</span>
    <input type="text" name="lastName">
    <span>Логин</span>
    <input type="text" name="login">
    <span>Пароль</span>
    <input type="text" name="password">

    <button type="submit">ОТПРАВИТЬ</button>
</form>
<?php $validate = valid($_POST); ?>

<?php if (!empty($validate['error']) && $validate['error']){
    foreach( $validate['messages'] as $key) {
        echo '<p class="item-err">'. $key . '</p>';
    }

}

?>

<?php if (!empty($validate['success']) && $validate['success']){
    foreach( $validate['messages'] as $key  ) {
        echo  '<p class="item">'. $key . '</p>';
    }
}
?>

</body>
</html>
