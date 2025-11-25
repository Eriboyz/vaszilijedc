<?php
// Konfiguráció betöltése
require_once __DIR__ . '/kozos/config.inc.php';

session_start();

// Kért oldal beolvasása
$keres = $_GET['oldal'] ?? '/';

// Ha létezik az oldal → azt töltjük be
$oldal = $oldalak[$keres] ?? $hiba_oldal;

// Ha van hozzá tartozó logikai PHP, futtasd le
$logika = __DIR__ . '/logika/' . $oldal['fajl'] . '.php';
if (file_exists($logika)) {
    include $logika;
}

// A sablon
include __DIR__ . '/sablonok/index.tpl.php';
