<?php
//átvesszük az adatokat, amit a kapcsolat.php tett session-be
$adatok = $_SESSION['uzenet_adatok'] ?? null;
// ha valaki közvetlenül jön ide adat nélkül, vigyük vissza a kapcsolat oldalra
if (!$adatok) {
    header("Location: index.php?oldal=kapcsolat");
    exit;
}

//kiürítjük, hogy ne maradjon bent
unset($_SESSION['uzenet_adatok']);
?>
<div class="container my-4">
    <h2 class="fw-bold mb-4">Köszönjük az üzenetet!</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Név:</strong> <?= htmlspecialchars($adatok['nev']) ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($adatok['email']) ?></p>
            <p><strong>Üzenet:</strong><br>
                <?= nl2br(htmlspecialchars($adatok['uzenet'])) ?>
            </p>
        </div>
    </div>
    <a href="index.php?oldal=kapcsolat" class="btn btn-secondary mt-3">
        Vissza a kapcsolat oldalra
    </a>
</div>
