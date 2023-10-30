<?php

require_once 'private/init.php';


?>
<!DOCTYPE html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="private/assets/css/footer.css" rel="stylesheet" />
    <link href="private/assets/css/navbar.css" rel="stylesheet" />
    <link href="private/assets/css/banner.css" rel="stylesheet" />
    <style></style>
</head>

<body style="background-color: white">

<?php if(isset($_SESSION['uid'])): ?>
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

<?php else: ?>
    <nav class="navbar navbar-flex navbar-dark navbar-expand-md py-3 sticky-top" style="background-color: rgb(12, 72, 102); ">
        <div class="container"><a class="navbar-brand d-flex align-items-center text-light"><span>PetCare</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light me-3" href="about.php">About</a></li>
                    <li class="nav-item"></li>
                </ul><a class="btn btn-primary ms-md-2" href="index.php">Login</a>
            </div>
        </div>
    </nav>


<?php endif; ?>

<section class="text-white pb-0 mb-0">

        <div class="border rounded border-0 d-flex flex-column justify-content-center align-items-center" style="background: url('private/assets/about.jpg') center / cover; height: 500px;">
            <div class="row">
                <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <h1 class="text-uppercase fw-bold mb-3"><i>They're Not Just Pets; They're Family</i></h1>
                    </div>
                </div>
            </div>
        </div>

</section>

<section class="py-4 py-xl-5" style="background-color: navajowhite">
    <div class="container">
        <div class="text-white border rounded border-0 p-4 p-md-5 text-center">
            <h2 class="fw-bold text-dark mb-3"><b>Purpose/Mission:</b></h2>
            <h5 class="mb-4 text-dark"><i>PetCare is an app designed to make veterinary healthcare more accessible to everyone and account for underserved communities by serving as an online vet platform where pet owners can take surveys/appointments to get a diagnosis and treatment for their pet.</i></h5>
        </div>
    </div>
</section>

<section class="py-4 py-xl-5 mt-0 pt-0" style="background-color: navajowhite">
     <div class="container">
        <div class=" border rounded border-0 border-dark overflow-hidden">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="text-dark p-4 p-md-5">
                        <h2 class="fw-bold text-dark mb-3">A Mission To Heal</h2>
                        <h5 class="mb-4"><b>At PetCare is on a mission to revolutionize the way pet owners care for their beloved animals. Our innovative website combines the power of advanced AI technology with easy-to-use branching logic surveys to provide pet owners with accurate and convenient online pet diagnosis and treatment recommendations. We understand that pets are not just animals; they are cherished members of the family. Our goal is to ensure that every pet receives the best care possible, anytime and anywhere. With PetCare, we aim to empower pet owners with the knowledge and tools they need to keep their furry friends happy, healthy, and thriving. Your pet's well-being is our priority, and we're here to provide reliable, accessible, and personalized solutions for all your pet care needs.</b></h5>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" style="border-radius: 10px" src="private/assets/goldenretriever.jpg" /></div>
            </div>
        </div>
    </div>
</section>

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

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../private/assets/js/Sidebar-Menu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>



