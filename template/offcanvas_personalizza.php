<!--PULSANTE PERSONALIZZA-->
<button class="btn btn-link text-white navbar_button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2"><span class="bi bi-stars"></span></button>
<!--MENU PERSONALIZZA-->
<div class="offcanvas offcanvas-end text-bg-dark " tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
    <div class="offcanvas-header pb-0">
    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Personalizza</h5>
        <button type="button" class="btn-close btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0">
    <hr class="text-white">
<?php
    require($templateParams["aside"]);
?>
    </div>
</div>