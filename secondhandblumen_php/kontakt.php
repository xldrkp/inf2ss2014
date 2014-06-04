<?php

    /**
     * Folgend wird gezeigt, wie man ein Formular validieren, also auf korrekte Eingaben prüfen kann.
     * Die Korrektheit der Eingabe kann an Plausibilitätskriterien sowie an technischen Erfordernissen
     * gemessen werden.
     *
     * Im folgenden Beispiel beschränke ich mich auf die Prüfung, ob Pflichtfelder ausgefüllt wurden.
     */


    // Initiatlisierung eines Arrays, das zum Sammeln der Fehlermeldungen verwendet wird.
    $error = array();

    // Prüfen, ob das Formular schon abgeschickt wurde, ...
    if ( isset($_POST['senden'])) {

        if ( $_POST['vorname']   == '')
            // Die Schreibweise mit den eckigen Klammern bedeutet, dass dem Array ein weiteres Element
            // am Ende hinzugefügt wird. Wann immer also eine Bedingung nicht erfüllt ist,
            // kommt eine weitere Fehlermeldung hinzu.
            $error[] = '<li class="error">Bitte tragen Sie Ihren Vornamen ein!</li>';
        
        if ( $_POST['email']   == '')
            $error[] = '<li class="error">Bitte tragen Sie eine Email-Adresse ein!</li>';
        
        if ( $_POST['nachricht']   == '')
            $error[] = '<li class="error">Bitte tragen Sie eine Nachricht ein!</li>';

        // Prüfen, ob Fehler aufgetreten sind, indem die Anzahl der Elemente im Fehlerarray überprüft wird.
        if (count($error) !== 0 ) {
            // implode konkateniert alle Elemente des Arrays mithilfe des ersten Parameters, hier ein leerer String
            echo '<ul style="clear: both;">' . implode('', $error) . '</ul>';
        } else {
            // Bei korrektem Formular wird der Rest der Seite nicht mehr ausgegeben.
            echo '<h2>Vielen Dank!</h2><p>Wir werden uns umgehend bei Ihnen melden.</p></body></html>';exit;
            // Code für die Weiterverarbeitung, z.B. Mailversand
        }
    }
    // ... wenn nicht, dann HTML-Formular.
?>
    <h2>Schreiben Sie uns!</h2>
    <p>Wir freuen uns auf Ihre Nachricht!</p>
    <?php

    ?>
    <!-- In den value-Attributen wird immer der zuvor schon eingetragene Wert ausgegeben, damit der Nutzer nicht bei
         einem Validierungsfehler alle Angaben nochmal machen muss. -->
    <form action="index.php?p=kontakt" method="post" name="kontaktform" id="kontaktform">
        <dl>
            <dt><label for="vorname">Vorname*</label></dt>
            <dd><input class="required" type="text" name="vorname" id="vorname" value="<?php echo (isset($_POST['vorname']) && $_POST['vorname'] != '') ? htmlspecialchars($_POST['vorname']) : '' ?>" /></dd>
            <dt><label for="name">Name</label></dt>
            <dd><input type="text" name="name" id="name" class=""/></dd>
            <dt><label for="email">Email*</label></dt>
            <dd><input class="required" type="text" name="email" id="email" value="<?php echo (isset($_POST['email']) && $_POST['email'] != '') ? htmlspecialchars($_POST['email']) : '' ?>" /></dd>
            <dt><label for="website">Website</label></dt>
            <dd><input type="text" name="website" id="website" /></dd>
            <dt><label for="nachricht">Ihre Nachricht*</label></dt>
            <dd><textarea class="required" name="nachricht" id="nachricht"><?php echo (isset($_POST['nachricht']) && $_POST['nachricht'] != '') ? htmlspecialchars($_POST['nachricht']) : '' ?></textarea></dd>
            <dt><label for="senden"></label></dt>
            <dd><input type="submit" name="senden" id="senden" value="Absenden" /></dd>
        </dl>
    </form>




