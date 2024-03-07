<?php 
    session_start();
    require_once 'Formulaire.php';
    $form = new Formulaire('POST', 'checklog.php', 'formation');

    $form->createLabel('Username: ');
    $form->genericInput('', 'user', 'text');

    $form->createLabel('Password: ');
    $form->genericInput('', 'pwd', 'text');

    $form->createSubmitBtn('login');

    

    




?>