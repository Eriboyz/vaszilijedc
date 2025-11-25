<?php
//serveroldali validáció 
$hibak = [];
$adatok = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //adatok olvasása
    $nev = trim($_POST['nev'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $uzenet = trim($_POST['uzenet'] ?? '');
    // Megőrizzük, hogy vissza lehessen tölteni hiba esetén
    $adatok = [
        'nev' => $nev,
        'email' => $email,
        'uzenet' => $uzenet
    ];
    // Név nem lehet üres
    if ($nev === '') {
        $hibak[] = "A név megadása kötelező.";
    }
    // Email egyszerű ellenőrzése
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Érvényes e-mail címet adjon meg.";
    }
    // Üzenet min. 5 karakter
    if (strlen($uzenet) < 5) {
        $hibak[] = "Az üzenet legalább 5 karakter legyen.";
    }
    //ha hiba vissza a kapcsolat oldalra
    if (!empty($hibak)) {
        $_SESSION['kapcsolat_hibak'] = $hibak;
        $_SESSION['kapcsolat_adatok'] = $adatok;

        header("Location: index.php?oldal=kapcsolat");
        exit;
    }
    //db mnetés
    $conn = new mysqli("localhost", "root", "", "vaszilijedc");
    $conn->set_charset("utf8");
    $stmt = $conn->prepare("INSERT INTO uzenetek (nev, email, uzenet, datum) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $nev, $email, $uzenet);
    $stmt->execute();
    //sikeres visz az üzenetek oldalra
    $_SESSION['uzenet_adatok'] = $adatok;
    header("Location: index.php?oldal=uzenet");
    exit;
}
?>
