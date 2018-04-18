<?php
session_start();
require_once 'connection.php';

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
            `desc_tag`,
            `categorie_tag`,
            `vitrine_profil_tag` 
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

$infoProfil = getInfoProfil($_SESSION['pid'],$conn);
$tagsProfil = getTagsProfil($_SESSION['pid'], $conn);
$projetProfil = getProjetProfil($_SESSION['pid'], $conn);

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

<h2>Modifier Profil</h2>
<form action="updateProfil.php" method="GET">
<input type="hidden" value=<? echo $_SESSION['pid']?> name="id_profil">
<p><input type="text" value="<?= $infoProfil[0]["pseudo_profil"] ?>" name="pseudo_profil"></p>
<p><input type="text" value="<?= $infoProfil[0]["email_profil"] ?>" name="email_profil"></p>
<p><input type="text" value="<?= $infoProfil[0]["bio_profil"] ?>" name="bio_profil"></p>
<p><input type="text" value="<?= $infoProfil[0]["lieu_profil"] ?>" name="lieu_profil"></p>
<p><input type="text" value="<?= $infoProfil[0]["classe_profil"] ?>" name="classe_profil"></p>
    <p>
        <?php if($infoProfil[0]["dispo_profil"] == "1") { ?>
        <input type="checkbox" value="1" name="dispo_profil" checked>Je suis disponible
        <?php } else{ ?>
        <input type="checkbox" value="1" name="dispo_profil" >Je suis disponible
        <?php } ?>
    </p>
<input type="submit" value="METTRE A JOUR LE PROFIL">
</form>
<hr>
<h2>Mes compétences</h2>
<?php
foreach($tagsProfil as $tag){
    echo '<form action="updateTagProfil.php" method="GET">';
    echo '<input type="hidden" value='.$tag['id_profil_tag'].' name="id_profil_tag">';
    echo '<p>Tag : '.$tag['name_tag'].'</p>';
    echo '<p>Categorie : '.$tag['categorie_tag'].'</p>';
    echo '<p>Type : '.$tag['type_tag'].'</p>';
    echo '<textarea name="desc_tag" rows="4" cols="50">'.$tag['desc_tag'].'</textarea>';

    if($tag['tag_fav']=="1"){
        echo '<input type="radio" name="tag_fav" value="1" checked> Tag favorisé';
    }
    else{
        echo '<input type="radio" name="tag_fav" value="1"> Tag favorisé';
    }
    if($tag['vitrine_profil_tag']=="1"){
        echo '<input type="checkbox" name="vitrine_tag" value="1" checked> Tag en vitrine';
    }
    else{
        echo '<input type="checkbox" name="vitrine_tag" value="1"> Tag en vitrine';
    }

    echo '<input type="submit" value="METTRE A JOUR LE TAG">';
    echo '</form>';

    echo '<hr>';
}



?>
<h2>Mes projets</h2>
<?php
foreach($projetProfil as $projet){
    echo '<form action="deleteProject.php" method="GET">';
    echo '<input type="hidden" value='.$projet[projet_id_projet].' name="tag">';
    echo '<p>'.$projet['name_projet'].'</p>';
    $equipeProjet = getEquipeProjet($projet['projet_id_projet'], $conn);
    foreach($equipeProjet as $equipe){
        echo '<b>Equipe : </b><i>'.$equipe['pseudo_profil'].'</i> -';
    }
    echo '<input type="submit" value="SUPPRIMER PROJET">';
    echo '</form>';
    echo '<br>';
}
?>

<hr>

</body>
</html>

http://magnhetic.com/updateProfil.php?id_profil=&name_profil=michmichmich&email_profil=mich%40hetic.net&bio_profil=je+suis+michou&lieu_profil=chez+toi&classe_profil=h4&desc_tag=ceci+est+une+description+ecrite+a+4h+du+mat&tag_fav=1&desc_tag=&vitrine_tag=1