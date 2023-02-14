<form class="form_style" action="index.php" method="POST">
    <!-- Username input -->
    <div class="form-outline mb-4">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
        <label class="form-label" for="username" hidden>Username</label>
        <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 88px;"></div>
            <div class="form-notch-trailing"></div>
        </div>
    </div>
    


    
    <div class="input-group mb-4">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
        <label class="form-label" for="password" hidden>Password</label>
        <button onclick='switchPasswordVisibility("password")' class="btn border" type="button" id="basic-addon2"><span id="eye-icon" class="bi bi-eye"></span></button>
    </div>
    <?php if (isset($templateParams["errorelogin"])) { ?>
        <div class="col-12 mt-4 text-center text-danger">
            <?php echo $templateParams["errorelogin"]; ?>
        </div>
    <?php } ?>
    <!-- Submit button -->
    <div class="d-grid col-5 mx-auto mt-4">
        <input type="submit" value="Accedi" class="btn btn-primary btn-block w-20">
    </div>

    <hr class="text-dark">
    <div class="col-12 text-center ">
        oppure
    </div>
    <div class="col d-flex justify-content-center">
        <a href="registrati.php" role="button" class="btn btn-info btn-block my-4" id="button_registrati">Registrati</a>
    </div>
</form>