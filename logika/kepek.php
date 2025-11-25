<?php
$uzenet = [];
if (isset($_POST['kuld'])) {
    foreach ($_FILES as $fajl) {

        if ($fajl['error'] == 4) continue;

        if (!in_array($fajl['type'], $MEDIATIPUSOK)) {
            $uzenet[] = "Nem megfelelő típus: " . $fajl['name'];
            continue;
        }
        if ($fajl['error'] == 1 || $fajl['error'] == 2 || $fajl['size'] > $MAXMERET) {
            $uzenet[] = "Túl nagy állomány: " . $fajl['name'];
            continue;
        }
        $vegsohely = $MAPPA . strtolower($fajl['name']);
        if (file_exists($vegsohely)) {
            $uzenet[] = "Már létezik: " . $fajl['name'];
            continue;
        }
        if (move_uploaded_file($fajl['tmp_name'], $vegsohely)) {
            $uzenet[] = "Ok: " . $fajl['name'];
        } else {
            $uzenet[] = "Hiba történt: " . $fajl['name'];
        }
    }
}
