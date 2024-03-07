<?php
session_start();
require_once 'Formulaire.php';

$form = new Formulaire('POST', 'getnbformation.php', 'etatcivil');

$form->createLabel('Nom: ');
$form->genericInput('Enter your last name', 'nom', 'text');

$form->createLabel('Prenom: ');
$form->genericInput('Enter your first name', 'prenom', 'text');

$form->createLabel('Tel: ');
$form->genericInput('Enter your phone number', 'tel', 'text');

$form->createLabel('Email: ');
$form->genericInput('example@ex.com', 'email', 'email');

$form->createSubmitBtn('next');
