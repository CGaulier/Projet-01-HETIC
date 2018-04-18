<?php
require_once 'connection.php';
require_once 'profilFunctions.php';
session_start();

$infoProfil = getInfoProfil($_GET['id_profil'],$conn);
$tagsProfil = getTagsProfil($_GET['id_profil'], $conn);
$projetProfil = getProjetProfil($_GET['id_profil'], $conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/canvas.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="JS/script.js"></script>
    <title>MagnHETIC</title>
</head>
<body>
    <header>
        <nav>
            <a href=""><img src="img/magnet.svg" alt="logo magnHETIC" id="logo"></a>
            <i class="fas fa-search"></i>
    <a href="profil.html"><img src="img/profil.jpg" alt="ma photo" id="maPhoto"></a>
    </nav>
    <img src="img/wave.svg" id="wave" alt="wave">
    </header>
    <main>
           
        <section class="myProfil">
            <article id="myBio">
                <h1>Son profil</h1>
                <img src="img/profil.jpg" alt="ma photo">
                <p><?= $infoProfil[0]["pseudo_profil"] ?></p>
                <p><?= $infoProfil[0]["email_profil"] ?></p>
                <p>Adresse : <?= $infoProfil[0]["lieu_profil"] ?></p>
                <p>Classe : <?= $infoProfil[0]["classe_profil"] ?></p>
                <p>Bio : <?= $infoProfil[0]["bio_profil"] ?></p>
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
                            <path class="cls-1" d="M343.81,116a48.92,48.92,0,1,0-59.16,47.84v80.37h21v-80.5A48.92,48.92,0,0,0,343.81,116Z"/>
                            <path class="cls-2" d="M246,265.52H162a48.92,48.92,0,1,0,.12,21H246Z"/>
                            <path class="cls-3" d="M256.12,352.16V331.33H180.33v105.5A48.94,48.94,0,1,0,201,437V352.16Z"/>
                            <path class="cls-4" d="M431,402.39V331.86H325.08v20.65h85.07v50a48.9,48.9,0,1,0,20.83-.16Z"/>
                            <path class="cls-5" d="M454.87,164.88a48.93,48.93,0,0,0-47.64,37.8H333.48v69.49h20.31V223.69H407a48.92,48.92,0,1,0,47.92-58.81Z"/>

                            <circle class="cls-2" cx="28.49" cy="276.28" r="28.49"/>
                            <circle class="cls-2" cx="44.57" cy="218.52" r="20.77"/>
                            <circle class="cls-2" cx="44.57" cy="334.04" r="20.77"/>
                            <circle class="cls-2" cx="84.43" cy="370.83" r="20.77"/>
                            <circle class="cls-2" cx="84.43" cy="181.74" r="20.77"/>
                            <a href="#" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="67" y="164" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="28" y="201" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="4" y="251" height="50px" width="50px"></image></a>
                            <a href="#" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="28" y="316" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="67" y="354" height="35px" width="35px"></image></a>

                            <circle class="cls-3" cx="189.87" cy="571.51" r="28.49"/>
                            <circle class="cls-3" cx="132.11" cy="555.43" r="20.77"/>
                            <circle class="cls-3" cx="247.63" cy="555.43" r="20.77"/>
                            <circle class="cls-3" cx="284.41" cy="515.58" r="20.77"/>
                            <circle class="cls-3" cx="95.33" cy="515.58" r="20.77"/>
                            <a href="#" id="test" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="78" y="498" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="115" y="538" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="166" y="547" height="50px" width="50px"></image></a>
                            <a href="#" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="230" y="538" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="267" y="498" height="35px" width="35px"></image></a>

                            <circle class="cls-4" cx="420.49" cy="535.31" r="28.49"/>
                            <circle class="cls-4" cx="362.73" cy="519.22" r="20.77"/>
                            <circle class="cls-4" cx="478.25" cy="519.22" r="20.77"/>
                            <circle class="cls-4" cx="515.03" cy="479.37" r="20.77"/>
                            <circle class="cls-4" cx="325.95" cy="479.37" r="20.77"/>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="309" y="462" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="346" y="502" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="396" y="510" height="50px" width="50px"></image></a>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="461" y="502" height="35px" width="35px"></image></a>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="498" y="462" height="35px" width="35px"></image></a>

                            <circle class="cls-5" cx="543.5" cy="218.52" r="28.49"/>
                            <circle class="cls-5" cx="527.41" cy="276.28" r="20.77"/>
                            <circle class="cls-5" cx="527.41" cy="160.76" r="20.77"/>
                            <circle class="cls-5" cx="487.56" cy="123.98" r="20.77"/>
                            <circle class="cls-5" cx="487.56" cy="313.07" r="20.77"/>
                            <a href="#"class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="470" y="106" height="35px" width="35px"></image></a>
                            <a href="#"class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="510" y="143" height="35px" width="35px"></image></a>
                            <a href="#"class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="520" y="193" height="50px" width="50px"></image></a>
                            <a href="#"class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="510" y="259" height="35px" width="35px"></image></a>
                            <a href="#"class="cls-5"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="470" y="296" height="35px" width="35px"></image></a>

                            <circle class="cls-1" cx="297.5" cy="28.49" r="28.49"/>
                            <circle class="cls-1" cx="355.26" cy="44.57" r="20.77"/>
                            <circle class="cls-1" cx="239.74" cy="44.57" r="20.77"/>
                            <circle class="cls-1" cx="202.95" cy="84.43" r="20.77"/>
                            <circle class="cls-1" cx="392.04" cy="84.43" r="20.77"/>
                            <a href="#"class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="186" y="67" height="35px" width="35px"></image></a>
                            <a href="#"class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="223" y="27" height="35px" width="35px"></image></a>
                            <a href="#"class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="273" y="3" height="50px" width="50px"></image></a>
                            <a href="#"class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="338" y="27" height="35px" width="35px"></image></a>
                            <a href="#"class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="img/gold.svg" x="375" y="67" height="35px" width="35px"></image></a>



                            <image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="235" y="240" height="120px" width="120px"></image>
                            <a href="#" class="cls-1"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="255" y="75" height="80px" width="80px"></image></a>
                            <a href="#" class="cls-2"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="75" y="240" height="80px" width="80px"></image></a>
                            <a href="#" class="cls-3"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="150" y="445" height="80px" width="80px"></image></a>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="380" y="410" height="80px" width="80px"></image></a>
                            <a href="#" class="cls-4"><image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="default.png" x="415" y="175" height="80px" width="80px"></image></a>
                        </g>
                        </g>
                    </g>
                </svg>
            </article>
            <article>
                <h2>Son actualité</h2>
                <p>Disponible :
                <?php
                if($infoProfil[0]["dispo_profil"] == "1") {
                ?>
                    <span><i class="fas fa-check-circle"></i></span></p>
                <?php }else{ ?>
                <span><i class="fas fa-times-circle"></i></span></p>
                <?php } ?>
                <p>Nombre de projets en cours : <?= count($projetProfil) ?></p>
                <h3>Mes magnets : </h3><div id="magnetProfil">
                <?php
                foreach($tagsProfil as $tag){

                    if($tag['type_tag']=="competence"){
                        echo '<div>';
                        if($tag['palier'] == 1){
                            echo '<img src="img/bronz.svg" height="50px" width="50px">';
                        }
                        else if($tag['palier'] == 2){
                            echo '<img src="img/silver.svg" height="50px" width="50px">';
                        }
                        else if($tag['palier'] == 3) {
                            echo '<img src="img/gold.svg" height="50px" width="50px">';
                        }
                        else if($tag['palier'] == 4) {
                            echo '<img src="img/platine.svg" height="50px" width="50px">';
                        }
                        echo '<p>'.$tag['name_tag'].'</p>';

                        echo '</div>';
                    }
                }
                ?>
                </div>
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
                            <article>
                                <?php
                                foreach($tagsProfil as $tag){
                                    if($tag['type_tag']=="competence"){
                                        if($tag['tag_fav']=="1"){
                                            echo '<div id="fav">';
                                        }
                                        else{
                                            echo '<div class="vitrine">';
                                        }
                                        echo '<h2>'.$tag['name_tag'].'</h2>'.
                                            '<form method="post" action="addreco.php">'.
                                            '<input type="hidden" value="'.$tag[profil_id_profil].'" name="profil">
                                            <input type="hidden" value="'.$tag[id_profil_tag].'" name="profiltag">
                                            <input type="hidden" value="'.$_SESSION['pid'].'" name="sender">
                                            <input type="submit" value="Recommander">
                                           </form>'
                                        ;
                                        echo '<form method="post" action="detailsTag.php">'.
                                            '<input type="hidden" value='.$tag['id_profil_tag'].' name="id_profil_tag">
                                            <input type="hidden" value=1 name="isTag">
                                        <input type="submit" value="Voir">
                                       </form></div>'
                                        ;
                                    }
                                }
                                ?>
                            </article>
                      </div>
                      
                      <div id="hobby" class="tabcontent">
                            <article>
                                <?php
                                foreach($tagsProfil as $tag){
                                    if($tag['type_tag']=="envie"){
                                        echo '<div><h2>'.$tag['name_tag'].'</h2>';
                                        echo '<form method="post" action="detailsTag.php">'.
                                            '<input type="hidden" value='.$tag['id_profil_tag'].' name="id_profil_tag">
                                            <input type="hidden" value=1 name="isTag">
                                            <input type="submit" value="Voir">
                                           </form></div>'
                                        ;
                                    }
                                }
                                ?>
                            </article>
                      </div>
                      
                      <div id="projet" class="tabcontent">
                            <article>
                                <form action="bindProfilProject.php" method="post">
                                    <input type="hidden" value="<?= $_SESSION['pid']?>" name="id_owner">
                                    <input type="hidden" value=3 name="id_partner">
                                    <h3>Ajouter à un projet</h3>
                                    <select name="id_projet">
                                        <?php
                                        foreach($projetProfil as $projet){
                                            echo '<option value='.$projet['projet_id_projet'].'>'.$projet['name_projet'].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" value="Ajouter">
                                </form>
                                <div>
                                <?php
                                foreach($projetProfil as $projet){
                                    $i = 0;
                                    echo '<form action="detailsTag.php" method="post">';
                                    echo '<input type="hidden" value=1 name="isProject">';
                                    echo '<input type="hidden" value='.$projet['id_projet_profil'].' name="id_projet_profil">';
                                    echo '<input type="submit" value="Voir projet">';
                                    echo '</form>';
                                    echo '<p>'.$projet['name_projet'].' | ';
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
                                </div>
                            </article>
                      </div>
        </section>
        <script>
            openCity(event, 'competence');
        </script>
        <script src="JS/canvas.js"></script>
        
    </main>

    <footer>
        <article>
            <a href="Plan-du-site.html">Plan du site</a>
        </article>
        <article>
            <a href="FAQ.html">F.A.Q</a>
        </article>
        <article>
            <a href="MentionLegal.html">Mentions Légales</a>
        </article>
    </footer>

</body>


</html>