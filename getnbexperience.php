<?php
session_start();

require_once 'Formulaire.php';
require_once 'File.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = new File('formation.txt', 'w');

    $resumeData = [];

    $_SESSION['nbedu'] = (int)$_POST['nbedu'];

    for ($i = 1; $i <= $_SESSION['nbedu']; $i++) {
        $_SESSION['school' . $i] = $_POST['school' . $i];
        $_SESSION['degree' . $i] = $_POST['degree' . $i];
        $_SESSION['graduation_year' . $i] = $_POST['graduation_year' . $i];

        $resumeData["education$i"] = [
            $_SESSION['school' . $i],
            $_SESSION['degree' . $i],
            $_SESSION['graduation_year' . $i]
        ];
    }
    $file->writeJson($resumeData);
}



$form = new Formulaire('POST', 'experience.php', 'etatcivil');

$form->createLabel('Number of Experience: ');
$form->genericInput('', 'nbexp', 'text');

$form->createSubmitBtn('next');
