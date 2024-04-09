<!-- Created by Manfred MOUKATE on 09/04/2024 00:50, -->
<!-- Email moukatemanfred@gmail.com -->
<!-- Copyright (c) 2024. All rights reserved. -->
<!-- Last modified 09/04/2024 00:50 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body class="d-flex flex-column h-100 mi-bg-in-app pt-inner">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white py-0 shadow-sm">
    <div class="container-fluid">
        <div class="w-100 d-flex align-items-center justify-content-between p-2 text-black">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img class="me-2" src="https://demo.microware.cm/public/assets/img/microware-main-logo.svg" alt="" height="25">
            </a>
            <a class="lead-1 text-decoration-none font-bold-primary text-black-50 lh-1 mb-0">Gestion des caisses</a>
            <a class="d-flex align-items-center my-2 my-lg-0 ms-lg-auto text-white text-decoration-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img width="35" height="35" class="rounded-circle m-0 p-0" alt="Brice WOUPO" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAIAAAC3LO29AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFzUlEQVR4nO2aeVBTRxzHN8+EI2ASETm0KAgWRCBcahW1RGgAAavFGY8Zq52xo7b9w9LWVluntlPvjtWOrW2daWc603ZqrUNbiIiUFq0HWu4jgCE0AiEkHLEkHIHk9Y8ly5pDjNpxltnvvD9++/vt2/f7ZH+7m5cJJ2Tnm2BSi3nSCfzvooTkixKSL0pIvigh+aKE5IsSki9KSL4oIfmihOSLEpIvSki+KCH5ooTka/ITcp90Ai7ITyjwFwoYDkf3b7+6T/+Ad01AuP255J1pK+39FpbVGwdatbrimvpz1/8eMZsBADukkh1SCezQotHmfHwKvyUpYt5n2zZDu1Ovz/joOB5dPC/0y+1boH2rpfXl09/gYNtSVmQnxvqLhMjZ3d9fUF595lLphKgTELrzuAK+p8OQyIsf7OcriZr/YnLSpk++6DMOlDY07V6zCkbj5s4J8vVp6+5F/bMTY9FQAr7n04EBzZ0aFM1KEKPotSYF8q9ZFH9gU46nm5vN032nTt2SvGxD0uIPf/rlh7/K7oPwGNZh+MzA99atBgDI29V3dD3Inx4bjewpDCMVR+F3pceNNzkcjlS8ADUvVNRAY33SouNbN9rjIbnzeAc2rduavOw+6bmwDkvrG9/9/meYkL9I8PaazIVhITAkiZoPDVllDSpUqTjqTHEptJeGh4m8+PhoabHRn8qKoZ0wd84MoQDaVf/c0ejvAgDCAvw+WL8W9R80mb67fP1GcwsAIDEsZPOKpV4e7jC0NyerTKGUt6sdpu3CHBqHTeo+vbpP39HbV6FUfV1yGYVGLWZoXKysRc64kNnTvb2hnZkgthlt/lMzZ/lMg3ZGfAzyoxF2ZaW5cccmwDg0nHPs1MHz+SV18pI6+dE82erDJ/TGARjlTpmSm53mLO2HrFI/oWDdkoWoWVIrh0a1qq1Lf3dsaIZJFUcCRyUKJY0dc+L1XFhVCwBw43JTYyKR83j+xcaOTvzeVm33kbwC1JQsiPC2TqmNXCBcFR+j/PwYvG4c2pcSPZZBQ1vHofP5qJussgbZMHW8RM9dvzVOKI4CAIjnBAVOE0GPvF2t0vUAAMJnBqAJBAD8erPSPp+C8upxDIaJmBX4qITOVKZQwtMCCu0TAIAl4WHeHu4ZceNF+NWlPxvaOqC9MDR4mhc/LW58Ai9YPx18A7dYLD0Gg/1zDUPDgyYTago8He/5LhCOms29BiO8+geHkP8lyfKzua948HiwWa5Udff3Q9uNy02NWZBuZWjRaBUaLaxDAADDMCujI1dh/IXWRWjAxmcYRujoxOK7u+HbrGFoyL6Pa4RF1fWJu/fDS/zGPsn7h9HZEBk0a+PyZ6DNsmxRVT26663nM1CJyipqAAB49NX0lNkzpkNb2aVTaLTQvq3pGsXqwn6jAtYih7JYLPJ7F+rDENpIpeu5Im9GzYS5wci+gC1FtMaQv7lTgz6aYD/f8ShW3gPDpj/qGlEzNzs9yNcHf3qASLhnbSZqXmtS4GWFywVCLsN48Hjw8vZwT4qYl4ad2iOjo/jz0FaOpOzSof2wqLrOfnx8iwIAnCgoslgs0Pbx9vrtnV2vZaQkhgYnhgbvkEry976OjlDY2WnaD8oHgDQ2quHkQWfR360HBgCAZdnimnr8OAH3TlFRdd221Gfx6B1dj82RLW9XH8mT7XkhCzYFfM/c7HSHjz5ZcKlCqXKW2ON5ezp77WZ+eRXuKcSOfih8isqVql6DEY86nNUzxaX7f8wzYdVho1Gz+Wie7KTzCQSP8vY0PDLS2Xe3slV1vqz8auNtm+gVebNxaBh9sbKZIpZli6rqNixbjDw2JYr0benVK/Km7VJJZrzYCzvTB02mwsra0xdL0ObkTBxS/rnH4XBC/Wf4i4Tw/fB2Z5fZukrvL2LegFmWVWi0E86YvSb/rxiUkHxRQvJFCckXJSRflJB8UULyRQnJFyUkX5SQfFFC8kUJyRclJF+UkHxNfsL/AEmnJTKeRTZ5AAAAAElFTkSuQmCC">
            </a>
        </div>
    </div>
