<?php

require_once '../../../api/controller/contacts/contactController.php';
$contactController = new ContactController();
// Vérifie si une action a été soumise via POST
if(isset($_POST["action"])){

    $action = $_POST['action'];
    $contactController = new ContactController();
    switch ($action) {
        case 'contact':
            $contactController->createUpdate();
            break;

        default:
            echo "Page non trouvée";
            break;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugin/bootstrap/css/bootstrap.min.css">
    <title>Overview</title>
</head>
<body class="d-flex flex-column h-100 mi-bg-primary pt-inner">
<header>
    <div class="container-fluid ">
        <div class="row shadow rounded">
            <div class="col-4">
                <a href="#">
                    <img src="../../asset/logo/asdf.png" class="img-fluid" alt="asdf" style="width: 15em;">
                </a>
            </div>
            <div class="col-4 text-center pt-3" style="color: gray ;"><strong>Welcome</strong></div>
            <div class="col-4 pt-4  d-flex justify-content-end">
                <div class="col-4 pt-3 text-center" style="color: gray; position: relative;">
                    <div style="width: 30px; height: 30px; background-color: #ccc; border-radius: 50%; display: flex; justify-content: center; align-items: center; position: absolute; top: -15px; left: calc(50% - 15px);">
                        <span style="font-size: 14px; font-weight: bold;">AB</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</header>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white py-0 shadow-sm">
    <div class="container-fluid">
        <div class="w-100 d-flex align-items-center justify-content-between p-2 text-black">
            <a href="/login" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="../../asset/logo/asdf.png" class="img-fluid" alt="asdf" style="width: 15em;">
            </a>
            <a class="lead-1 text-decoration-none font-bold-primary text-black-50 lh-1 mb-0"><strong> Bienvenue</strong></a>
            <a class="d-flex align-items-center my-2 my-lg-0 ms-lg-auto text-white text-decoration-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img width="35" height="35" class="rounded-circle m-0 p-0" alt="Brice WOUPO" >
            </a>
        </div>
    </div>
</nav>
<div class="container pt-lg-4">
    <div class="row g-2 row-cols-2 g-md-4 row-cols-md-4 row-cols-xl-6 justify-content-start my-2 my-md-3 my-lg-5">
        <div class="col">
            <div class="card h-100 text-dark bg-white w-100 m-0 p-0 shadow-sm tile tile-light">
                <div class="card-body d-flex justify-content-center px-2 pt-2 pb-0">
                    <img class="" src="../../asset/icone/svg/presentation.svg" alt="Famille" width="80" height="80">
                </div>
                <div class="card-body d-flex flex-column justify-content-center px-2 pb-3 pt-0">
                    <a target="_self" href="#" class="stretched-link text-decoration-none tile-title text-center mx-0 mt-1 mb-1 lh-1">rapport</a>
                    <p class="tile-sub-title lh-1 lead-0_85 font-alt fw-400 mb-0 text-center">Gestion des rapport </p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-dark bg-white w-100 m-0 p-0 shadow-sm tile tile-light">
                <div class="card-body d-flex justify-content-center px-2 pt-2 pb-0">
                    <img class="" src="../../asset/icone/svg/user-check.svg" alt="Profile" width="80" height="80">
                </div>
                <div class="card-body d-flex flex-column justify-content-center px-2 pb-3 pt-0">
                    <a target="_self" href="https://demo.microware.cm/fr/profile.ime" class="stretched-link text-decoration-none tile-title text-center mx-0 mt-1 mb-1 lh-1">Profile</a>
                    <p class="tile-sub-title lh-1 lead-0_85 font-alt fw-400 mb-0 text-center">Gestion des profils</p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-dark bg-white w-100 m-0 p-0 shadow-sm tile tile-light">
                <div class="card-body d-flex justify-content-center px-2 pt-2 pb-0">
                    <img class="" src="../../asset/icone/svg/checkup-list.svg" alt="Profile" width="80" height="80">
                </div>
                <div class="card-body d-flex flex-column justify-content-center px-2 pb-3 pt-0">
                    <a target="_self" href="https://demo.microware.cm/fr/profile.ime" class="stretched-link text-decoration-none tile-title text-center mx-0 mt-1 mb-1 lh-1">Project</a>
                    <p class="tile-sub-title lh-1 lead-0_85 font-alt fw-400 mb-0 text-center">Gestion des Projects</p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-dark bg-white w-100 m-0 p-0 shadow-sm tile tile-light">
                <div class="card-body d-flex justify-content-center px-2 pt-2 pb-0">
                    <img class="" src="../../asset/icone/svg/users.svg" alt="Utilisateur" width="80" height="80">
                </div>
                <div class="card-body d-flex flex-column justify-content-center px-2 pb-3 pt-0">
                    <a target="_self" href="https://demo.microware.cm/fr/user.ime" class="stretched-link text-decoration-none tile-title text-center mx-0 mt-1 mb-1 lh-1">Utilisateur</a>
                    <p class="tile-sub-title lh-1 lead-0_85 font-alt fw-400 mb-0 text-center">Gestion des utilisateurs</p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-dark bg-white w-100 m-0 p-0 shadow-sm tile tile-light">
                <div class="card-body d-flex justify-content-center px-2 pt-2 pb-0">
                    <img class="" src="../../asset/icone/svg/address-book.svg" alt="Utilisateur" width="80" height="80">
                </div>
                <div class="card-body d-flex flex-column justify-content-center px-2 pb-3 pt-0">
                    <a target="_self" href="https://demo.microware.cm/fr/user.ime" class="stretched-link text-decoration-none tile-title text-center mx-0 mt-1 mb-1 lh-1">Contact</a>
                    <p class="tile-sub-title lh-1 lead-0_85 font-alt fw-400 mb-0 text-center">Gestion des contacts</p>
                </div>

            </div>
        </div>
        <div class="col">
            <div class="card h-100 text-dark bg-white w-100 m-0 p-0 shadow-sm tile tile-light">
                <div class="card-body d-flex justify-content-center px-2 pt-2 pb-0">
                    <img class="" src="https://demo.microware.cm/public/assets/img/icon/status-01.svg" alt="Statut" width="80" height="80">
                </div>
                <div class="card-body d-flex flex-column justify-content-center px-2 pb-3 pt-0">
                    <a target="_self" href="https://demo.microware.cm/fr/status.ime" class="stretched-link text-decoration-none tile-title text-center mx-0 mt-1 mb-1 lh-1">Statut</a>
                    <p class="tile-sub-title lh-1 lead-0_85 font-alt fw-400 mb-0 text-center">Gestion des statuts</p>
                </div>

            </div>
        </div>
    </div>
</div>
<!--<footer class="footer mt-auto py-3 bg-white border-top">-->
<!--    <div class="container text-center">-->
<!--        <p class="m-0 lead-0_8 fw-normal text-black-50 font-primary">©2024            <a target="_blank" href="https://www.imediatis.net" class="text-black-50 link-primary--hover text-decoration-none">data-asdf</a></p>-->
<!--    </div>-->
<!--</footer>-->
<script src="plugin/bootstrap/css/bootstrap.min.css"></script>
</body>
</html>