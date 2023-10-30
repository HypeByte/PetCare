<?php

require_once "private/init.php";
global $petcare_db;

require_login();

$sql = "SELECT * FROM appointments WHERE completed = 'Yes' AND uid = '" . $_SESSION['uid'] . "'";
$result = mysqli_query($petcare_db, $sql);


?>



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="private/assets/css/navbar.css" rel="stylesheet" />

    <style>
        body {
            background-image: url('private/assets/background3.avif');
        }

        #appointments_table{
            width: 75%;
        }

        @media (max-width: 765px) {
            #appointments_table {
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
                    <li class="nav-item"><button class="nav-link active text-light" style="background-color: transparent; border: transparent" onclick="Appointment()"><b>Start Appointment</b></button></li>
                    <li class="nav-item"><a class="nav-link text-light" href="appointments.php">My Appointments</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="about.php">About</a></li>
                </ul><button class="btn btn-primary ms-md-2" role="button" onclick="Signout()" ">Sign Out</button>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="table-responsive-md mb-5 mt-5">

                <table class="table table-bordered text-center mb-5 table-success" id="appointments_table" style="margin: auto;">

                    <thead>

                        <tr>
                            <th colspan="3"><h3>Completed Appointments</h3></th>
                        </tr>

                        <tr>
                            <th scope="col">Link</th>
                            <th scope="col">Pet Name</th>
                            <th scope="col">Date</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($result)): ?>

                            <tr>
                                <td><a href="responses.php?appid=<?php echo $row['id']; ?>">Appointment #<?php echo $row['id']; ?></a></td>
                                <td><?php echo $row['pet_name']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                            </tr>

                        <?php endwhile; ?>

                    </tbody>

                </table>

        </div>

    </div>

    <script>
        function Signout() {
            let confirm = window.confirm("Are you sure you want to sign out? Please close all tabs of the website you are signed in on if you chose to do so.");

            if(confirm) {
                window.location.href = "index.php";
            }
        }

        function Appointment() {
            let confirm = window.confirm("Are you sure you want to start an appointment?");

            if(confirm) {
                window.location.href = "survey.php";
            }
        }

    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../private/assets/js/Sidebar-Menu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
