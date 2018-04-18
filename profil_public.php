<?php
require_once 'connection.php';
session_start();

function getInfoProfil($id_profil, $conn){
	$sql="SELECT 
            `id_profil`,
            `pseudo_profil`,
            `email_profil`,
            `bio_profil`,
            `lieu_profil`,
            `classe_profil`,
            `dispo_profil`,
            `img_profil` 
        FROM 
            `profil` 
        WHERE 
            `id_profil`=:id_profil
  ";
  
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id_profil', $id_profil);
  $stmt->execute();
  errorHandler($stmt);
  while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$res[]=$row;
}
return $res;
}

function getTagsProfil($id_profil, $conn){
	$sql="SELECT 
            `id_profil_tag`,
            `reco_tag`,
            `palier`,
            `tag_fav`,
            `profil_id_profil`,
            `tag_id_tag`,
            `type_tag`,
            `name_tag`,
            `categorie_tag` 
        FROM
            `profil_tag` 
        INNER JOIN 
            `tag`
        ON 
            `tag_id_tag` = `id_tag`
        WHERE 
            `profil_id_profil`=:id_profil
  ";
  
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id_profil', $id_profil);
  $stmt->execute();
  errorHandler($stmt);
  while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$res[]=$row;
}
return $res;
}

function getProjetProfil($id_profil, $conn){
	$sql="SELECT 
                `id_projet_profil`,
                `owner_projet`,
                `profil_id_profil`,
                `projet_id_projet`,
                `name_projet`,
                `finish_projet`,
                `desc_projet` 
            FROM 
                `projet_profil` 
            INNER JOIN 
                `projet` 
            ON 
                `projet_id_projet`=`id_projet`
            WHERE 
                `profil_id_profil`=:id_profil
  ";
  
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id_profil', $id_profil);
  $stmt->execute();
  errorHandler($stmt);
  while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$res[]=$row;
}
return $res;
}

function getEquipeProjet($id_projet, $conn){
	$sql="SELECT 
                `pseudo_profil` 
            FROM 
                `projet_profil`
            INNER JOIN 
                `projet`
            ON 
                `projet_id_projet` = `id_projet`
            INNER JOIN 
                `profil`
            ON 
                `profil_id_profil` = `id_profil`
            WHERE 
                `id_projet`=:id_projet
  ";
  
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id_projet', $id_projet);
  $stmt->execute();
  errorHandler($stmt);
  while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$res[]=$row;
}
return $res;
}




$infoProfil = getInfoProfil(3,$conn);
$tagsProfil = getTagsProfil(3, $conn);
$projetProfil = getProjetProfil(3, $conn);

//$sentReco = getSentReco()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>Profil</h2>
<p>Pseudo : <?= $infoProfil[0]["pseudo_profil"] ?></p>
<p>Email : <?= $infoProfil[0]["email_profil"] ?></p>
<p>Bio : <?= $infoProfil[0]["bio_profil"] ?></p>
<p>Adresse : <?= $infoProfil[0]["lieu_profil"] ?></p>
<p>Classe : <?= $infoProfil[0]["classe_profil"] ?></p>
<p>Disponibilité : <?= $infoProfil[0]["dispo_profil"] ?></p>
<hr>
<h2>Mes compétences</h2>
<?php
foreach($tagsProfil as $tag){
    echo '<p>Tag : '.$tag['name_tag'].'</p>'.
        '<form method="post" action="addreco.php">'.
            '<input type="hidden" value="'.$tag[profil_id_profil].'" name="profil">
            <input type="hidden" value="'.$tag[id_profil_tag].'" name="profiltag">
            <input type="hidden" value="'.$_SESSION['pid'].'" name="sender">
            <input type="submit" value="recomander">
           </form>'
    ;
    echo '<p>Categorie : '.$tag['categorie_tag'].'</p>';
    echo '<p>Type : '.$tag['type_tag'].'</p>';
    echo '<span>Tag fav : </span>';
    if($tag['tag_fav'] == '1'){ 
        echo '<p>OUI</p>';
    } else{
        echo '<p>NON</p>';
    }
    echo '<span>Tag vitrine : </span>';
    if($tag['vitrine_profil_tag'] == '1'){
        echo '<p>OUI</p>';
    } else{
        echo '<p>NON</p>';
    }
    if($tag['palier'] == 1){
        echo '<p>MEDAILLE BRONZE</p>';
    }
    echo '<p>Nombre de reco :'.$tag['reco_tag'].'</p>';
    echo '<hr>';
}

?><h2>Mes projets</h2>
<?php
foreach($projetProfil as $projet){
    echo '<p>'.$projet['name_projet'].'</p>';
    $equipeProjet = getEquipeProjet($projet['projet_id_projet'], $conn);
    foreach($equipeProjet as $equipe){
        echo '<b>Equipe : </b><i>'.$equipe['pseudo_profil'].'</i> -';
    }
    echo '<br>';
}
?>
<h2>CREATION PROJET</h2>
<form action="createProject.php" method="get">
    Nom projet : <br><input type="text" name="name_projet"><br>
    Description projet : <br><textarea rows="4" cols="50" name="desc_projet"></textarea><br>
    <input type="checkbox" name="finish_projet" value="1"> Projet achevé<br><br>
    <input type="submit" value="créer un nouveau projet">
</form>

<?php
if($_GET["projectCreated"]==1){
    echo 'Votre projet à été créé';
}
?>

<hr>

<h2>AJOUTER A UN PROJET<h2>

        <form action="bindProfilProject.php" method="get">
            <input type="hidden" value="<?= $_SESSION['pid']?>" name="id_owner">
            <input type="hidden" value=3 name="id_partner">
            <select name="id_projet">
                <?php
                foreach($projetProfil as $projet){
                    echo '<option value='.$projet['projet_id_projet'].'>'.$projet['name_projet'].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Ajouter un participant au projet">
        </form>

        <?php
        if($_GET["projectBound"]==1){
            echo 'Participant ajouté';
        }
        ?>

</body>
</html>