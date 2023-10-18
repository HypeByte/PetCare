<?php
require_once 'private/init.php';
require_once 'Questionnaire/Question.php';
require_once 'Questionnaire/Form.php';
require_once 'Questionnaire/RadioCheck.php';
require_once 'Questionnaire/TextBox.php';
require_once 'Questionnaire/Select.php';
require_once 'Questionnaire/Calendar.php';
require_once 'Questionnaire/Questionnaire.php';
require_once 'Questionnaire/Node.php';
require_once 'Questionnaire/DxTx.php';
use Questionnaire\{Questionnaire, Question, Form, RadioCheck, TextBox, Select, Calendar, Node, DxTx};

global $petcare_db;

$diagnosis = new Questionnaire('diagnosis',

    [

        new Form('test',
            [
                new RadioCheck('test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
                new TextBox('test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
                new Select('test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
                new Calendar('test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test')
            ]
        )

    ],


    'diagnosis.php',
    $petcare_db,
    'diagnosis');

?>

<!DOCTYPE html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="private/assets/css/questionnaire.css" rel="stylesheet" />

    <style>
        body {
            background-image: url('private/assets/2315.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }


        #main {
            width: 50%;
        }

        @media (max-width: 765px) {
            #main {
                width: 100% !important;
            }

        }

    </style>

</head>

<body>

    <div class="container-responsive mt-5 ps-5 pe-5 pb-5" id="main" style=" margin: auto; border-radius: 20px; background-color: navajowhite">

        <form action="survey.php" method="POST" class="mt-3">
            <div class="text-dark h2 pt-5 text-center">PetCare Survey</div>
            <?php

                $diagnosis->render();

            ?>

        </form>

    </div>

</body>

</html>