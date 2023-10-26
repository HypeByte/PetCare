<?php

require_once "private/init.php";
global $petcare_db;


$key = $_GET['key'];

$sql = "SELECT * FROM appointments WHERE share_key = '" . $key . "'";
$result = mysqli_query($petcare_db, $sql);
$appointment = mysqli_fetch_assoc($result);

$appid = $appointment['id'];

$username = getUser_byID($appointment['uid']);

$sql2 = "SELECT * FROM responses WHERE uid = '" . $appointment['uid'] . "' AND appointment_id = '" . $appid . "'";
$responses = mysqli_query($petcare_db, $sql2);

?>



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Survey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="private/assets/css/navbar.css" rel="stylesheet" />

    <style>
        body {
            background-image: url('private/assets/background3.jpg');
        }

        #responses_table{
            width: 75%;
        }

        @media (max-width: 765px) {
            #responses_table {
                width: 100% !important;
            }
        }

    </style>

</head>

<body>
<nav class="navbar navbar-flex navbar-dark navbar-expand-md py-3 sticky-top" style="background-color: rgb(12, 72, 102); ">
    <div class="container"><a class="navbar-brand d-flex align-items-center text-light"><span>PetCare</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-5">
            <ul class="navbar-nav ms-auto">

            </ul><a class="btn btn-primary ms-md-2" href="login.php">Log in</a>
        </div>
    </div>
</nav>

<div class="container-fluid">

    <div class="table-responsive-md mb-5 mt-5">

        <table class="table table-bordered text-center mb-5 table-success" id="responses_table" style="margin: auto;">

            <thead>

            <tr>
                <th colspan="3" class="bg-success"><h2>Username: <?php echo $username; ?></h2></th>
            </tr>

            <tr>
                <th colspan="3" class="bg-warning" ><h3>Pet Diagnosis: <?php echo $appointment['diagnosis']; ?></h3></th>
            </tr>

            <tr  align="left">
                <th colspan="3" class="bg-light" align="left" >
                    <h4>Treatment:</h4>
                    <p><?php echo $appointment['treatment']; ?></p>
                </th>
            </tr>

            <tr>
                <th colspan="3"><h3>Responses</h3></th>
            </tr>

            <tr>
                <th scope="col">Question</th>
                <th scope="col">Response</th>
            </tr>

            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($responses)): ?>

                <tr>
                    <td><?php echo $row['question']; ?></td>
                    <td><?php echo $row['response']; ?></td>
                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../private/assets/js/Sidebar-Menu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
