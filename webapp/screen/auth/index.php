<!-- Created by Manfred MOUKATE on 4/4/24, 3:48 PM, -->
<!-- Email moukatemanfred@gmail.com -->
<!-- Copyright (c) 2024. All rights reserved. -->
<!-- Last modified 4/4/24, 3:48 PM -->
<?php 
 
require_once '../../../api/controller/users/UserController.php';
$userController = new UserController();
// Vérifie si une action a été soumise via POST
if(isset($_POST["action"])){
    
    $action = $_POST['action'];
    $userController = new UserController();
    switch ($action) {
        case 'login':
            $userController->login();
            break;
        case 'register':
            $userController->register();
            break;
        case 'logout':
            $userController->logout();
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../plugin/bootstrap/css/bootstrap.min.css">
    <title>Title</title>
</head>
<body class="d-flex flex-column h-100 bg-light p-0" style="background:url('https://demo.microware.cm/public/assets/img/bg-app-login.svg');background-repeat:no-repeat;background-size:cover">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 r">
            <div class="d-flex justify-content-center">
                <img src="../../asset/logo/asdf.png" class="img-fluid pt-5 pb-5" alt="asdf" style="width: 20em;">
            </div>
            <div class="pt-5">
                <div class="card text-center">

                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="card-body text-start">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" aria-describedby="passwordHelpBlock">
                                <label for="inputPassword5" class="form-label">Password</label>
                                <input type="password" id="inputPassword5" class="form-control" name="password" aria-describedby="passwordHelpBlock">
                            </div>
                            <input type="hidden" name="action" value="login"> <!-- Champ caché pour spécifier l'action -->
                            <div class="pb-2 d-grid gap-2 col-6 mx-auto col-11 mt-3" style="align-items: end">
                                <button type="submit" class="btn btn-outline-primary">Connexion</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        man-asdf
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</body>
 </html>
