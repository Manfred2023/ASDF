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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../plugin/script/css/style.css">
    <title>Title</title>
</head>
<body class="d-flex flex-column h-100 bg-light p-0" style="background:url('../../asset/backgound/backgroung.jpg');background-repeat:no-repeat;background-size:cover">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 ">
            <div class="d-flex justify-content-center">
                <img src="../../asset/logo/asdf.png" class="img-fluid pt-5 pb-5" alt="asdf" style="width: 20em;">
            </div>
            <div class="row justify-content-center">
                <div class=" ">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Have an account?</h3>
                        <form  class="login-form" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control rounded-left" name="email" placeholder="asdf@foundations.com" required>
                            </div>
                            <div class="form-group ">
                                <label>Password</label>
                                <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
                            </div>

                            <input type="hidden" name="action" value="login">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <script src="../../plugin/script/js/jquery.min.js"></script>
    <script src="../../plugin/script/js/popper.js"></script>
    <script src="../../plugin/script/js/bootstrap.min.js"></script>
    <script src="../../plugin/script/js/main.js"></script>
</body>
 </html>
