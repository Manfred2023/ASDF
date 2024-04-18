<?php
// Created by Manfred MOUKATE on 18/04/2024 21:35,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 18/04/2024 21:35
include('../../../api/conf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugin/bootstrap/css/bootstrap.min.css">
    <title>User</title>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white py-0 shadow-sm">
    <div class="container-fluid">
        <div class="w-100 d-flex align-items-center justify-content-between p-2 text-black">
            <a href="/login" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="../../asset/logo/asdf.png" class="img-fluid" alt="asdf" style="width: 15em;">
            </a>
            <a class="lead-1 text-decoration-none font-bold-primary text-black-50 lh-1 mb-0"><strong> Gestion des Utilisateurs</strong></a>
            <a class="d-flex align-items-center my-2 my-lg-0 ms-lg-auto text-white text-decoration-none" type="button"
               data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img width="35" height="35" class="rounded-circle m-0 p-0" >
            </a>
        </div>
    </div>
</nav>
<div class="container pt-lg-4">
    <div class="row g-2 row-cols-2 g-md-4 row-cols-md-4 row-cols-xl-6 justify-content-start my-2 my-md-3 my-lg-5">
        <div class="col-12  mx-auto">
            <form method="post" class="login-form">
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <div class="d-flex flex-row align-items-center mb-0 py-1"><a href="#"
                                                                                             class="text-black-50 link-primary--hover">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"></path>
                                        </svg>
                                    </a>
                                    <div class="p-0 font-regular text-black-50 lead-1_2 ms-2  ">Gestion des Utilisateurs
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom"  ">
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Selectionner <un></un> contact
                                                <span style="color: red">*</span> </label>
                                            <select class="form-select" name="city" style="height: 50px" required>
                                                <?php
                                                $contact = Contact::_list();
                                                echo ' <option value=" ">Selectionner un contact</option>';
                                                foreach ($contact as $contacts) {
                                                    echo "<option value='" . $contacts->getToken() . "' >" . $contacts->getLastname() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Profil de l'utilisateur
                                                <span style="color: red">*</span> </label>
                                            <select class="form-select" name="city" style="height: 50px" required>
                                                <?php
                                                $profile = Profile::_list();
                                                echo ' <option value=" "> Profil de l\'utilisateur</option>';
                                                foreach ($profile as $profiles) {
                                                    echo "<option value='" . $profiles->getToken() . "' >" . $profiles->getName() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Adresse email de connexion
                                                <span style="color: red">*</span></label>
                                            <input type="email" class="form-control" name="email" style="height: 50px"
                                                    required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Mot de passe de connexion
                                                <span style="color: red">*</span></label>
                                            <input type="password" class="form-control" name="lastname" style="height: 50px"
                                                   oninput="this.value = this.value.toUpperCase()" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12  mx-auto ">
                                    <div class="d-grid grap-2">
                                        <input type="hidden" name="action" value="createUpdate">
                                        <input type="hidden" name="token" value="null">
                                        <button type="submit"
                                                class="btn  btn-outline-primary btn-block p-0 font-regular  lead-1_2 ms-2"
                                                style="height: 50px; font-size: 24px; border-radius: 8px; ">Envoyer
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <div class="d-flex flex-row align-items-center mb-0 py-1"><a href="#"
                                                                                             class="text-black-50 link-primary--hover"> </a>
                                    <div class="p-0 font-regular text-black-50 lead-1_2 ms-2  ">Liste des utilisateurs</div>
                                </div>
                            </div>
                            <div class="card-body border-bottom" style="height: 380px">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <table class="table">
                                            <tbody>
                                            <?php
                                            $user = User::_list();

                                            foreach ($user as $users) {
                                           echo' <tr>
                                                <td> <a style="color: #0b2e13" href="" >' .$users->getContact()->getLastname() .' </a></td>
                                                <td>' . $users->getContact()->getMobile() . ' </td>
                                            </tr>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script src="../../plugin/bootstrap/css/bootstrap.min.css"></script>
    <script src="../../plugin/script/js/dataTable.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js>"
</div>

</body>
</html>

