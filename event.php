<!DOCTYPE html>

<html>

    <?php 
        try{
            $bdd=new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
            die('Erreur:'.$e->getMessage());
        }
    ?>

    <head>

        <title>event</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your keywords">
        <meta name="author" content="Your name">

        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/camera.css" type="text/css" media="screen"> 
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/camera.js"></script>
        <script src="js/jquery.ui.totop.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){   
                jQuery('.camera_wrap').camera();
            });    
        </script>       
        <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>

    </head>





    <body>

        <!--Entête de la page!-->
        <header class="p0">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="header-block clearfix">
                            <div class="clearfix header-block-pad">
                                <h1 class="brand">
                                    <a href="index.php">
                                        <img src="picture/nom.png" alt="">
                                    </a>
                                    <span>site collectif</span>
                                </h1>
                            </div>
                            <div class="navbar navbar_ clearfix">
                                <div class="navbar-inner navbar-inner_">
                                    <div class="container">
                                        <ul class="social-icons">
                                            <li>
                                                <a href="<?php echo "modifier.php?id=".$_GET["id"]."" ?>"><img src="picture/change_icon.jpg" alt=""></a></br>
                                                <li><a href="<?php echo "supprimer.php?id=".$_GET["id"]."" ?>" onclick="confirmation('&Ecirc;tes-vous sûr de vouloir supprimer cet &eacute;v&eacute;nement ?','supprimer.php')"><img src="picture/remove_icon.png" alt=""></a></li>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>   
            </div>
        </header>

        <!-- Corps de la page !-->
        <section id="content">
            <div class="sub-content">
                <div class="container">
                    <div class="row">
    	               <div class="span8">
        	               <div class="clearfix cols-1">
                                    <!-- Lien avec la base de données pour afficher l'événement choisit!-->
                                    <?php $liste=$bdd->query('SELECT * FROM event WHERE Id='.$_GET['id'].'');
                                        while($donnees=$liste->fetch()){
                                    ?>
                                            <p class="lead">
                                            <div class="pagination-centered">
                                                <figure class="img-indent"><img src="picture/soiree.jpg" class="img-radius" alt=""></figure>
                                                <h3> <?php echo $donnees["Nom"]?> </h3> <br>
                                            </div>
                                            <h5><?php echo $donnees['Date'];?></h5> <br>    
                                            <h5><?php echo $donnees['Lieu'];?></h5> <br>
                                            <p><?php echo $donnees['Type'];?></p> <br>
                                            <p>Prix:  <?php echo $donnees['Prix'];?>€</p> <br>
                                            <p><?php echo $donnees['Message'];?></p> <br>
                                            <br>
                                            <h6>contact organisateur:</h6> <br>
                                            <p><?php echo $donnees['Organisateur'];?></p> <br>
                                            <p><?php echo $donnees['Email'];?></p> <br>
                                            <p><?php echo $donnees['Telephone'];?></p> <br>
                                    <?php
                                        }
                                    ?>
                            </div>
                        </div>    
                    </div>        
                </div>
            </div>  
        </section>
    
        <!-- Bas de page!-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span8 float">
                        Studient Event Update   &copy;  2016  | More <a rel="nofollow" href="http://www.templatemonster.com/category.php?category=0&type=1" target="_blank"> at TemplateMonster.com</a>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="js/bootstrap.js"></script>
    
    </body>





</html>