</nav>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header m-0 p-0 border-bottom">
        <div class="d-flex w-100 justify-content-between align-items-center py-2 px-3 px-md-4">
            <div class="m-0 d-flex justify-content-start align-items-center">
                <img width="35" height="35" class="rounded-circle m-0 p-0" alt="Brice WOUPO" src="data:image/png;base64,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">
                <div class="d-flex flex-column my-0 mx-2">
                    <div class="mx-0 mb-1 text-black lead-0_75 font-bold-primary lh-1">Brice WOUPO</div>
                    <div class="m-0 text-muted lead-0_65 lh-1">cyrille@imediatis.net</div>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
    <div class="offcanvas-body p-0">
        <div class="vstack gap-1 p-0">
            <a href="https://demo.microware.cm/fr/settings.ime" class="text-muted d-block p-3 border-bottom link-primary--hover lead-1_05 text-decoration-none"><i class="bi bi-gear me-2"></i>Paramètres du compte</a>
            <a onclick="jsConfirm('Se déconnecter', 'Votre session est sur le point d\'être fermée. Souhaitez-vous continuer ?', 'https://demo.microware.cm/inspector/user/logout', 'Annuler', 'Oui')" href="#" class="text-muted d-block p-3 border-bottom link-secondary--hover lead-1_05 text-decoration-none mt-auto">
                <i class="bi bi-door-closed me-2"></i>Se déconnecter</a>
        </div>
    </div>
