## Ce fichier contient certaines des options qui peuvent être changées pour
## personnaliser votre jeu Ren'Py. Il s'agit uniquement des options les plus
## communes, d'autres réglages sont possibles.
##
## Les lignes commençant par deux '#' sont des commentaires, et vous ne devriez
## pas les décommenter. Les lignes commençant par un seul '#' sont du code
## commenté, vous pouvez les décommenter pour les utiliser.

init -1 python hide:

    ## Cette option devrait être passé à False avant la distribution
    ## du jeu, ainsi le joueur ne peut pas tricher en utilisant les
    ## outils pour développeur.

    config.developer = False

    ## Contrôle la largeur et la hauteur de la fenêtre.

    config.screen_width = 1280
    config.screen_height = 720

    ## Titre de la fenêtre (lorsque le jeu se fait en mode fenêtré).

    config.window_title = u"TEST CARSAT"

    ## Contrôle le nom et la version du jeu; qui apparaîtront dans les
    ## fichiers de débogage.
    config.name = "TEST CARSAT"
    config.version = "0.0"

    #########################################
    ## Thèmes

    ## Nous utilisons ici une fonction de theme. theme.roundrect
    ## est un thème qui utilise des rectangles arrondis. C'est le seul
    ## thème actuellement supporté.
    ##
    ## La fonction prend un certain nombre de paramètres pour
    ## personnaliser le thème

    theme.bordered(
        ## Theme: Bordered
        ## Color scheme: Basic Blue

        ## The color of an idle widget face.
        widget = "#003c78",

        ## The color of a focused widget face.
        widget_hover = "#0050a0",

        ## The color of the text in a widget.
        widget_text = "#c8ffff",

        ## The color of the text in a selected widget. (For
        ## example, the current value of a preference.)
        widget_selected = "#ffffc8",

        ## The color of a disabled widget face.
        disabled = "#404040",

        ## The color of disabled widget text.
        disabled_text = "#c8c8c8",

        ## The color of informational labels.
        label = "#ffffff",

        ## The color of a frame containing widgets.
        frame = "#6496c8",

        ## The background of the main menu. This can be a color
        ## beginning with '#', or an image filename. The latter
        ## should take up the full height and width of the screen.
        mm_root = "PC.png",

        ## The background of the game menu. This can be a color
        ## beginning with '#', or an image filename. The latter
        ## should take up the full height and width of the screen.
        gm_root = "#dcebff",

        ## If this is True, the in-game window is rounded. If False,
        ## the in-game window is square.
        rounded_window = False,

        ## And we're done with the theme. The theme will customize
        ## various styles, so if we want to change them, we should
        ## do so below.
        )


    #########################################
    ## Ces options permettent de personnaliser le fenêtre contenant
    ## les dialogues et la narration, en les remplaçant par une image.

    ## Fond de la fenêtre. Dans un cadre ('Frame'), les deux nombres
    ## correspondent respectivement à la taille des bords à droite/gauche
    ## et en haut/en bas.

    style.window.background = Frame("frame.png", 12, 12)

    ## La marge ('margin') est l'espace autour fenêtre, où
    ## le fond n'apparaît pas.

    style.window.left_margin = 3
    style.window.right_margin = 3
    style.window.top_margin = 3
    style.window.bottom_margin = 3

    ## Le 'rembourrage' ('padding') est la marge à l'intérieur de la,
    ## fenêtre, où le fond apparaît.

    style.window.left_padding = 11
    style.window.right_padding = 11
    style.window.top_padding = 11
    style.window.bottom_padding = 11

    ## Hauteur minimum de la fenêtre, incluant les marges (margin et padding).

    style.window.yminimum = 150


    #########################################
    ## Ici nous pouvons changer l'organisation du menu principal

    ## Le placement fonctionne de cette manière : nous choisissons un point
    ## (anchor) au sein de l'élément puis un point sur l'écran (pos).
    ## Finalement, ces deux points se trouverons au même endroit.

    ## Ces deux points peuvent être indiqués via des nombres entiers ou
    ## décimaux. Un nombre entier sera interprété comme le nombre de pixel
    ## depuis le coin en haut à gauche. Un nombre décimal sera interprété
    ## comme le pourcentage de la taille de l'élément ou de l'écran.

    # style.mm_menu_frame.xpos = 0.5
    # style.mm_menu_frame.xanchor = 0.5
    # style.mm_menu_frame.ypos = 0.75
    # style.mm_menu_frame.yanchor = 0.5


    #########################################
    ## Ici nous personnalisons la police utilisée par défaut pour le texte.

    ## Le fichier contenant la police par défaut.

    # style.default.font = "DejaVuSans.ttf"

    ## La taille par défaut du texte.

    # style.default.size = 22

    ## Notez que cela ne change que la taille de certains textes. Les
    ## boutons ont leur propre style.


    #########################################
    ## Ici nous changeons les sons utilisés par Ren'Py

    ## Mettez cette option à False pour désactiver les sons.

    config.has_sound = True

    ## Mettez cette option à False si le jeu n'a pas de musique.

    config.has_music = True

    ## Mettez cette option à True si le jeu contient des voix.

    config.has_voice = False

    ## Sons utilisés lorsque les boutons et les imagemaps sont cliqués

    style.button.activate_sound = "click.wav"
    style.imagemap.activate_sound = "click.wav"

    ## Sons utilisés au lancement et à la sortie du jeu.

    config.enter_sound = "click.wav"
    config.exit_sound = "click.wav"

    ## Un son d'exemple utilisé pour vérifier le volume du son.

    config.sample_sound = "click.wav"

    ## Musique jouée lorsque le joueur se trouve dans le menu principal.

    config.main_menu_music = "bgsound.ogg"


    #########################################
    ## Aide.

    ## Ici nous configurons les options d'aide dans les menus Ren'Py.
    ## Il peut s'agir:
    ## - D'une étiquette (label) dans le script, auquel cas l'étiquette
    ##   est appelée pour montrer l'aide à l'utilisateur.
    ## - Le nom d'un fichier se trouvant dans le répertoire de base, qui
    ##   sera ouvert dans un navigateur Web.
    ## - 'None', pour désactiver l'aide
    config.help = "LISEZ-MOI.html"


    #########################################
    ## Transitions.

    ## Transition lorsque l'on rentre dans le menu du jeu depuis le jeu
    config.enter_transition = fade

    ## Transition lorsque l'on retourne au jeu depuis le menu jeu
    config.exit_transition = None

    ## Transition entre deux écran du menu jeu
    config.intra_transition = fade

    ## Transition lorsque l'on rentre dans le menu jeu depuis le menu principal
    config.main_game_transition = dissolve

    ## Transition lorsque l'on retourne au menu principal depuis le jeu
    config.game_main_transition = dissolve

    ## Transition lorsque l'on entre dans le menu principal depuis le
    ## splashscreen
    config.end_splash_transition = fade

    ## Transtion lorsque l'on entre dans le menu principal après la fin du jeu
    config.end_game_transition = dissolve

    ## Transition lorsque une partie est chargée
    config.after_load_transition = fade

    ## Transition lorsque le fenêtre apparaît.
    config.window_show_transition = fade

    ## Transition lorsque le fenêtre se cache
    config.window_hide_transition = None

    ## Transition lorsque l'on passe en mode NVL après avoir été en mode ADV.
    config.adv_nvl_transition = dissolve

    ## Transition lorsque l'on passe en mode ADV après avoir été en mode NVL.
    config.nvl_adv_transition = dissolve

    ## Transition lorsque l'on montre le menu Oui/Non
    config.enter_yesno_transition = dissolve

    ## Transition lorsque l'on cache le menu Oui/Non
    config.exit_yesno_transition = fade

    ## Transition au début d'une répétition (replay)
    config.enter_replay_transition = None

    ## Transition à la fin d'une répétition (replay)
    config.exit_replay_transition = None

    ## Transition lorsque une image change via l'utilisation de l'instruction
    ## 'say' contenant l'attribut 'image'.
    config.say_attribute_transition = None

    #########################################
    ## Nom du répertoire où les données du jeu sont stockées. (Il est
    ## nécessaire que cela soit indiqué tôt, avant tout autre code
    ## d'initiation.)
