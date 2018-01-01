<?php

session_start();

if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3){
        echo "Seu acesso está bloqueado!";
    }else{
 
    if($email == 'teste@hotmail.com' && $senha == '123'){
        echo "ACESSO OK!";
    }else{
        if(!isset($_SESSION['login_tentativas'])){
            //tentatira de login
            $_SESSION['login_tentativas'] = 0;
        }
        //soma a quantidade de erro
        $_SESSION['login_tentativas']++;
        
        echo "Senha errada! Tentativas: " .$_SESSION['login_tentativas'];
    }
    }
    echo "<hr/>";
}
?>


<form method="POST">
    
    Email:<br/>
    <input type="email" name="email" /><br/><br/>
     
    Senha:<br/>
    <input type="senha" name="senha" /><br/><br/>
    
    <input type="submit" value="Enviar" />
    
</form>