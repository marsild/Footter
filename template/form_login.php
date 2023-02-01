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
    


    
    <div class="form-outline mb-4">
        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
        <label class="form-label" for="password" hidden>Password</label>
        <div class="form-notch">
            <div class="form-notch-leading" style="width: 9px;"></div>
            <div class="form-notch-middle" style="width: 64px;"></div>
            <div class="form-notch-trailing"></div>
        </div>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row">
        <div class="col d-flex justify-content-start">
            <!-- Checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked="">
                <label class="form-check-label" for="form2Example31"> Ricordami </label>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4 text-center text-danger">
        <?php
        if (isset($templateParams["errorelogin"])) {
            echo $templateParams["errorelogin"];
        }
        ?>
    </div>
    <!-- Submit button -->
    <div class="d-grid col-5 mx-auto mt-4">
        <input type="submit" value="Accedi" class="btn btn-primary btn-block w-20">
    </div>

    <hr class="text-dark">
    <div class="col-12 text-center ">
        oppure
    </div>
    <div class="col d-flex justify-content-center">
        <a href="registrati.php" role="button" class="btn btn-info btn-block my-4">Registrati</a>
    </div>
</form>