<!-- Created by Manfred MOUKATE on 09/04/2024 00:50, -->
<!-- Email moukatemanfred@gmail.com -->
<!-- Copyright (c) 2024. All rights reserved. -->
<!-- Last modified 09/04/2024 00:50 -->
<?php


require_once '../../../api/controller/contacts/contactController.php';
$contactController = new ContactController();
// Vérifie si une action a été soumise via POST
if (isset($_POST["action"])) {

    $action = $_POST['action'];
    $contactController = new ContactController();
    switch ($action) {
        case 'createUpdate':
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
    <title>Contact</title>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white py-0 shadow-sm">
    <div class="container-fluid">
        <div class="w-100 d-flex align-items-center justify-content-between p-2 text-black">
            <a href="/login" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="../../asset/logo/asdf.png" class="img-fluid" alt="asdf" style="width: 15em;">
            </a>
            <a class="lead-1 text-decoration-none font-bold-primary text-black-50 lh-1 mb-0"><strong> Bienvenue</strong></a>
            <a class="d-flex align-items-center my-2 my-lg-0 ms-lg-auto text-white text-decoration-none" type="button"
               data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img width="35" height="35" class="rounded-circle m-0 p-0" alt="Brice WOUPO">
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
                                    <div class="p-0 font-regular text-black-50 lead-1_2 ms-2  ">Gestion des contacts
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom" style="height: 380px">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Civilité
                                                <span style="color: red">*</span></label>
                                            <select class="form-select" name="gender" style="height: 50px" required>
                                                <option value="homme"></option>
                                                <option value="female">Madame</option>
                                                <option value="male">Monsieur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Prénom </label>
                                            <input type="text" class="form-control" name="firstname"
                                                   style="height: 50px ">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Nom
                                                <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="lastname" style="height: 50px"
                                                   oninput="this.value = this.value.toUpperCase()" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Mobile<span
                                                        style="color: red">*</span> </label>
                                            <input type="number" class="form-control" name="mobile"
                                                   style="height: 50px " required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Pays
                                                <span style="color: red">*</span> </label>
                                            <select class="form-select" name="country" style="height: 50px" required>
                                                <?php
                                                $countries = Country::_list();
                                                foreach ($countries as $country) {
                                                    echo "<option value='" . $country->getToken() . "' >" . $country->getNameen() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Ville
                                                <span style="color: red">*</span> </label>
                                            <select class="form-select" name="city" style="height: 50px" required>
                                                <?php
                                                $cities = City::_list();
                                                foreach ($cities as $city) {
                                                    echo "<option value='" . $city->getToken() . "' >" . $city->getName() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Whatsapp </label>
                                            <input type="number" class="form-control" name="whatsapp"
                                                   style="height: 50px ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label p-0 font-regular text-black-50 lead-1_2 ms-2">Office </label>
                                            <input type="text" class="form-control" name="office" style="height: 50px ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12  mx-auto ">
                                    <div class="d-grid grap-2">
                                        <input type="hidden" name="action" value="createUpdate">
                                        <input type="hidden" name="token" value=" ">
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
                                    <div class="p-0 font-regular text-black-50 lead-1_2 ms-2  ">Liste des contacts</div>
                                </div>
                            </div>
                            <div class="card-body border-bottom" style="height: 380px">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <table id="example" class="table" style="width:100%">

                                            <tbody>
                                            <?php
                                            $contact = Contact::_list();
                                            foreach ($contact as $contacts) {
                                                echo '<tr>
                                          <td style="font-size: 12px ">' . $contacts->getFirstname() . ' ' . $contacts->getLastname() . '</td>
                                          <td style="font-size: 12px ">' . $contacts->getMobile() . '  </td>
                                          <td style="font-size: 12px ">' . $contacts->getCity()->getName() . ',' . $contacts->getCity()->getcountry()->getNameen() . ' </td>
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

        </div>onclick="window.location.href = 'https://example.com';"
    </div>

    <script src="../../plugin/bootstrap/css/bootstrap.min.css"></script>
    <script src="../../plugin/script/js/dataTable.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js>"
</div>
</body>

</html>