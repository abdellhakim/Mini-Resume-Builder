<?php
session_start();
require_once 'Formulaire.php';
require_once 'File.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['etatcivil'] = $_POST;

    $file = new File('etat_civil.txt', 'w');
    $resumeData = $_SESSION['etatcivil'];
    $file->writeJson($resumeData);
}



$form = new Formulaire('POST', 'formation.php', 'etatcivil');

$form->createLabel('Number of Education: ');
$form->genericInput('', 'nbedu', 'text');

$form->createSubmitBtn('next');
