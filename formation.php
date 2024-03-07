<?php
session_start();
require_once 'Formulaire.php';
require_once 'File.php';

$nb=1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nb = (int)$_POST['nbedu'];
}


$form = new Formulaire('POST', 'getnbexperience.php', 'formation');
$form->generichiddenInput('nbedu',$nb);

for ($i=1; $i<= $nb;$i++){
echo"<h1>Education $i</h1>";
    $form->createLabel('School/University: ');
    $form->genericInput('Enter the name of your school/university', 'school'.$i, 'text');

    $form->createLabel('Degree: ');
    $form->genericInput('Enter your degree', 'degree'.$i, 'text');

    $form->createLabel('Graduation Year: ');
    $form->genericInput('Enter your graduation year', 'graduation_year'.$i, 'text');
}
$form->createSubmitBtn('next');
