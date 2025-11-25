<?php
include_once('kozos/config.inc.php');

// képek beolvasása
$kepek = [];
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA . $fajl)) {
        $vege = "." . strtolower(pathinfo($fajl, PATHINFO_EXTENSION));
        if (in_array($vege, $TIPUSOK)) {
            $kepek[$fajl] = filemtime($MAPPA . $fajl);
        }
    }
}
closedir($olvaso);
arsort($kepek); // utolsó módosított kerül előre
?>


<div class="container my-4">
    <h2 class="fw-bold mb-4">Képek</h2>

    <div class="row g-4">
        <?php foreach ($kepek as $fajl => $datum): ?>
            <div class="col-12 col-sm-6 col-md-3 text-center">
                <a href="<?= $MAPPA . $fajl ?>" target="_blank">
                    <img src="<?= $MAPPA . $fajl ?>" 
                         alt="<?= $fajl ?>" 
                         class="img-fluid rounded shadow-sm">
                </a>
                <p class="mt-2 fw-bold text-break text-wrap" style="word-break: break-word;">
    <?= htmlspecialchars($fajl) ?>
                </p>
                <p class="text-muted"><?= date($DATUMFORMA, $datum) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

        <h3 class="fw-bold mt-4">Képfeltöltés</h3>
        <form action="index.php?oldal=feltoltes" method="post" enctype="multipart/form-data">
            <input type="file" name="elso" class="form-control mb-3" required>
            <button type="submit" name="kuld" class="btn btn-primary mt-2">
                Feltöltés
            </button>
        </form>
</div>

<?php if (!empty($uzenet)): ?>
    <div class="alert alert-info mt-3">
        <ul>
            <?php foreach ($uzenet as $u): ?>
                <li><?= htmlspecialchars($u) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
