<form action="impostazioni.php" method="POST" >
    <div class="row mx-1">
        <div class="col-1"></div>
        <div class="col-10 my-4 px-0">
            <h1 class="fs-5 pl-2">Dati Personali</h1>
            <div class="row ">
                <div class="col-2"></div>
                <div class="col-3 ml-5">
                    <img src="upload/atalanta.png" style="max-height: 92px;" alt="">
                </div>
                <div class="col-7">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nome"id="nome" placeholder="Luca">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="cognome" name="cognome"placeholder="Pasini">
                    </div>
                </div>
            </div>
            <hr class="text-black-50">
            <div class="col-12">
                <h1 class="fs-5">Username</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username"id="username" name="username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <hr class="text-black-50">
            </div>
            <div class="col-12">
                <h1 class="fs-5">Password</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-dark" form="cerca_utente" type="button" id="button_psw" name="button_psw"><i class="bi bi-eye-slash"></i></button>
                        <input type="text" class="form-control" placeholder="Password" id="password" name="password"aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <hr class="text-black-50">
            </div>
            <div class="col-12">
                <h1 class="fs-5">Mail</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="mail" class="form-control is-invalid" id="email" name="email" placeholder="Email.." aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <hr class="text-black-50">
                <input class="btn btn-info" type="submit" value="Conferma">
            </div>

        </div>
        <div class="col-1"></div>
    </div>
</form>