python early:
    config.save_directory = "TEST_CARSAT-1430834887"

init -1 python hide:
    #########################################
    ## Valeurs par défaut des préférences

    ## Note: ces options sont évaluées uniquement au premier démarrage
    ## d'un jeu. Pour les évaluer une seconde fois, faites "Supprimer
    ## persistant"

    ## Mettez cette option à True pour démarrer en mode plein écran

    config.default_fullscreen = False

    ## Vitesse par défaut en nombre de caractères par seconde.
    ## Mettez 0 pour l'infini.

    config.default_text_cps = 0

    ## Temps par défaut pour l'avancement automatique.

    config.default_afm_time = 10

    #########################################
    ## Vous pouvez ajouter ici d'autres options.


## This section contains information about how to build your project into
## distribution files.
init python:

    ## The name that's used for directories and archive files. For example, if
    ## this is 'mygame-1.0', the windows distribution will be in the
    ## directory 'mygame-1.0-win', in the 'mygame-1.0-win.zip' file.
    build.directory_name = "TEST_CARSAT-1.0"

    ## The name that's uses for executables - the program that users will run
    ## to start the game. For example, if this is 'mygame', then on Windows,
    ## users can click 'mygame.exe' to start the game.
    build.executable_name = "TEST_CARSAT"

    ## If True, Ren'Py will include update information into packages. This
    ## allows the updater to run.
    build.include_update = False

    ## File patterns:
    ##
    ## The following functions take file patterns. File patterns are case-
    ## insensitive, and matched against the path relative to the base
    ## directory, with and without a leading /. If multiple patterns match,
    ## the first is used.
    ##
    ##
    ## In a pattern:
    ##
    ## /
    ##     Is the directory separator.
    ## *
    ##     Matches all characters, except the directory separator.
    ## **
    ##     Matches all characters, including the directory separator.
    ##
    ## For example:
    ##
    ## *.txt
    ##     Matches txt files in the base directory.
    ## game/**.ogg
    ##     Matches ogg files in the game directory or any of its subdirectories.
    ## **.psd
    ##    Matches psd files anywhere in the project.

    ## Classify files as None to exclude them from the built distributions.

    build.classify('**~', None)
    build.classify('**.bak', None)
    build.classify('**/.**', None)
    build.classify('**/#**', None)
    build.classify('**/thumbs.db', None)

    ## To archive files, classify them as 'archive'.

    # build.classify('game/**.png', 'archive')
    # build.classify('game/**.jpg', 'archive')

    ## Files matching documentation patterns are duplicated in a mac app
    ## build, so they appear in both the app and the zip file.

    build.documentation('*.html')
    build.documentation('*.txt')
    