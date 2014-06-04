<?php

    /**
     * Generiert die Hauptnavigation auf Basis der übergebenen Whitelist
     * @param $pages array
     * @return string HTML-String für die Navigation
     */
    function generate_navigation($pages) {

        // Das ursprüngliche HTML-Konstrukt wird dynamisch generiert. Dazu wird mithilfe der
        // for-Schleife ein String "aufaddiert", also durch Stringkonkatenation bei jedem Durchlauf
        // erweitert.
        $html = '<ul>';

        for ( $i = 0; $i < count($pages); $i++ ) {
            $html .= '<li><a href="index.php?p=' . $pages[$i]  . '">' . ucfirst($pages[$i]) . '</a></li>';
        }

        $html .= '</html>';

        // Das fertige Konstrukt wird zurückgegeben und kann im HTML mit echo ausgegeben werden.
        return $html;
    }


    // Whitelist mit gültigen Parametern für die Inhaltsfragmente.
    // Aus ihnen wird später der Dateiname zum Einbinden konstruiert.
    $pages = array('home','angebot','team','kontakt','impressum');

    // Initialisieren der Variablen, die den Parameter für die verlangte
    // Seite speichert.
    $page = '';
    // Prüfung, ob der Parameter p im Array $_GET vorhanden ist [1] und
    // gleichzeitig der Fall st, dass der Wert von p in der Whitelist
    // vorhanden ist [2].
    //   ------ 1 ------      -------- 2 --------
    if ( isset($_GET['p']) && in_array($_GET['p'], $pages) ) {
        // Wenn ja, dann wird der Wert aus der URL übernommen, ...
        $page = $_GET['p'];
    } else {
        // ... sonst führe den User zur Homepage
        $page = 'home';
    }
    
?>
<!doctype html>
<html lang="de">
    <head>
        <title><?php echo ucfirst($page); ?> | Secondhandblumen Petersen in Hamburg</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>

        <h1><a href="index.php">Secondhandblumen Petersen</a></h1>

        <div id="wrapper">
            <div id="container">
                <div id="navcontainer">
                    <?php echo generate_navigation($pages); ?>
                </div>

                <!-- Content Area -->
                <!-- Hier wird aus dem übergebenen Parameter und der Dateiendung .php
                     ein gültiger Dateiname für ein vorhandenes Inhaltsfragment konstruiert. -->
                <?php include $page . '.php'; ?>

                <div class="clearer"></div>
            </div>
        </div>
    </body>
</html>
