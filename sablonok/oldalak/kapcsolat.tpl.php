<?php
//hibák és kitöltött adatok beolvasása az űrlap ujratöltésehez
$hibak = $_SESSION['kapcsolat_hibak'] ?? [];
$adatok = $_SESSION['kapcsolat_adatok'] ?? ['nev' => '', 'email' => '', 'uzenet' => ''];
unset($_SESSION['kapcsolat_hibak']);
unset($_SESSION['kapcsolat_adatok']);
?>

<div class="container my-4">
    <h2 class="fw-bold mb-4">Kapcsolat</h2>
    <!-- PHP oldali hibák -->
    <?php if (!empty($hibak)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($hibak as $hiba): ?>
                    <li><?= htmlspecialchars($hiba) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <!-- kapcsolat form -->
    <form action="index.php?oldal=kapcsolat" method="post" onsubmit="return kapcsolatKuldes();" novalidate>
        <div class="mb-3">
            <label for="nev" class="form-label">Név</label>
            <input type="text" class="form-control" id="nev" name="nev" value="<?= htmlspecialchars($adatok['nev']) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail cím</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($adatok['email']) ?>">
        </div>
        <div class="mb-3">
            <label for="uzenet" class="form-label">Üzenet</label>
            <textarea class="form-control" id="uzenet" name="uzenet" rows="4"><?= htmlspecialchars($adatok['uzenet']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Küldés</button>
    </form>
</div>

<!-- kapcsolat js validacio -->
<script src="publikus/js/kapcsolat.js"></script>
