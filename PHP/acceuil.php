<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- Responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS 4.5.3 import from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title> Acceuil </title>
    </head>


    <body>
        <div class="container"> 
            <!-- PAGE HEAD -->
            <header> 
                <!-- Logo Jarditou -->
                <div class="row">
                    <div class="col-3 p-3 d-none d-sm-none d-md-block">  
                        <img src="public/images/jarditou_logo.jpg" class="img-fluid" alt="logo">
                    </div>
                    <div class="col-9 d-none d-sm-none d-md-block">  
                        <h1 class="text-right px-5 py-3"> <b>La qualité depuis 70 ans</b> </h1>
                    </div>
                </div>
                <!-- Navigation Bar -->
                    <nav class="navbar navbar-expand-md navbar-light" style="background-color:lightgray; border-radius: 10px;">
                        <!-- Collapsing The Navigation Bar -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="col-12 navbar-nav mr-auto mt-2 mt-lg-0 nav justify-content-center" style="font-size: xx-large">
                                <li class="nav-item" style="margin-left: 50px;">
                                <a class="nav-link" href="acceuil.php"> Acceuil <span class="sr-only">(current)</span> </a>
                                </li>
                                <li class="nav-item" style="margin-left: 50px;">
                                <a class="nav-link" href="index.php"> Tableau </a>
                                </li>
                                <li class="nav-item" style="margin-left: 50px;">
                                <a class="nav-link" href="contact.php"> Contact </a>
                                </li>
                            </ul>
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
            <div class="row mx-auto" style="font-family:Arial, Helvetica, sans-serif">
                <div class="col-12 col-lg-8 p-3">
                    <article> 
                        <h2> L'entreprise </h2>
                        <p> Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme. </p>
                        <p> Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés. </p>
                        <p> Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie </p>
                    </article>  
            
                    <article> 
                        <h2> Qualité </h2>
                        <p> Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet. Vous serez séduit par notre expertise, nos compétences et notre sérieux. </p>
                    </article> 
    
                    <article> 
                        <h2> Devis gratuit  </h2>
                        <p> Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum vitae dolore saepe est sequi, ipsam voluptatum accusantium officiis laboriosam praesentium vero, necessitatibus eos id commodi dolorem culpa facilis ab minus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    </article> 
                </div>
                <!-- COLONNE DROITE -->
                <div class="col-12 col-lg-4 bg-warning" style="margin-top: 20px;">
                    <aside class="h2 p-4"> [Colonne de droite] </aside>
                </div>
            </div>


            <!-- PAGE FOOT -->
            <footer class="mt-3"  style="margin-bottom:20px">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 10px;">
                     <!-- Collapsing The Navigation Bar -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="col-12 navbar-nav" style="font-size:x-large">
                        <li class="nav-item" style="margin: 0 50px;">
                          <a class="nav-link" href="#"> Mentions légales <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item" style="margin: 0 50px;">
                          <a class="nav-link" href="#"> Horaires </a>
                        </li>
                        <li class="nav-item" style="margin: 0 50px;">
                          <a class="nav-link" href="#"> Plan du site </a>
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
            
        </div>
    </body>
</html>