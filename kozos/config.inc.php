<?php
// Az oldal címe
$ablakcim = [
    'cim' => 'vaszilijedc.hu'
];

// Fejléc adatai
$fejlec = [
    'cim'   => 'vaszilijedc.hu',
    'motto' => 'Web-programozás'
];

// FRONT CONTROLLER routing
$oldalak = array(
    '/' => ['fajl' => 'cimlap', 'szoveg' => 'Főoldal'],
    'tamogatas' => ['fajl' => 'tamogatas', 'szoveg' => 'Támogatás'],
    'kepek' => ['fajl' => 'kepek', 'szoveg' => 'Képek'],
    'kapcsolat' => ['fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat'],
    'feltoltes' => ['fajl' => 'kepek', 'szoveg' => 'Feltöltés', 'rejtett' => true],
);

// Galéria beállítások
$MAPPA = 'kepek/';
$TIPUSOK = ['.jpg', '.jpeg', '.png', '.webp'];
$MEDIATIPUSOK = ['image/jpeg', 'image/png', 'image/webp'];
$DATUMFORMA = "Y.m.d. H:i";
$MAXMERET = 500 * 1024;



