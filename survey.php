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

require_login();

require __DIR__ . '/vendor/autoload.php';
use Orhanerday\OpenAi\OpenAi;

$key = "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";


$open_ai = new OpenAi($key);

$diagnosis = new Questionnaire('diagnosis',

    [

        new Form('petName',
            [
                    new TextBox("What is your pet's name?", "1", "TEXTBOX_DEFAULT")
            ],
            [
                    new Node('petType', false)
            ]
        ),

        new Form( 'petType',
            [
                    new RadioCheck("Which of the following is your pet?", "1", "A Dog,A Cat", "RADIO_DEFAULT")
            ],
            [
                    new Node('cat-sex', "A Cat"),
                    new Node('dog-sex', "A Dog")
            ]


        ),

        new Form( 'cat-sex',
            [
                    new RadioCheck("What sex is your cat?", "1", "Male,Female", "RADIO_DEFAULT")
            ],
            [
                    new Node("cat-itchy", false)
            ]
        ),

        //Cat Track
        new Form('cat-itchy',
            [
                    new RadioCheck("Has your cat been more itchier than usual?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node('cat-bugbites', "Yes"),
                    new Node('cat-weightloss', "No")
            ]
        ),

        new Form( 'cat-bugbites',
            [
                    new RadioCheck("Does your cat have any bug bites?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node('cat-hairloss', "Yes"),
                    new Node('cat-weightloss', "No")
            ]
        ),

        new Form( 'cat-hairloss',
            [
                    new RadioCheck("Has your cat been losing more hair than normally", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node(new DxTx("Flea Allergic Dermatitis", "N/A"), "Yes"),
                    new Node('cat-weightloss', "No")
            ]
        ),

        new Form( 'cat-weightloss',
            [
                    new RadioCheck("Has your cat recently experienced any weight loss?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node("cat-highbp", "Yes"),
                    new Node("cat-frequenturination", "No")
            ]
        ),

        new Form( 'cat-highbp',
            [
                    new RadioCheck("Has your cat been experiencing high blood pressure?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node("cat-hr", "Yes"),
                    new Node("cat-frequenturination", "No")
            ]
        ),

        new Form( 'cat-hr',
            [
                    new RadioCheck("Has your cat been experiencing a high heart rate?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node(new DxTx("Hyperthyroidism", "N/A"), "Yes"),
                    new Node("cat-frequenturination", "No")
            ]
        ),

        new Form( 'cat-frequenturination',
            [
                    new RadioCheck("Has your cat been urinating more frequently than usual?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node("cat-urinationblood", "Yes"),
                    new Node("cat-nasal", "No")
            ]
        ),

        new Form( 'cat-urinationblood',
            [
                    new RadioCheck("Has your cat been urinating blood?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node(new DxTx("Urinary Tract Infection", "N/A"), "Yes"),
                    new Node("cat-frequentthirst", "No")
            ]
        ),

        new Form( 'cat-frequentthirst',
            [
                    new RadioCheck("Has your cat been drinking more water than usual?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node("cat-obese", "Yes"),
                    new Node("cat-vomiting", "No")
            ]
        ),

        new Form( 'cat-obese',
            [
                    new RadioCheck("Is your cat obese?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node(new DxTx("Diabetes", "N/A"), "Yes"),
                    new Node(new DxTx("Kidney Disease", "N/A"), "No")
            ]
        ),

        new Form(
                'cat-vomiting',
                [
                        new RadioCheck("Has your cat been vomiting?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node("cat-hunting", "Yes"),
                        new Node("cat-nasal", "No")
                ]
        ),

        new Form(
                'cat-hunting',
                [
                        new RadioCheck("Does your cat hunt?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Round Worms", "N/A"), "Yes"),
                        new Node("cat-tumor", "No")
                ]
        ),

        new Form(
                'cat-tumor',
                [
                        new RadioCheck("Does your cat have any tumors or strange lumps?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Cancer", "N/A"), "Yes"),
                        new Node(new DxTx("Inflammatory Bowel Disease", "N/A"), "No")
                ]
        ),

        new Form(
                'cat-nasal',
            [
                    new RadioCheck("Does your cat have any nasal discharge?", "1", "Yes,No", "RADIO_DEFAULT")
            ],
            [
                    new Node(new DxTx("Cat Flu", "N/A"), "Yes"),
                    new Node("cat-itchyeyes", "No")
            ]
        ),

        new Form(
                'cat-itchyeyes',
                [
                        new RadioCheck("Does your cat have itchy eyes?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Conjunctivitis", "N/A"), "Yes"),
                        new Node(new DxTx("Cat Flu", "N/A"), "No")
                ]
        ),

        //Dog Track
        new Form( 'dog-sex',
            [
                new RadioCheck("What sex is your dog?", "1", "Male,Female", "RADIO_DEFAULT")
            ],
            [
                new Node("dog-breath", false)
            ]
        ),

        new Form(
                'dog-breath',
                [
                        new RadioCheck("Has your dog been experiencing bad breath?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node('dog-tumors', "Yes"),
                        new Node('dog-aggression', "No")
                ]
        ),

        new Form(
                'dog-tumors',
                [
                        new RadioCheck("Does your dog have any tumors or strange lumps?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Cancer", "N/A"), "Yes"),
                        new Node('dog-aggression', "No")
                ]
        ),

        new Form(
                'dog-aggression',
                [
                        new RadioCheck("Has your dog been more aggressive than usual?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Possible Rabies infection", "N/A"), "Yes"),
                        new Node('dog-itchy', "No")
                ]
        ),

        new Form(
                'dog-itchy',
                [
                        new RadioCheck("Has your dog been more itchier than usual?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node('dog-shower', "Yes"),
                        new Node('dog-vomiting', "No")
                ]
        ),

        new Form(
                'dog-shower',
                [
                        new RadioCheck("Does your dog bathe at least every one to two weeks?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Allergies", "N/A"), "Yes"),
                        new Node(new DxTx("Flea infection", "N/A"), "No")
                ]
        ),

        new Form(
                'dog-vomiting',
                [
                        new RadioCheck("Has your dog been vomiting recently?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node('dog-bloodydiarrhea', "Yes"),
                        new Node('dog-thirsty', "No")
                ]
        ),

        new Form(
                'dog-bloodydiarrhea',
                [
                        new RadioCheck("Has your dog been experiencing a foul smelling bloody diarrhea?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Parvovirus", "N/A"), "Yes"),
                        new Node('dog-thirsty', "No")
                ]
        ),

        new Form(
                'dog-thirsty',
                [
                        new RadioCheck("Has your dog been drinking more water than usual and urinating more often?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Diabetes", "N/A") , "Yes"),
                        new Node('dog-cough', "No")
                ]
        ),

        new Form(
                'dog-cough',
                [
                        new RadioCheck("Has your dog been recently coughing?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node('dog-whitefoam', "Yes"),
                        new Node('dog-weightloss', "No")
                ]
        ),

        new Form(
                'dog-whitefoam',
                [
                        new RadioCheck("Has your dog been coughing up white foam?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Kennel Cough", "N/A"), "Yes"),
                        new Node('dog-weightloss', "No")
                ]
        ),

        new Form(
                'dog-weightloss',
                [
                        new RadioCheck("Has your dog been experiencing any weight loss?", "1", "Yes,No", "RADIO_DEFAULT")
                ],
                [
                        new Node(new DxTx("Possible Heartworm Infection", "N/A"), false),
                ]
        ),


    ],
    $petcare_db,
    $open_ai
    );

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
            width: 40%;
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
            <div class="text-dark h2 pt-5 pb-3 text-center">PetCare Survey</div>
            <?php

                $diagnosis->render();

            ?>

        </form>

    </div>

</body>

</html>