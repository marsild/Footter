<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Footter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="overflow-hidden">
  <div class="container-fluid p-0 overflow-hidden">
    <div class="row">
      <div class="col-12 ">
          <header class="bg-dark text-center py-2 fs-4 text-white ">
              Footter
          </header>
      </div>
  </div>

  <div class="row">
      <div class="col-12">
        <div class = "fs-5 text-center mt-4 col-12">
          Scendi in campo
        </div>
          <section class="w-100 p-4 d-flex justify-content-center pb-4">
        
              <form style="width: 22rem;">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form2Example1" class="form-control" placeholder="Username">
                  <label class="form-label" for="form2Example1" style="margin-left: 0px;" hidden>Email address</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88px;"></div><div class="form-notch-trailing"></div></div></div>
        
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" placeholder="Password">
                  <label class="form-label" for="form2Example2" style="margin-left: 0px;" hidden>Password</label>
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>
        
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-start">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked="">
                      <label class="form-check-label" for="form2Example31"> Ricordami </label>
                    </div>
                  </div>
                </div>
        
                <!-- Submit button -->
                <div class="d-grid col-5 mx-auto">
                  <a href="home.php" role="button" class="btn btn-primary btn-block w-20">Accedi</a>
                </div>
                
                <hr class="text-dark">
                <div class="col-12 text-center ">
                  oppure
                </div> 
                <div class="col d-flex justify-content-center">
                  
                  <a href="#" role="button" class="btn btn-info btn-block my-4">Registrati</a>
                </div>
              </form>
            </section>
      </div>
  </div>
  </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
crossorigin="anonymous"></script>
</body>

</html>