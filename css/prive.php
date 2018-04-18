<?php
session_start();
require_once 'connection.php';

function verif($conn){
    $sql="SELECT 
            `id_user`,
            `email_user`,
            `password_user`,
            `first_connection`,
            `profil_id_user`
        FROM 
            `user` 
        WHERE 
        `email_user`=:email
	;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $_SESSION['mail']);
    $stmt->execute();
    errorHandler($stmt);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($row);

    if($_SESSION['pass'] == $row["password_user"]){

        //header('location:home');
    }else{
        session_unset();
        header('location:test');


    }

}
if(!isset($_SESSION['mail']) || !isset($_SESSION['pass']) || !isset($_SESSION['pid'])){
    header('location:test');
}
verif($conn); ?>

<?php
require_once 'connection.php';
require_once 'profilFunctions.php';
require_once 'getFriends.php';
session_start();

$infoProfil = getInfoProfil($_SESSION['pid'],$conn);
$tagsProfil = getTagsProfil($_SESSION['pid'], $conn);
$projetProfil = getProjetProfil($_SESSION['pid'], $conn);
$getPwd = getUserPwd($_SESSION['pid'], $conn);
$res = getTags($conn);


$friends = viewFriends($_SESSION['pid'],$conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/canvas.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="JS/script.js"></script>
    <script src="JS/scriptModal.js"></script>
    <title>MagnHETIC</title>
</head>
<body>
<header>
    <nav>
        <a href="home.php"><img src="img/magnet.svg" alt="logo magnHETIC" id="logo"></a>
        <div id="trait"></div>
        <a href="home.php"><i class="fas fa-search"></i></a>
        <div id="trait"></div>
        <a href="prive.php"><img src="img/default.png" alt="ma photo" id="maPhoto"></a>
        <a href="logout.php"><img src="img/deco.svg" alt="deco" id="deco"></a>
    </nav>
    <img src="img/wave.svg" id="wave" alt="wave">
</header>
    <main>
           
        <section class="myProfil">
            <article id="myBio">
                <img src="img/default.png" alt="ma photo">
                <form action="updateProfil.php" method="GET">
                    <input type="hidden" value=<? echo $_SESSION['pid']?> name="id_profil">
                    <p><label for="male">Pseudonyme : </label>
                        <input type="text" placeholder="Votre pseudo" value="<?= $infoProfil[0]["pseudo_profil"] ?>" name="pseudo_profil"></p>
                    <p><label for="male">Email : </label>
                        <input type="text" placeholder="Votre adresse email" value="<?= $infoProfil[0]["email_profil"] ?>" name="email_profil"></p>
                    <p><label for="male">Adresse : </label>
                        <input type="text" placeholder="Votre adresse" value="<?= $infoProfil[0]["lieu_profil"] ?>" name="lieu_profil"></p>
                    <p><label for="male">Promotion : </label>
                        <input type="text" placeholder="Votre promotion" value="<?= $infoProfil[0]["classe_profil"] ?>" name="classe_profil"></p>
                    <p><label for="male">Votre biographie : </label><br><br>
                        <textarea rows="8" cols="35" name="bio_profil" placeholder="Vous pouvez écrire à propos de vous-même ici..."><?= $infoProfil[0]["bio_profil"] ?></textarea></p>
            </article>
            <article>

                <style>
                    svg{max-height:100%;
                        max-width:100%}
                </style>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 571.98 600">
                    <title>canvasmap_1</title>
                    <g id="Calque_2" data-name="Calque 2">
                        <g id="Calque_1-2" data-name="Calque 1">
                            <circle class="cls-0" cx="295.55" cy="304.16" r="69.71"/>
                            <path id="cls-1" class="cls-1" d="M343.81,116a48.92,48.92,0,1,0-59.16,47.84v80.37h21v-80.5A48.92,48.92,0,0,0,343.81,116Z"/>
                            <path id="cls-2" class="cls-2" d="M246,265.52H162a48.92,48.92,0,1,0,.12,21H246Z"/>
                            <path id="cls-3" class="cls-3" d="M256.12,352.16V331.33H180.33v105.5A48.94,48.94,0,1,0,201,437V352.16Z"/>
                            <path id="cls-4" class="cls-4" d="M431,402.39V331.86H325.08v20.65h85.07v50a48.9,48.9,0,1,0,20.83-.16Z"/>
                            <path id="cls-5" class="cls-5" d="M454.87,164.88a48.93,48.93,0,0,0-47.64,37.8H333.48v69.49h20.31V223.69H407a48.92,48.92,0,1,0,47.92-58.81Z"/>

                            <circle id="cls-20" class="cls-2" cx="28.49" cy="276.28" r="28.49"/>
                            <circle id="cls-21" class="cls-2" cx="44.57" cy="218.52" r="20.77"/>
                            <circle id="cls-22" class="cls-2" cx="44.57" cy="334.04" r="20.77"/>
                            <circle id="cls-23" class="cls-2" cx="84.43" cy="370.83" r="20.77"/>
                            <circle id="cls-24" class="cls-2" cx="84.43" cy="181.74" r="20.77"/>
                            <a href="#"  id="cls-25" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="67" y="164" height="35px" width="35px"></image></a>
                            <a href="#"  id="cls-26" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="28" y="201" height="35px" width="35px"></image></a>
                            <a href="#"  id="cls-27" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="4" y="251" height="50px" width="50px"></image></a>
                            <a href="#"  id="cls-28" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="28" y="316" height="35px" width="35px"></image></a>
                            <a href="#"  id="cls-29" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="67" y="354" height="35px" width="35px"></image></a>

                            <circle id="cls-30" class="cls-3" cx="189.87" cy="571.51" r="28.49"/>
                            <circle id="cls-31" class="cls-3" cx="132.11" cy="555.43" r="20.77"/>
                            <circle id="cls-32" class="cls-3" cx="247.63" cy="555.43" r="20.77"/>
                            <circle id="cls-33" class="cls-3" cx="284.41" cy="515.58" r="20.77"/>
                            <circle id="cls-34" class="cls-3" cx="95.33" cy="515.58" r="20.77"/>
                            <a href="#" id="cls-35" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="78" y="498" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-36" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="115" y="538" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-37" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="166" y="547" height="50px" width="50px"></image></a>
                            <a href="#" id="cls-38" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="230" y="538" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-39" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="267" y="498" height="35px" width="35px"></image></a>

                            <circle id="cls-40" class="cls-4" cx="420.49" cy="535.31" r="28.49"/>
                            <circle id="cls-41" class="cls-4" cx="362.73" cy="519.22" r="20.77"/>
                            <circle id="cls-42" class="cls-4" cx="478.25" cy="519.22" r="20.77"/>
                            <circle id="cls-43" class="cls-4" cx="515.03" cy="479.37" r="20.77"/>
                            <circle id="cls-44" class="cls-4" cx="325.95" cy="479.37" r="20.77"/>
                            <a href="#" id="cls-45" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="309" y="462" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-46" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="346" y="502" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-47" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="396" y="510" height="50px" width="50px"></image></a>
                            <a href="#" id="cls-48" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="461" y="502" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-49" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="498" y="462" height="35px" width="35px"></image></a>

                            <circle id="cls-50" class="cls-5" cx="543.5" cy="218.52" r="28.49"/>
                            <circle id="cls-51" class="cls-5" cx="527.41" cy="276.28" r="20.77"/>
                            <circle id="cls-52" class="cls-5" cx="527.41" cy="160.76" r="20.77"/>
                            <circle id="cls-53" class="cls-5" cx="487.56" cy="123.98" r="20.77"/>
                            <circle id="cls-54" class="cls-5" cx="487.56" cy="313.07" r="20.77"/>
                            <a href="#" id="cls-55" class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="470" y="106" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-56" class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="510" y="143" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-57" class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="520" y="193" height="50px" width="50px"></image></a>
                            <a href="#" id="cls-58" class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="510" y="259" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-59" class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="470" y="296" height="35px" width="35px"></image></a>

                            <circle id="cls-10" class="cls-1" cx="297.5" cy="28.49" r="28.49"/>
                            <circle id="cls-11" class="cls-1" cx="355.26" cy="44.57" r="20.77"/>
                            <circle id="cls-12" class="cls-1" cx="239.74" cy="44.57" r="20.77"/>
                            <circle id="cls-13" class="cls-1" cx="202.95" cy="84.43" r="20.77"/>
                            <circle id="cls-14" class="cls-1" cx="392.04" cy="84.43" r="20.77"/>
                            <a href="#" id="cls-15" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="186" y="67" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-16" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="223" y="27" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-17" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="273" y="3" height="50px" width="50px"></image></a>
                            <a href="#" id="cls-18" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="338" y="27" height="35px" width="35px"></image></a>
                            <a href="#" id="cls-19" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="375" y="67" height="35px" width="35px"></image></a>



                            <image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="235" y="240" height="120px" width="120px"></image>
                            <a xlink:title="<?php if (isset($friends[1])){$here = $friends[1]; echo $here['pseudo_profil'];} ?>" href="profil.php?id_profil=<?php if (isset($friends[1])){$here = $friends[1]; echo $here['id_profil'];} ?>" id="cls-1a" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="255" y="75" height="80px" width="80px"></image></a>
                            <a xlink:title="<?php if (isset($friends[4])){$here = $friends[4]; echo $here['pseudo_profil'];} ?>" href="profil.php?id_profil=<?php if (isset($friends[4])){$here = $friends[4]; echo $here['id_profil'];} ?>" id="cls-2a" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="75" y="240" height="80px" width="80px"></image></a>
                            <a xlink:title="<?php if (isset($friends[0])){$here = $friends[0]; echo $here['pseudo_profil'];} ?>" href="profil.php?id_profil=<?php if (isset($friends[0])){$here = $friends[0]; echo $here['id_profil'];} ?>" id="cls-3a" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="150" y="445" height="80px" width="80px"></image></a>
                            <a xlink:title="<?php if (isset($friends[2])){$here = $friends[2]; echo $here['pseudo_profil'];} ?>" href="profil.php?id_profil=<?php if (isset($friends[2])){$here = $friends[2]; echo $here['id_profil'];} ?>" id="cls-4a" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="380" y="410" height="80px" width="80px"></image></a>
                            <a xlink:title="<?php if (isset($friends[3])){$here = $friends[3]; echo $here['pseudo_profil'];} ?>" href="profil.php?id_profil=<?php if (isset($friends[3])){$here = $friends[3]; echo $here['id_profil'];} ?>" id="cls-5a" class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="415" y="175" height="80px" width="80px"></image></a>
                        </g>
                    </g>
                    </g>
                </svg>
            </article>
            <article>
                <p>
                    <?php if($infoProfil[0]["dispo_profil"] == "1") { ?>
                        <input type="checkbox" value="1" name="dispo_profil" checked>Je suis disponible
                    <?php } else{ ?>
                        <input type="checkbox" value="1" name="dispo_profil" >Je suis disponible
                    <?php } ?>
                </p>
                <p><input type="password" value="<?= $getPwd[0]["password_user"] ?>" name="new_pwd"></p>
                <input type="submit" value="Mettre à jour mon profil">
                </form>
            </article>
        </section>

        <section class="onglets">
                <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'competence')">Je sais faire</button>
                        <button class="tablinks" onclick="openCity(event, 'hobby')">Je veux faire</button>
                        <button class="tablinks" onclick="openCity(event, 'projet')">Mes projets</button>
                </div>
        </section>
        <section class="myChoice">
                      <div id="competence" class="tabcontent">
                          <div id="modalAddTag" class="modal">
                              <!-- Modal content -->
                              <div class="modal-content">
                                  <span class="close1">&times;</span>
                                  <form action="addTag.php" method="GET">
                                      <input type="hidden" name="id_profil" value=<?= $_SESSION['pid'] ?>>
                                      <input type="hidden" name="type_tag" value=1 >
                                      Liste des tags : <select name="id_tag">
                                          <?php
                                          foreach($res as $tagListe){
                                              echo '<option value='.$tagListe['id_tag'].'>'.$tagListe['name_tag'].' - '.$tagListe['categorie_tag'].'</option>';
                                          }
                                          ?>
                                      </select>
                                      <p><textarea name="desc_tag" rows="4" cols="50"></textarea></p>
                                      <input type="submit" value="Ajouter ma compétence">
                                  </form>
                              </div>
                          </div>
                          <article id="compPriv">
                              <?php
                              foreach($tagsProfil as $tag){
                                  if($tag['type_tag']=="competence"){
                                      echo '<div class="formComp">';
                                      echo '<form action="updateTagProfil.php" method="GET">';
                                      echo '<input type="hidden" name="type_tag" value=1 >';
                                      echo '<input type="hidden" value='.$tag['id_profil_tag'].' name="id_profil_tag">';
                                      echo '<p>Tag : '.$tag['name_tag'].'</p>';
                                      echo '<p>Categorie : '.$tag['categorie_tag'].'</p>';
                                      echo '<textarea name="desc_tag" rows="4" cols="50">'.$tag['desc_tag'].'</textarea>';
                                      if($tag['vitrine_profil_tag']=="1"){
                                          echo '<input class="single-checkbox" type="checkbox" name="vitrine_profil_tag" value="1" checked>Compétence en vitrine';
                                      }
                                      else{
                                          echo '<input class="single-checkbox" type="checkbox" name="vitrine_profil_tag" value="1">Compétence en vitrine';
                                      }
                                      if($tag['tag_fav']=="1"){
                                          echo '<input class="fav_checkbox" type="checkbox" name="tag_fav" value="1" checked disabled> Tag favorisé';
                                      }
                                      else{
                                          echo '<input class="fav_checkbox" type="checkbox" name="tag_fav" value="1" disabled> Tag favorisé';
                                      }

                                      echo '<input class="majcomp" type="submit" value="Mettre à jour">';
                                      echo '</form></div>';
                                  }
                              }
                              ?>
                              <div class="formComp"><button id="btnAddTag"><i class="fas fa-plus"></i></button></div><br>
                          </article>
                      </div>
                      <div id="hobby" class="tabcontent">
                          <span id="modalAddHob" class="modal">
                              <!-- Modal content -->
                              <aside class="modal-content">
                                  <span id="close2" class="close2">&times;</span>
                                  <form action="addTag.php" method="GET">
                                      <input type="hidden" name="id_profil" value=<?= $_SESSION['pid'] ?>>
                                      <input type="hidden" name="type_tag" value=2 >
                                      Liste des tags : <select name="id_tag">
                                          <?php
                                          foreach($res as $tagListe){
                                              echo '<option value='.$tagListe['id_tag'].'>'.$tagListe['name_tag'].' - '.$tagListe['categorie_tag'].'</option>';
                                          }
                                          ?>
                                      </select>
                                      <p><textarea name="desc_tag" rows="4" cols="50"></textarea></p>
                                      <input type="submit" value="Ajouter mon centre d'intérêt">
                                  </form>
                              </aside>
                          </span>
                          <button id="btnAddHob">Ajouter un centre d'intérêt</button><br>
                          <article>
                              <?php
                              foreach($tagsProfil as $tag){
                                  if($tag['type_tag']=="envie"){
                                      echo '<div>';
                                      echo '<form action="updateTagProfil.php" method="GET">';
                                      echo '<input type="hidden" name="type_tag" value=2 >';
                                      echo '<input type="hidden" value='.$tag['id_profil_tag'].' name="id_profil_tag">';
                                      echo '<p>Tag : '.$tag['name_tag'].'</p>';
                                      echo '<p>Categorie : '.$tag['categorie_tag'].'</p>';
                                      echo '<p><label for="male">Description : </label></p>';
                                      echo '<textarea name="desc_tag" rows="4" cols="50">'.$tag['desc_tag'].'</textarea>';
                                      echo '<input type="submit" value="Mettre à jour">';
                                      echo '</form></div>';
                                  }
                              }
                              ?>
                          </article>
                      </div>
                      <div id="projet" class="tabcontent">
                          <span id="modalAddProject" class="modal">
                              <!-- Modal content -->
                              <aside class="modal-content">
                                  <span class="close3">&times;</span>
                                  <form action="createProject.php" method="get">
                                      <input type="hidden" value=<?= $_SESSION['pid'] ?> name="id_owner">
                                      <input type="hidden" value=<?= $_SESSION['pid'] ?> name="id_partner">
                                      Nom projet : <br><input type="text" name="name_projet"><br>
                                      Description projet : <br><textarea rows="4" cols="50" name="desc_projet"></textarea><br>
                                      <input type="checkbox" name="finish_projet" value="1"> Projet achevé<br><br>
                                      <input type="submit" value="créer un nouveau projet">
                                  </form>
                              </aside>
                          </span>
                          <button id="btnAddProject">Créer un nouveau projet</button><br>
                          <article>
                                  <?php
                                  foreach($projetProfil as $projet){
                                      $i = 0;
                                      echo '<form action="detailsTag.php" method="post">';
                                      echo '<input type="hidden" value=1 name="isProject">';
                                      echo '<input type="hidden" value='.$projet['id_projet_profil'].' name="id_projet_profil">';
                                      echo '<input type="submit" value="Voir projet">';
                                      echo '<input type="submit" value="SUPPRIMER PROJET">';
                                      echo '<p>'.$projet['name_projet'].' | ';
                                      if($projet['finish_projet'] == "1"){
                                          echo ' FINI | ';
                                      }else{
                                          echo ' EN COURS | ';
                                      }
                                      $equipeProjet = getEquipeProjet($projet['projet_id_projet'], $conn);
                                      echo '<b>Equipe : </b>';
                                      foreach($equipeProjet as $equipe){
                                          echo '<i>'.$equipe['pseudo_profil'].'</i>';
                                          ++$i;
                                          if($i != count($equipeProjet)){
                                              echo ' - ';
                                          }
                                          else{
                                              echo '</p>';
                                          }
                                      }
                                  }
                                  ?>
                          </article>
                      </div>
        </section>
        <script>
            openCity(event, 'competence');
        </script>
        <script src="JS/canvas.js"></script>
        <script>

            creatCanvas(<?php echo count($friends)?>);
        </script>
        
    </main>
<footer>

    <article>
        <a href="FAQ.html">F.A.Q</a>
    </article>
    <article>
        <a href="Plan-du-site.html">Plan du site</a>
    </article>
    <article>
        <a href="MentionLegal.html">Mentions Légales</a>
    </article>

</footer>

</body>
<script src="JS/scriptCheckbox.js"></script>
<script src="JS/checkmin.js"></script>
</html>