</div>
<main class="container">
    <div class="row">
        <div class="col-12 col-xxl-10 my-2 my-md-3 my-lg-5 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between">
                        <div class=""><div class="d-flex flex-row align-items-center mb-0 py-1"><a href="https://demo.microware.cm/fr/overview.ime" class="text-black-50 link-primary--hover"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"></path></svg></a><div class="p-0 font-regular text-black-50 lead-1_2 ms-2">Gestion des caisses</div></div></div>
                        <div class=""></div>
                    </div>
                </div>
                <div class="card-body border-bottom pt-4 bg-light">
                    <form enctype="multipart/form-data" action="https://demo.microware.cm/inspector/cashdesk/editor" class="" method="post" autocomplete="off" name="iFormOVERVIEW" id="iFormOVERVIEW" data-required="Avant d'envoyer le formulaire, assurez-vous que tous les champs sont remplis">
                        <input type="hidden" name="_cashRegisterGuid" id="_cashRegisterGuid" value=""><div class="row m-0"><div class="col-12 align-self-center col-lg-4 mb-4"><div class="form-floating"><input required="" maxlength="60" name="_cashRegisterName" type="text" value="CAISSE-003" class="form-control rounded-3 font-bold-primary " oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" id="_cashRegisterName" placeholder="Nom / Désignation "><label for="_cashRegisterName">Nom / Désignation  <code>*</code></label></div></div><div class="col-12 align-self-center col-lg-4 mb-4"><div class="form-floating"><select required="" name="_cashRegisterTerminal" id="_cashRegisterTerminal" class="form-control rounded-3"><option value="">Choisir le terminal</option><option value="100003">PDP-CAISSE-01</option></select><label for="_cashRegisterTerminal">Choisir le terminal <code>*</code></label></div></div><div class="col-12 align-self-center col-lg-4 mb-4"><div class="form-floating"><select required="" name="_cashRegisterCashier" id="_cashRegisterCashier" class="form-control rounded-3"><option value="">Caissier(ère)</option><option value="100005">Felicite TALA</option><option value="100003">Manfred MOUKATE</option><option value="100002">Jospin MAMBOU</option><option value="100008">Cyrille WOUPO</option></select><label for="_cashRegisterCashier">Caissier(ère) <code>*</code></label></div></div></div><div class="row m-0"><div class="col-12 align-self-center col-lg-4 mb-4"><div class="form-floating"><input maxlength="7" name="_cashRegisterInitialBalance" type="text" value="" class="form-control rounded-3 font-bold-primary font-bold-primary lead-1_75 text-end" id="_cashRegisterInitialBalance" placeholder="Solde ouverture" inputmode="numeric" style="text-align: right;"><label for="_cashRegisterInitialBalance">Solde ouverture </label></div></div><div class="col-12 align-self-center col-lg-8 mb-4"><div class="form-floating"><input maxlength="80" name="_cashRegisterComment" type="text" value="" class="form-control rounded-3 font-bold-primary " oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" id="_cashRegisterComment" placeholder="Comment"><label for="_cashRegisterComment">Comment </label></div></div></div><div class="row m-0"><div class="col-12 align-self-center mb-4"><div class="d-grid gap-2"><button id="frmSubmitButton" type="submit" class="btn btn-outline-primary btn-lg py-0-75"><i class="bi bi-check-lg me-2"></i>Ouvrir la caisse</button></div></div></div></form>
                </div>
                <div class="card-body border-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><table class="table table-hover datatable dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1086px;">
                        <thead>
                        <tr><th tabindex="0" scope="col" class="text-start col-10 col-lg-4 align-middle font-primary sorting_disabled" rowspan="1" colspan="1" style="width: 342px;" aria-label="Caisse ouverte">Caisse ouverte</th><th tabindex="1" scope="col" class="text-end col-lg-4 align-middle font-primary d-none d-md-table-cell sorting_disabled" rowspan="1" colspan="1" style="width: 342px;" aria-label="Vente">Vente</th><th tabindex="2" scope="col" class="text-start col-lg-3 align-middle font-primary d-none d-md-table-cell sorting_disabled" rowspan="1" colspan="1" style="width: 251px;" aria-label="Terminal">Terminal</th><th tabindex="3" scope="col" class="text-end col-1 align-middle font-primary sorting_disabled" rowspan="1" colspan="1" style="width: 71px;" aria-label=""></th></tr>
                        </thead><tbody><tr class="odd"><td class="  text-start col-10 col-lg-4 align-middle font-primary"><div class="d-flex flex-column mb-0"><span class="p-0">CAISSE-002<i class="bi bi-broadcast text-success ms-1"></i></span><span class="text-body-tertiary lead-0_75 lh-1 mt-0">16 Fév. 2024 11:37</span></div></td><td class="  text-end col-lg-4 align-middle font-primary d-none d-md-table-cell"><div class="d-flex flex-column mb-0"><span class="p-0">47 990</span><span class="text-body-tertiary lead-0_75">47 990</span></div></td><td class="  text-start col-lg-3 align-middle font-primary d-none d-md-table-cell"><div class="d-flex flex-column mb-0"><span class="p-0">PDP-CAISSE-01</span><span class="text-body-tertiary lead-0_75">Jospin MAMBOU</span></div></td><td class="  text-end col-1 align-middle font-primary"><div class="btn-group"><button class="btn table-dropdown-btn table-dropdown dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></button><ul class="dropdown-menu"><li><a href="https://demo.microware.cm/fr/cashdesk/cash-book/100002.ime" class="dropdown-item dropdown-table-item"><i class="bi bi-journal-text me-2"></i>Journal de caisse</a></li><li><a onclick="jsConfirm('Forcer la fermeture', 'Voulez-vous forcer la fermeture de la caisse ?', 'https://demo.microware.cm/inspector/cashdesk/force-closure?guid=100002&amp;callback[]=cashdesk', 'Annuler', 'Close')" class="dropdown-item dropdown-table-item"><i class="bi bi-door-closed me-2"></i>Forcer la fermeture</a></li></ul></div></td></tr></tbody>
                    </table><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link">Next</a></li></ul></div><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-white border-top">
    <div class="container text-center">
        <p class="m-0 lead-0_8 fw-normal text-black-50 font-primary">© 2020 – 2024            <a target="_blank" href="https://www.imediatis.net" class="text-black-50 link-primary--hover text-decoration-none">imediatis-team</a></p>
    </div>
