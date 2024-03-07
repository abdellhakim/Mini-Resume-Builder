<?php
session_start();
require_once 'Formulaire.php';
require_once 'File.php';

$text_area_content = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['hobbies'] = $_POST;

    $file = new File('hobbies.txt', 'w');

    $resumeData = $_SESSION['hobbies'];
    $file->writeJson($resumeData);

    $file = new File('resume.txt', 'w');

    $resumeData = $_SESSION;
    $file->writeJson($resumeData);
    unset($file);
} else {
    if (isset($_GET['x'])) {
        switch ($_GET['x']) {
            case 'etat_civil':
                $file = new File('etat_civil.txt', 'r');
                $file_content = implode("|", $file->readJson());
                $text_area_content = $file_content;
                break;
            case 'formation':
                $file = new File('formation.txt', 'r');
                $file_content = $file->read();
                $text_area_content = $file_content;
                break;
            case 'experience':
                $file = new File('experience.txt', 'r');
                $file_content = $file->read();
                $text_area_content = $file_content;
                break;
            case 'hobbies':
                $file = new File('hobbies.txt', 'r');
                $file_content = implode("|", $file->readJson());
                $text_area_content = $file_content;
                break;
        }
    }
}

echo '<a href="traitment.php?x=etat_civil">Etat civil</a><br>';
echo '<a href="traitment.php?x=formation">Formation</a><br>';
echo '<a href="traitment.php?x=experience">Experience</a><br>';
echo '<a href="traitment.php?x=hobbies">Hobbies</a><br>';

$form = new Formulaire('', '', '');
$form->createTextArea('', $text_area_content);


$cookieName = 'visit_count_cookie';
$visitCountCookie = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : 0;

echo "Number of visits (from cookie): $visitCountCookie";
echo '<br> <a href="logout.php">Logout</a><br>';
