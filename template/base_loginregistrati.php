<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Footter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                <div class="fs-5 text-center mt-4 col-12">
                    <?php echo $templateParams["intestazione_loginregistrati"]; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <section class="w-100 p-4 d-flex justify-content-center">
                    <?php
                    if (isset($templateParams["form_loginregistrati"])) {
                        require($templateParams["form_loginregistrati"]);
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/like.js"></script>
</body>

</html>