</footer>
<script src="https://demo.microware.cm/public/assets/vendor/bootstrap-5.3.2-dist/js/bootstrap.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/jquery-blockui/jquery.blockUI.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/bootbox/bootbox.all.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/bootbox/bootbox.locales.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/datatables-1-13-6/js/jquery.dataTables.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/datatables-1-13-6/js/dataTables.bootstrap5.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<link href="https://demo.microware.cm/public/assets/vendor/notyf/notyf.min.css" rel="stylesheet">
<script src="https://demo.microware.cm/public/assets/vendor/notyf/notyf.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<link href="https://demo.microware.cm/public/assets/vendor/slim-select/slimselect.css" rel="stylesheet">
<script src="https://demo.microware.cm/public/assets/vendor/slim-select/slimselect.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/vendor/inputmask/inputmask.min.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/js/mi-reset-01.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script src="https://demo.microware.cm/public/assets/js/mi-main-scripts-04.js" crossorigin="anonymous" referrerpolicy="origin"></script>
<script lang="js">let frm=$('form[name="iFormOVERVIEW"]');let btn=$("#frmSubmitButton");let im=new Inputmask({alias:'numeric',groupSeparator:' ',digits:0,digitsOptional:true,prefix:'',placeholder:'0'});im.mask($("#_cashRegisterInitialBalance"));$(document).on('click','#frmSubmitButton',function(){btn.btnLoad();uiBlock();if(!frm.required()){notify(frm.data('required'),0)
    btn.btnUnload();uiRelease();}else
    frm.submit();});let table=$('.datatable').DataTable({'dom':'tpi',"ajax":"https://demo.microware.cm/inspector/cashdesk/overview","processing":true,"serverSide":true,'paging':true,'ordering':true,"order":[[4,'desc']],"columnDefs":[{targets:0,searchable:true,orderable:false,visible:true,className:"text-start col-10 col-lg-4 align-middle font-primary"},{targets:1,searchable:false,orderable:false,visible:true,className:"text-end col-lg-4 align-middle font-primary d-none d-md-table-cell"},{targets:2,searchable:false,orderable:false,visible:true,className:"text-start col-lg-3 align-middle font-primary d-none d-md-table-cell"},{targets:3,searchable:false,orderable:false,visible:true,className:"text-end col-1 align-middle font-primary"},{targets:4,searchable:false,orderable:true,visible:false,}],pageLength:10,fnDrawCallback:function(oSettings){$(oSettings.nTHead).hide();},drawCallback:function(settings,json){$(function(){});}});$('#_cashRegisterName').on('keyup change clear',function(){table.search(this.value).draw();});</script><script lang="js">try{}catch(e){console.log(e)}</script></body>
</html>