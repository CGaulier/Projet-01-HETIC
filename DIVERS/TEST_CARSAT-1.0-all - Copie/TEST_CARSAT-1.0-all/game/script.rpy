# Vous pouvez placer le script de votre jeu dans ce fichier.

# Déclarez sous cette ligne les images, avec l'instruction 'image'

image BG = "BACKGROUND.png"
image BG1 = "deco1.png"
image BAD_END="BAD_END.png"
image noteD="noteD.png"
image noteC="noteC.png"
image noteB="noteB.png"
image noteA="noteA.png"
image noteS="noteS.png"
image ecran mail ="ecran mail.jpg"
image janvier ="janvier.png"
image itemneed ="itemneed.png"
# ex: image eileen heureuse = "eileen_heureuse.png"
image nano basique ="assis1.png"
image nano parle ="assis2.png"
image nano heureuse ="assis3.png"
image nano interro ="assis4.png"
image nano interro smile ="assis5.png"
image nano malice ="assis6.png"
image nano wrong ="assis7.png"
image nano leçon ="assis8.png"
image good ="ecran_fin.png"
################################################ la carte avec les bouton interactif################################################
screen example_imagemap:
    imagemap:
        ground "Ground.jpg"
        hover "Hover.jpg"

        hotspot (53, 275, 363, 143) clicked Return("eteindre") alt "eteindre"
        hotspot (685, 96, 311, 213) clicked Return("mail") alt "mail"
        hotspot (311, 58, 255, 249) clicked Return("internet") alt "internet"




# Déclarez les personnages utilisés dans le jeu.
define e = Character('Nano', color="#c8ffc8")



init:
    
    #cette variable servira à sauver le nom du perso que l'utilisateur entrera
    $ choosenName = ""
    #le perso dynamique (DynamicCharacter) reprend la valeur de choosenName, yu 
    $ yu = DynamicCharacter("choosenName", color="#ff0000")


    #point de vie du perso
    $ pv_points= 40
    $ pv_max= 90
    $ variable = False


############### affichage de la video  #############  

    image movie = Movie(size=(1280, 720))


################################################ création de la boite des pv ################################################
screen button:
    vbox xalign 100 yalign 100:
        textbutton "montrer les points de vie" action ui.callsinnewcontext("aff_screen_label")

screen aff_screen:
    frame:
        has vbox
        hbox:
            label "pv: "xminimum 0
            bar range pv_max value pv_points xmaximum 250
        textbutton "Return" action Return()

label aff_screen_label:
    call screen aff_screen
    return

label movie:
    stop music
    scene black
    show movie

    play movie "another.ogg"
    show screen skipbutton
    $ renpy.pause(hard=True)


    stop movie
    hide movie





label skipmovie:

    hide screen skipbutton #disables the skip button screen#
    stop movie
    hide movie
    return


######################################## Le jeu commence ici ######################################
label start:
    
    show screen button
    scene BG
    play music "fate.ogg"

    e "Voici votre personnage, donnez lui un nom ! Pour passer les boîte de dialogue, cliquer avec votre souris."

    $ choosenName = renpy.input(_("Veuillez dire votre nom, s'il vous plait ( confirmer avec la touche entré):")) #on "capture" la saisie de l'utilisateur dans la variable choosenName
    yu "Je m'appelle [choosenName!t]." #on affiche la chaîne de caractères de choosenName (le !t est obligatoire)
    e "ah je vois, vous pouvez dès à présent commencer le jeu, commencez par voir vos mails."
    jump example
     


