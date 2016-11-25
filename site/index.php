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

    <title>Home</title>

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
                      <h6> Ajouter un événement </h6>
                      <li><a href="ajouter.php"><img src="picture/add_icon.png" alt=""></a></li>
                    </ul>
                  </div>
                </div>
              </div>   
            </div>
          </div>
        </div>   
      </div>
    </header>
	
    <!-- Corp de la page!-->
    <section id="content" class="main-content">
      <div class="container">
		  	<div class="slider">
          <div class="camera_wrap">
          <div data-src="picture/concert.jpg"></div>
       		<div data-src="picture/soiree.jpg"></div>
       		<div data-src="picture/conference.jpg"></div>
    		</div>
			</div>
   		<div class="row">
   			<div class="span12">        
     			<ul class="thumbnails">
            <!-- Nombre d'événement à afficher par page!-->
     				<?php 
              $totalMessage=$bdd->query('SELECT COUNT(*) AS nb_total FROM event');
              $donneesTotal=$totalMessage->fetch();
              $NbMessage=$donneesTotal['nb_total'];
              $MessagesParPage=8;
              $nombreDePages=ceil($NbMessage/$MessagesParPage);
              echo 'Page : ';
            ?>
            <div ID=paginationauto>
              <?php
                for ($i = 1 ; $i <= $nombreDePages ; $i++){
                  echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
                }
                if (isset($_GET['page'])){
                  $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (index.php?)
                }
                else{
                  $page = 1;
                }
              ?>
            </div>
            <?php
              $premierMessageAafficher = ($page - 1) * $MessagesParPage;
              $liste=$bdd->query('SELECT * FROM event ORDER BY Date DESC LIMIT '.$premierMessageAafficher.','.$MessagesParPage.'');
              while($donnees=$liste->fetch())
            {?>
            <li class="span3">
              <div class="thumbnail">
                <div class="caption">
                  <img src="picture/event.png" alt="">
                  <h3><?php echo $donnees['Nom'];?></h3>
                </div>  
                <div class="thumbnail-pad">
                  <p><?php echo $donnees['Lieu'];?><br><?php echo $donnees['Date'];?><br><?php echo $donnees['Type'];?></p>
                  <?php $id=$donnees["Id"];?>
                    <a href="<?php echo "event.php?id=".$id.""?>" class="btn btn_">plus d'infos</a>
                  </div>
                </div>
                <?php
                }
                ?>
       				</li>
       			</ul>
    			</div>
    		</div>        
  		</div>
  	</section>

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