<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <script src="../bootstrap-5.2.0-beta1-dist/js/bootstrap.js" defer></script>
</head>

<body style="background-color:aliceblue;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div style="background-color:skyblue">
            <form class="border shadow p-3 rounded" style="width: 300px;" action="php/control.php" method="post">
                <h1 class="text-center p-3">Connexion</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label for="tel" class="form-label">Login</label>
                    <input type="text" class="form-control" id="tel" name="password">
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
            </form>
        </div>
    </div>


</body>

</html>