# Show an imagemap.
label example:
    play music "word.ogg"
    call screen example_imagemap


    # Call screen assignes the chosen result from the imagemap to the
    # _return variable. We can use an if statement to vary what
    # happens based on the user's choice.

    if _return == "internet":

        e "Vous avez choisi d'aller sur Internet"

        e "Etes-vous sûr de vous ? N'avez vous pas des mails à lire ?"
        jump example

    elif _return == "mail":
        scene ecran mail
        e "Vous avez choisi de consulter vos mails"

        e "Il y a un message concernant les formations pro ..."
        label movie_sign:

        call movie 
        stop movie
        hide movie
        scene BG1
        play music "word.ogg"
        show nano basique
        e "Excusez-moi, j'ai mis un peu de temps à me montrer mais me voila !"
        show nano parle
        e "Bonjour je suis Nano, je serai votre assistant ! Je vais vous apprendre à comprendre les subtilités de cette réforme sur la formation professionnelle."
        e "Dans ce jeu vous pouvez sauvegarder votre progression n'importe quand ! Pour cela il vous faut ouvrir le menu, pour ce faire appuyez sur echap ou faite un clic droit !" 
        e "Tout au long du jeu il vous sera proposer de faire des choix entre plusieurs réponse, sélectionner votre réponse avec la souris comme ceci : "

        menu:
            " j'ai compris !":
                jump princ



    elif _return == "eteindre":

        e "Vous avez choisi d'éteindre votre ordinateur"

        e "Procéder ?"
    
        menu:
            "Oui":
                jump oui
            "Non":
                jump non


label oui:
    show screen button
    $ degat = 500
    $ pv_points =pv_points - degat

    if pv_points >= 0:
        scene BAD_END
        e "vous avez perdu"

        return

label non:
    show screen button
    
    $pv_points =pv_points - 5
    
    if pv_points <= 0:
        e "vous avez perdu"

    else:
        e "Faite attention."
        jump example
    return
label princ :
    show nano heureuse
    e "C'est très bien [choosenName!t]!"
    show nano parle
    e " Faite cependant attention car chacun de vos choix vous permettront de gagner des points ou en perdre, vos points vous permettront de continuer le jeu, à la fin du jeu, le résultat final sera sous la forme d'une Lettre qui note votre performance."
    e "La plus basse étant D et la plus haute S. Si vous avez besoin de baisser la musique, ralentir l'apparition du texte vous pouvez les régler dans menu puis préférences."
    e "Maintenant passons au vif du sujet, tout d'abord j'ai besoin de savoir si (Je vous conseille de sauvegarder ici) :  "
    show nano interro smile
    menu:
        " Vous connaissez cette réforme et ses détails ?":
            jump choix1
        "Vous avez entendu parler de cette réforme mais vous n'en connaissez pas le contenu?":
            jump choix2
        "Vous ne connaissez pas cette réforme":
            jump choix3

label choix1:
    show nano malice
    e " Alors vous ne voyez aucun problème si nous faisons un petit questionnaire ?"
    jump questionnaire1

label choix2:
    show nano parle
    e "Dans ce cas vous pouvez vérifier vos connaissances ou lire la documentation !"
    menu:
        " Je vais lire la documentation sur la réforme.":
            jump doc
        "Je vais faire le questionnaire":
            jump questionnaire1

label choix3:
    show nano parle
    e "Nous allons donc nous renseigner sur cette réforme!"
    show nano heureuse
    e "Go !"
    
jump doc

###########################################DOCUMENTATION########################################################

