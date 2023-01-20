<!--PULSANTE PERSONALIZZA-->
<button class="btn btn-link text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2"><em class="bi bi-stars"></em></button>
<!--MENU PERSONALIZZA-->
<div class="offcanvas offcanvas-end text-bg-dark " tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
    <div class="offcanvas-header pb-0">
    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Personalizza</h5>
        <button type="button" class="btn-close btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0">
    <hr class="text-white">
<h6 class="text-center text-white">Filtra per</h6>
<div class="form-check">
    <input class="form-check-input" type="radio" name="filtra" id="filtra_tutti">
    <label class="form-check-label text-white" for="filtra_tutti">Tutti</label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="filtra" id="filtra_preferiti" checked>
    <label class="form-check-label text-white" for="filtra_preferiti">Preferiti</label>
</div>
<hr class="text-white">
<h6 class="text-center text-white">Ordina per</h6>
<div class="form-check">
    <input class="form-check-input" type="radio" name="ordina" id="ordina_recenti">
    <label class="form-check-label text-white" for="ordina_recenti">Recenti</label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="ordina" id="ordina_popolari" checked>
    <label class="form-check-label text-white" for="ordina_popolari"> Popolari</label>
</div>
    </div>
</div>