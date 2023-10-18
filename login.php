<!DOCTYPE html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="private/assets/css/footer.css" rel="stylesheet" />

    <style>
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

<body style="background-image: url('private/assets/background2.jpg')">

<div class="container-responsive mt-5 ps-5 pe-5 pb-5"  id="main" style="background-color: rgb(12, 72, 102); margin: auto; border-radius: 20px;">
    <div class="h1 text-center text-light pt-3">PetCare Login</div>
    <form action="index.php" method="POST" class="mt-3">

        <div class="mb-3">
            <label class="form-label mt-2 text-light" for="username">Username</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label mt-2 text-light" for="password">Create Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password">
            </div>
        </div>


        <div class="text-center mb-3">
            <button class="btn-primary btn-lg">Login</button>
        </div>

        <div class="text-center">
            <a class="text-light h5" href="index.php">Don't have an account? Register here!</a>
        </div>

    </form>
</div>


</body>

</html>
