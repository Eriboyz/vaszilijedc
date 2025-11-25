<?php
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($ablakcim['cim']) ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<header class="bg-dark text-white py-3 mb-0">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0"><?= $fejlec['cim'] ?></h1>
            <p class="mb-0"><?= $fejlec['motto'] ?></p>
        </div>
        <a href="https://vaszilijedc.hu" target="_blank" class="btn btn-outline-light btn-sm">
            vasilijedc.hu oldal megnyitása →
        </a>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">

            <!-- BAL OLDALI MENÜ -->
        <ul class="navbar-nav">
        <?php foreach ($oldalak as $url => $adat): ?>
            <?php if (!isset($adat['rejtett'])): ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($oldal['fajl'] === $adat['fajl']) ? 'active' : '' ?>"
                    href="index.php?oldal=<?= $url ?>">
                        <?= htmlspecialchars($adat['szoveg']) ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>


            <div class="ms-auto d-flex align-items-center">
                    <a class="btn btn-outline-primary d-flex align-items-center">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Belépés
                    </a>
            </div>
        </div>
    </div>
</nav>


<main class="container">
    <?php include __DIR__ . '/oldalak/' . $oldal['fajl'] . '.tpl.php'; ?>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
