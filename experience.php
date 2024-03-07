<?php
session_start();
require_once 'Formulaire.php';
require_once 'File.php';

$nb=1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nb = (int)$_POST['nbexp'];
}


$form = new Formulaire('POST', 'hobbies.php', 'eperience');
$form->generichiddenInput('nbexp', $nb);

for ($i=1; $i<= $nb;$i++){
echo"<h1>experience $i</h1>";
    $form->createLabel('job title: ');
    $form->genericInput('Enter the job title', 'job_title'.$i, 'text');

    $form->createLabel('company: ');
    $form->genericInput('Enter your company', 'company'.$i, 'text');

    $form->createLabel('experience Year: ');
    $form->genericInput('Enter your experience years', 'experience_years'.$i, 'text');
}
$form->createSubmitBtn('next');
