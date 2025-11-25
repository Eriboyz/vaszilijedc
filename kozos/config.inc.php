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
    '/' => array('fajl' => 'cimlap', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'tamogatas' => array('fajl' => 'tamogatas', 'szoveg' => 'Támogatás', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
);



