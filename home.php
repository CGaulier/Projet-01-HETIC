<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>MagnHETIC</title>
</head>
<body>
    <header>
        <nav>
            <a href=""><img src="img/magnet.svg" alt="logo magnHETIC" id="logo"></a>
            <i class="fas fa-search"><a href="home.php"></a></i>
            <a href="profil.html"><img src="img/profil.jpg" alt="ma photo" id="maPhoto"></a>
        </nav>
        <img src="img/wave.svg" id="wave" alt="wave">
    </header>
    <main class="accueil">

        <section class="recherche">
        <h1>Que recherchez-vous ?</h1>

        <div id="searchbar">

            <form action="resultats.php" method="get" name="formbarre">

                <h2>Je recherche...</h2>
                    <div>
                        
                        <hr id="serious">
                        <input id="radio-1" class="radio-custom" name="filter" value="personne" type="radio" checked>
                        <label for="radio-1" class="radio-custom-label">Personnes</label>

 
                        <input id="radio-2" class="radio-custom" name="filter" value="hobbie" type="radio">
                        <label for="radio-2" class="radio-custom-label">Je veux faire</label>

                        <input id="radio-3" class="radio-custom" name="filter" value="competence" type="radio">
                        <label for="radio-3" class="radio-custom-label">Je sais faire</label>
                    </div>

                    <h2>Sélectionnez votre filtre :</h2>
                    <div>
                        <input id="checkbox-1" class="checkbox-custom" name="dispo" value="1" type="checkbox" name="">
                        <label for="checkbox-1" class="checkbox-custom-label">Disponible</label>

                    </div>
                    
                <input type="text" placeholder="Entrez votre recherche" name="rec" id="barre">
                <input type="submit" value="">
            </form>
        </div>
        </section>
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
<script src="https://use.fontawesome.com/6fac2730d4.js"></script>

<script src="JS/script.js"></script>
</html>