<form style="width: 22rem;" action="registrati.php" method="POST">
    <!-- Nome Cognome input -->
    <div class="mb-4 row g-3">
        <div class="col">
            <input type="text" class="form-control" id="reg_nome" name="reg_nome" placeholder="Nome" aria-label="Nome" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="reg_cognome" name="reg_cognome" placeholder="Cognome" aria-label="Cognome" required>
        </div>
    </div>
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" id="reg_email" name="reg_email" class="form-control" placeholder="Email" required>
        <label class="form-label" for="reg_email" style="margin-left: 0px;" hidden>Email</label>
        <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 64px;"></div>
            <div class="form-notch-trailing"></div>
        </div>
    </div>
    <!-- Username input -->
    <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="reg_password" name="reg_password" class="form-control" placeholder="Password" required>
        <label class="form-label" for="reg_password" style="margin-left: 0px;" hidden>Password</label>
        <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 64px;"></div>
            <div class="form-notch-trailing"></div>
        </div>
    </div>

    <!-- Continua button -->
    <div class="d-grid col-5">
        <input type="submit" value="Continua" class="btn btn-primary btn-block w-20">
    </div>
</form>