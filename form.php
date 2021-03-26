<?php

function valid(array $post): array
{
    $validate = [
        'error' => false,
        'success' => false,
        'messages' => [],
    ];



    if (!empty($post['name']) && !empty($post['surname']) && !empty($post['login']) && !empty($post['password'])) {
        $name = trim($post['name']); 
        $surname = trim($post['surname']);
        $login = trim($post['login']);
        $password = trim($post['password']);

        $constrains = [
            'name' => preg_match("/^[а-яА-Я ]*$/", $name),
            'surname' => preg_match("/^[а-яА-Я ]*$/", $surname),
            'login' => 7,
            'password' => 15 
        ];


        $validateForm = valigData($surname, $name, $login, $password,  $constrains);

        if (!$validateForm['name']) {
            $validate['error'] = true;
            array_push($validate['messages'],
                "<span class='er-nm'>"."Имя {$name} введено неккоректно"."</span>");
        }

        if (!$validateForm['surname']) {
            $validate['error'] = true;
            array_push($validate['messages'],
                "<span class='er-nm'>"."Фамилия {$surname} введена неккоректно"."</span>");

        if (!$validateForm['login']) {
            $validate['error'] = true;
            array_push($validate['messages'],
                "Логин должен содержать не меннее чем {$constrains['login']} символов");
        }

        if (!$validateForm['password']) {
            $validate['error'] = true;
            array_push($validate['messages'],
                "Пароль должен содержать не менее чем {$constrains['password']} символов");
        }

        }
        if (!$validate['error']){
            $validate['success'] = true;
            array_push($validate['messages'],
            "Ваше имя:{$name}",
            "Ваша фамилия:{$surname}",
            "Ваш логин:{$login}",
            "Ваш пароль:{$password}"
        );
        }
        return $validate;
    }
    return $validate;

}


function valigData(string $name,string $surname, string $login, string $password,array $constrains): array{

    $validateForm = [
        'name' => true,
        'surname' => true,
        'login' => true,
        'password' => true,

    ];

    
    if (!preg_match('/^[а-яё ]++$/ui',$name)) {
        $validateForm['name'] = false;
    }

    if (!preg_match('/^[а-яё ]++$/ui',$surname)) {
        $validateForm['surname'] = false;
    }

    if (strlen($login) < $constrains['login']) {
        $validateForm['login'] = false;
    }

    if (strlen($password) < $constrains['password']) {
        $validateForm['password'] = false;
    }


    return $validateForm;

}
