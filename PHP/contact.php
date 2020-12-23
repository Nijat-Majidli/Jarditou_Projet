<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title> Contact </title>
    </head>


    <body>
        <div class="container border border-dark px-4 pb-4"> 
            <!-- PAGE HEAD -->
            <header>
                <!-- Logo Jarditou -->
                <div class="row">
                    <div class="col-5 p-3 d-none d-sm-none d-md-block">  
                        <img src="public/images/jarditou_logo.jpg" class="img-fluid" alt="logo">
                    </div>
                    <div class="col-7 pt-5 d-none d-sm-none d-md-block">  
                        <h1 class="text-right px-5 pt-5"> Tout le jardin </h1>
                    </div>
                </div>
                <!-- Navigation Bar -->
                <nav class="navbar navbar-expand-md navbar-light bg-light">
                    <a class="navbar-brand" href="#"> Jarditou.com </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                        <a class="nav-link" href="acceuil.php"> Acceuil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php"> Tableau </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="contact.php"> Contact </a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Rechercher </button>
                    </form>
                    </div>
                </nav>
                <!-- Image "Promotion sr lames de terrase" -->
                <div class="row">
                    <div class="col-12">
                        <img src="public/images/promotion.jpg" class="img-fluid w-100" alt="promotion">
                    </div>
                </div>
            </header>

            <!-- PAGE MAIN CONTENT -->
            <!-- Vos coordonnées -->
            <div class="col p-0">
                <p class="pt-3"> <sup>*</sup> Ces zones sont obligatoires </p>
                <h1 class="pb-3"> Vos Coordonnées </h1>
                <form>
                  <div class="form-group">
                    <label for="formGroupExampleInput1"> Nom <sup>*</sup> </label>
                    <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Veuillez saisir votre nom" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2"> Prénom <sup>*</sup> </label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Veuillez saisir votre prénom" required>
                  </div>
                </form>

                <p> Sexe <sup>*</sup> </p>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" required>
                  <label class="custom-control-label" for="customRadioInline1"> Féminin </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" required>
                  <label class="custom-control-label" for="customRadioInline2"> Masculin </label>
                </div>
                
                <form class="mt-4">
                  <div class="form-group">
                    <label for="formGroupExampleInput3"> Date de naissance <sup>*</sup> </label>
                    <input type="date" class="form-control" id="formGroupExampleInput3" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput4"> Code postal <sup>*</sup> </label>
                    <input type="text" class="form-control" id="formGroupExampleInput4" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput5"> Adresse </label>
                    <input type="text" class="form-control" id="formGroupExampleInput5">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput6"> Ville </label>
                    <input type="text" class="form-control" id="formGroupExampleInput6">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1"> Email <sup>*</sup> </label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="dave.loper@afpa.fr" required>
                  </div>
                </form>
                <!-- Votre demande -->
                <h1> Votre demande </h1>
                <form>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Sujet</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                          <option> Veuillez sélectionner un sujet </option>
                          <option> Mes commandes </option>
                          <option> Question sur un produit </option>
                          <option> Réclamation </option>
                          <option> Autres </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1"> Votre question <sup>*</sup> </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1"> J'accepte le traitement de ce formullaire. </label>
                  </div>
                  <button type="submit" class="btn btn-dark" onclick=controler()> Envoyer </button>
                  <button type="reset" class="btn btn-dark"> Annuler </button>
              </form>

            </div>

            <!-- PAGE FOOT -->
            <footer class="mt-3">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="#"> mentions légales <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"> horaires </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"> plan du site </a>
                        </li>
                      </ul>
                    </div>
                  </nav>
            </footer>
            
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
            
            <!-- Fichier Javascript -->
            <script src="javascript.js"> </script>
        </div>
    </body>
</html>