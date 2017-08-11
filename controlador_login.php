<?php

   session_start();

    function login( ){
        
        $usuario_existe = false;

        $login = $_POST['login']; 
        $senha = $_POST['senha'];

        $usuarios = file_get_contents('logins.json'); 
        $usuarios = json_decode($usuarios, true); 

        foreach ($usuarios as $usuario){ 

            if ($login == $usuario['login'] && $senha == $usuario['senha']) {
                $usuario_existe = true;
                $_SESSION['usuario_online'] = true;              

                header('Location: index.phtml'); 

            }

        }

        if ($usuario_existe == false ){
            header('Location: login.php');

        }
    }

   
    login();


    // if($_GET['acao'] == 'login'){
    //     login();
    

    // if($_GET['acao'] == 'sair'){
    //     logout();
    // }