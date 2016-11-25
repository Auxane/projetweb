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

    <title>Modifier</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/camera.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style2.css" type="text/css" media="screen">
  
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.ui.totop.js" type="text/javascript"></script>  
    <script type="text/javascript" src="js/forms.js"></script>    
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
                    <h3> Ajouter un événement </h3>
                  </div>
                </div>
              </div>   
            </div>
          </div>
        </div>   
      </div>
    </header>

    <!-- Corps de la page!-->
    <section id="content">
      <div class="sub-content">
        <div class="container">
          <div class="row"> 
            <div class="span6">

              <div class="formulaire">
                <!-- Formulaire pour ajouter un événement dans la base de données!-->
                <form method="post" action="ajouter.php">
                  <fieldset>
            <!--nom de l'évènement!-->
                    <label class="name">   
                    <?php echo "event.php?id=".$id.""?>"        
                      <input type="text" name="nom" value=<?php echo $donnees["Nom"]?> onFocus="javascript:this.value=''"/>
                      <!--<span class="empty">*Champ requis</span> !-->  
                    </label>
           <!--lieu de l'évènement!-->
                    <label class="name">           
                      <input type="text" name="lieu" value=<?php echo $donnees["Lieu"];?> onFocus="javascript:this.value=''"/>
                      <!--<span class="error">*This is not a valid name address.</span> 
                      <span class="empty">*Champ requis</span> !-->  
                    </label>
            <!--date de l'évènement!--> 
                    <label class="date">
                      <input type="date" name="date" value=<?php echo $donnees["Date"];?> onFocus="javascript:this.value=''"/>   
                     <!-- <span class="error">*This is not a valid date.</span> 
                      <span class="empty">*Champ requis</span> !-->
                    </label>
            <!--type de l'évènement!-->
                    <select style="color:white;background-color:grey; " name="type" id="type" color="black">
                      <option value=<?php echo $donnees["Type"];?>>Type d'événement</option>
                      <option value="conférence">Conférence</option>
                      <option value="festival">Festival</option>
                      <option value="soiréé">Soirée</option>
                      <option value="concert">Concert</option>
                    </select>
           <!--prix de l'évènement!-->
                    <label class="prix:">
                      <input type="number" name=<?php echo $donnees["Prix"];?> onFocus="javascript:this.value=''"/>
                      (Prix)
                      <!--<span class="error">*This is not a valid price.</span>
                      <span class="empty">*Champ requis</span> !-->
                    </label>
            <!--contact de l'évènement!-->
                    <label class="name">           
                      <input type="text" name="organisateur" <?php echo $donnees["Organisateur"];?> onFocus="javascript:this.value=''"/>
                      <!--<span class="empty">*Champ requis</span> !-->  
                    </label>
                    <label class="email">           
                      <input type="email" name="email" value=<?php echo $donnees["Email"];?> onFocus="javascript:this.value=''"/>            
                      <!--<span class="error">*This is not a valid email address.</span> 
                      <span class="empty">*Champ requis</span>  !-->
                    </label>
                    <label class="phone">           
                      <input type="tel" name="telephone" value=<?php echo $donnees["Telephone"];?> onFocus="javascript:this.value=''"/>
                      <!--<span class="error">*This is not a valid phone number.</span>!-->
                    </label>
            <!--description de l'évènement!-->
                    <label class="message">           
                      <textarea name="Message" onFocus="javascript:this.value=''"/><?php echo $donnees["Message"];?></textarea> 
                      <!--<span class="error">*The message is too short.</span>
                      <span class="empty">*This field is required.</span> !-->  
                    </label>
                  </fieldset>
                  <div class="pull-right">
                    <a style="background-color:red;" href="ajouter.php" class="btn btn_ btn-small_">Tout effacer</a>
                    <input style="background-color:red;"  type="submit" class="btn btn_ btn-small_" value="Envoyer" href="event.php">
                   <!--<a href="#" class="btn btn_ btn-small_" data-type="submit">submit</a>!-->
                  </div>
                </form>
              </div>
            </div>  
          </div>           
        </div>
      </div>
    </section>

    <?php 
      if (isset($_POST['nom']) and isset($_POST['lieu']) and isset($_POST['date']) and isset($_POST['type']) and isset($_POST['prix']) and isset($_POST['organisateur']) and isset($_POST['email'])){
        $Nom=htmlspecialchars($_POST['nom']);
        $Lieu=htmlspecialchars($_POST['lieu']);
        $Date=htmlspecialchars($_POST['date']);
        $Type=htmlspecialchars($_POST['type']);
        $Prix=htmlspecialchars($_POST['prix']);
        $Organisateur=htmlspecialchars($_POST['organisateur']);
        $Email=htmlspecialchars($_POST['email']);
        $Telephone=htmlspecialchars($_POST['telephone']);
        $Message=htmlspecialchars($_POST['Message']);
       //on enregistre dans la base
        $base=$bdd->prepare('UPDATE event SET Nom = :Nom, Lieu = :Lieu, Date = :Date, Type = :Type, Prix= :Type, Organisateur = :Organisateur, Email = :Email, Telephone = :Telephone, Message = :Message WHERE Id='.$_GET['id'].'');
        $base->execute(array(
          'Nom'=>$Nom,
          'Lieu'=>$Lieu,
          'Date'=>$Date,
          'Type'=>$Type,
          'Prix'=>$Prix,
          'Organisateur'=>$Organisateur,
          'Email'=>$Email,
          'Telephone'=>$Telephone,
          'Message'=>$Message,
        ));
      }
    ?>

    <!-- Bas de la page!-->
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