label doc:

    show nano parle
    scene janvier
    e "La réforme de la formation professionnel à prit place en janvier 2015."
    scene BG1
    show nano leçon
    e "Celle-ci est plus axée sur le renforcement du salarié dans son corps de métier et son projet professionnel. Elle va permettre de remplacer le système de formation précédent jugé trop complexe."
    e "Le DIF, Le droit professionnel à la Formation n'étais que peu utilisé malgré les avantages qu'il proposait (aide financières pour les formations)."
    show nano parle
    e "Ce dernier est donc remplacé par le CPF : Le compte personnel de Formation. Celui-ci est entré en service le 1 janvier 2015. Contrairement au DIF qui n'était lié qu'au contrat de travail le CPF est lié à la carrière ainsi il ne prend pas fin en même temps qu'un contrat de travail, il est cumulable de votre entrée dans le monde actif à votre départ en retraite."
    e "Le CPF peut cumuler jusqu'à 150H, votre employeur et les OPCA (organisme paritaire collecteur agrée) peuvent vous offrir des heures au delà de cette limite."
    e "Tout les deux ans vous pourrez avoir un entretien avec votre employeur un entretien professionnel obligatoire : Vous pourrez alors parler de votre projet professionnel et votre employeur pourra vous proposer des formations en lien avec votre évolution professionnel."
    e "Ce dernier va décider du type de formation qui vous convient le mieux et il aura 30 jours pour confirmer votre dossier de formation."
    show nano leçon
    e "L'avantage est que les différentes formations qui seront proposé sont des formations Diplômante, mais ce diplôme devra correspondre à votre métier." 
    e "Votre employeur devra s'assurer que vous ayez fait au moins une formation et bénéficiez d'une augmentation de salaire ou d'une évolution de poste tout les 6 ans. "
    e "Si ce n'est pas le cas alors l'entreprise peut être sanctionnée en vous donnant des heures supplémentaires sur votre CPF (100H pour temps plein, 150H pour temps partiel)."
    show nano parle
    scene itemneed
    e "L'inscription au CPF n'est pas compliquée, il vous faut une adresse e-mail, votre numéro de sécurité sociale ainsi que votre dernière fiche de paie de 2014."
    scene BG1
    show nano parle
    e "Cette dernière vous informera sur le nombre d'heures de DIF qu’il vous reste car celles-ci peuvent vous servir pour votre CPF jusqu'en 2020. "
    e "A noté que ces heures vous ont peut être été donné via une attestation de droits au DIF. Si dans les deux cas vous ne l'avez pas reçu réclamer les !"
    e "Voici maintenant une vidéo sur la réforme. En cliquant sur votre souris vous pouvez passer cette vidéo."
    $ renpy.movie_cutscene("videotuto.ogg")
    e"Que voulez-vous faire ?"
    menu:
        "revoir la documentation":
            jump doc
        "passer au questionnaire ! ":
            jump questionnaire1
###########################################FIN DOCUMENTATION####################################################

###########################################QUESTIONNAIRE N°1####################################################
label questionnaire1:

    scene BG1
    show nano malice
    e "Vous êtes pret pour les questions ? Si vous veniez a perdre, vous n'aurez qu'à lire la documentation et recommencer!"
    e "Question 1. Cette réforme a pris place en janvier dernier. :"
    show nano interro
    menu:
        "Oui":
            jump Q1R1
        "Non":
            jump Q1R2
        "Revoir la question":
            jump questionnaire1
label Q1R1:
$pv_points =pv_points + 10
show nano heureuse
"Bonne réponse !"
jump suite1

label Q1R2:
$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Et bien si, depuis Janvier cette nouvelle méthode est appliquée ! "
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite1

label suite1:
    show nano leçon
    e "Question2: Pour gérer mes heures, j'utiliserai la méthode DIF"
    show nano interro
    menu :
        "Oui":
            jump Q1R3
        "Non":
            jump Q1R4
        "Revoir la question":
            jump suite1
label Q1R3:

$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Et non ! La méthode DIF ne marche plus depuis Janvier 2015."
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite2

label Q1R4:

$pv_points =pv_points + 10
show nano heureuse
"Bonne réponse !"
jump suite2

label suite2:
    show nano malice
    e "Question3: Mes anciennes heures de DIF sont inutilisable pour cette réforme.  "
    show nano interro
    menu :
        "Oui":
            jump Q1R5
        "Non":
            jump Q1R6
        "Revoir la question":
            jump suite2
label Q1R5:
$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Vous avez sans doute reçu un document redant compte de vos heures de DIF, celles-ci doivent être rentré sur votre Compte Personnel de Formation"

if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite3

label Q1R6:
$pv_points =pv_points + 10
show nano heureuse
"Bonne réponse !"
jump suite3


label suite3:
    show nano interro smile
    e "Pas mal, question 4 :Si je n'ai pas eu d'augmentation de salaire, une évolution de poste ou un entretien durant les 6 prochaines années je peux réclamer à mon employeur un dédomagement. "
    show nano interro
    menu:
        "Oui":
            jump Q1R7
        "Non":
            jump Q1R8
        "Revoir la question":
            jump suite3
label Q1R8:
$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Vous devez les rentrer dans votre Compte personnel de formation le plus tôt possible ! C'est le système DIF qui ne marche plus ..."
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite4

