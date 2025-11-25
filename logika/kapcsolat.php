<?php
$hibak = [];
$adatok = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //adatok belolvasas
    $nev = trim($_POST['nev'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $uzenet = trim($_POST['uzenet'] ?? '');

    $adatok = [
        'nev' => $nev,
        'email' => $email,
        'uzenet' => $uzenet
    ];
    //validacio
    if ($nev === '') {
        $hibak[] = "A név megadása kötelező.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hibak[] = "Érvényes e-mail címet adjon meg.";
    }

    if (strlen($uzenet) < 5) {
        $hibak[] = "Az üzenet legalább 5 karakter legyen.";
    }
    //ha van hiba
    if (!empty($hibak)) {
        $_SESSION['kapcsolat_hibak'] = $hibak;
        $_SESSION['kapcsolat_adatok'] = $adatok;
        header("Location: index.php?oldal=kapcsolat");
        exit;
    }
    //db kapcsolat
    try {
        $conn = new PDO(
         "mysql:host=mysql.omega;dbname=torosvaszilijedc;charset=utf8",
        "torosvaszilijedc",
        "A2UHEERC88asmu5",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

        $stmt = $conn->prepare(
            "INSERT INTO uzenetek (nev, email, uzenet, datum)
             VALUES (:nev, :email, :uzenet, NOW())"
        );

        $stmt->execute([
            ':nev' => $nev,
            ':email' => $email,
            ':uzenet' => $uzenet
        ]);

    } catch (PDOException $e) {
        die("Adatbázis hiba: " . $e->getMessage());
    }
    $_SESSION['uzenet_adatok'] = $adatok;
    header("Location: index.php?oldal=uzenet");
    exit;
}
?>
