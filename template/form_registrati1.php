<form style="width: 22rem;" action="registrati.php" method="POST">
    <!-- Nome Cognome input -->
    <div class="mb-4 row g-3">
        <div class="col">
            <label for="reg_nome" hidden>Nome:</label> 
            <input type="text" maxlength="20" class="form-control" id="reg_nome" name="reg_nome" placeholder="Nome" aria-label="Nome" required>
        </div>
        <div class="col">
            <label for="reg_cognome" hidden>Cognome:</label> 
            <input type="text" maxlength="20" class="form-control" id="reg_cognome" name="reg_cognome" placeholder="Cognome" aria-label="Cognome" required>
        </div>
    </div>
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" maxlength="50" id="reg_email" name="reg_email" class="form-control" placeholder="Email" required>
        <label class="form-label" for="reg_email" style="margin-left: 0px;" hidden>Email</label>
        <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 64px;"></div>
            <div class="form-notch-trailing"></div>
        </div>
    </div>
    <!-- Username input -->
    <div class="row g-1">
        <div class="col">
            <div class="input-group mb-4">
                <label for="reg_username" hidden>Username:</label> 
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" maxlength="20" class="form-control" id="reg_username" name="reg_username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
        </div>
        <div class="col-1 px-0 text-center">
            <button type="button" class="btn px-0" data-bs-toggle="popover" title="Attenzione!" data-bs-content="L'username non può essere cambiato. Sceglilo attentamente." data-bs-html="true"><span class="bi bi-info-circle"></span></button>
        </div>
    </div>
    <!-- Password input -->
    <div class="row g-1">
        <div class="col">
            <div class="input-group mb-4">
                <label for="reg_password" hidden>Password</label>
                <button onclick='switchPasswordVisibility("reg_password")' class="btn border" type="button" id="basic-addon2"><span id="eye-icon" class="bi bi-eye"></span></button>
                <input type="password" maxlength="20" minlength="8" id="reg_password" name="reg_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
            </div>
        </div>
        <div class="col-1 px-0 text-center">
            <button type="button" class="btn px-0" data-bs-toggle="popover" title="Requisiti" data-bs-content="8 caratteri di cui:<br />1 maiuscola<br />1 minuscola<br />1 numero<br />1 carattere speciale" data-bs-html="true"><span class="bi bi-info-circle"></span></button>
        </div>
    </div>
    <div class="col-12 mb-4 text-danger">
        <?php
        if(isset($templateParams["messaggio_errore_password"])){
            echo $templateParams["messaggio_errore_password"];
            echo "<br/>";
        }
        if(isset($templateParams["messaggio_errore_username"])){
            echo $templateParams["messaggio_errore_username"];
            echo "<br/>";
        }
        ?>
    </div>
    <!-- Continua button -->
    <div class="d-grid col-5">
        <input type="submit" value="Continua" class="btn btn-primary btn-block w-20">
    </div>    
</form>