<?php
session_start();
require_once 'Formulaire.php';
require_once 'File.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = new File('experience.txt', 'w');

    $resumeData = [];

    $_SESSION['nbexp'] = (int)$_POST['nbexp'];

    for ($i=1; $i <= $_SESSION['nbexp']; $i++){
        $_SESSION['job_title'.$i] = $_POST['job_title'.$i];
        $_SESSION['company'.$i] = $_POST['company'.$i];
        $_SESSION['experience_years'.$i] = $_POST['experience_years'.$i];

        $resumeData["experience$i"]=[
                                    $_SESSION['job_title'.$i],
                                    $_SESSION['company'.$i],
                                    $_SESSION['experience_years'.$i]
        ];
    }
    $file->writeJson($resumeData);
} 

$form = new Formulaire('POST', 'traitment.php', 'hobbies');

$form->createLabel('Hobbies: ');
$form->createTextArea1('hobbies','');

$form->createSubmitBtn('next');