label Q1R7:
$pv_points =pv_points + 10
show nano heureuse
"Bonne réponse !"
jump suite4

label suite4:
    show nano malice
    e "Question 5 : Mes heures de DIF sont utilisables jusqu'en 2020 ."
    show nano interro
    menu:
        "Oui":
            jump Q1R9
        "Non":
            jump Q1R10
        "Revoir la question":
            jump suite4
label Q1R9:
$pv_points =pv_points + 10
show nano heureuse
"Bonne réponse !"
jump suite5

label Q1R10:

$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Vos heures de DIF sont utilisables jusqu'en 2020 !"
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite5

label suite5:
    show nano leçon
    e "Question 6 : Pour mes choix de formations je peux choisir ce que je veux, tant que mon employeur l'a approuvé suite à un entretien."
    show nano interro
    menu:
        "Oui":
            jump Q1R11
        "Non":
            jump Q1R12
        "Revoir la question":
            jump suite5

label Q1R11:
$pv_points =pv_points + 10
show nano heureuse
"Bonne réponse !"


jump suite6

label Q1R12:

$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Vous devez en effet avoir l'avale de l'employeur, cela se fait après un entretien obligatoire, à faire tout les deux ans !"
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite6

label suite6 :
    show nano interro smile
    e "Votre employeur aura plus ou moins  40 jours pour confirmer votre formation?"
    show nano interro
    menu:
        "Plus":
            jump Q1R16
        "Moins":
            jump Q1R15
        "Aucune des deux réponses précédentes":
            jump Q1R17

label Q1R17:
$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Il faut 30 jours !"
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite7

label Q1R15:
    $pv_points =pv_points + 10
    show nano heureuse
    e "Bonne réponse !"
    jump suite7

label Q1R16:
$pv_points =pv_points - 10
scene BG1
show nano wrong
e "Mauvaise réponse ... Il faut 30 jours !"
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump suite7
    
label suite7 :
    show nano interro smile
    e "Dernière question: Si je suis infographiste que puis-je prendre comme formation ? "
    show nano interro
    menu:
        " Une formation de communication et publicité image.":
            jump Q1R14
        "Une formation d'ingénieur son.":
            jump Q1R13
        "Revoir la question":
            jump suite6


label Q1R13:
$pv_points =pv_points - 20
scene BG1
show nano wrong
e "Mauvaise réponse ... Vous devez prendre une formation en rapport avec votre métier !"
if pv_points <= 0:
    scene BAD_END
    e "Vous avez perdu"
    return
jump PRINCI

label Q1R14:
$pv_points =pv_points + 20
show nano heureuse
e "Excellent !"
jump PRINCI

########################################################FIN QUESTIONNAIRE#################################################

label PRINCI:
    show nano heureuse
    e "Felicitation vous avez réussie !!"
    e "bien evidemment je vous conseille de refaire le jeux si vous n'avez pas eu au moins A"
    e "Tâchez de relire la documentation"

if pv_points <=10:
    jump D

if pv_points <=30:
    jump C
if pv_points <=50:
    jump B
if pv_points <=70:
    jump A
if pv_points ==90:
    jump S

label D:
    scene noteD
    e "Voici votre note"

    jump good
label C:
    scene noteC
    e "Voici votre note"
    jump good
label B:
    scene noteB
    e "Voici votre note"
    jump good

label A:
    scene noteA
    e "Voici votre note"

    jump good

label S:
    scene noteS
    e "Voici votre note"

    jump good

label good:

    scene good
    show nano heureuse
    e "félicitation [choosenName!t] ! Vous avez fini le jeu, voici un page de fin qui va vous rappeller les points importants de la réforme !"
    hide nano
    e "J'ai été heureuse de vous aider ! à bientôt !"



label credits :
    "Jeu créer par Clemence Gaulier, cellule communication."
    "Merci à Hélène Wozny, Didier Bigot et Valérie Saint-Gilles pour la création de ce jeu"
    "Ce serious game a été créé grâce au moteur Ren'py,les modèles 3D appartiennent à Swatmare et animé sous MikuMikuDance"
    