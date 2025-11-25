<?php
//sql kapcsolat
$conn = new mysqli("localhost", "root", "", "vaszilijedc");
$conn->set_charset("utf8");

//legújabb üzi elöl
$result = $conn->query("SELECT nev, email, uzenet, datum FROM uzenetek ORDER BY datum DESC");
?>

<div class="container my-4">
    <h2 class="fw-bold mb-4">Beérkezett üzenetek</h2>
    <?php if ($result->num_rows === 0): ?>
        <div class="alert alert-info">Még nincs üzenet.</div>
    <?php else: ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card rounded-4 shadow-sm mb-3">
                <div class="card-body">
                    <p class="mb-1">
                        <strong>Név:</strong> <?= htmlspecialchars($row['nev']) ?>
                    </p>
                    <p class="mb-1">
                        <strong>Email:</strong> <?= htmlspecialchars($row['email']) ?>
                    </p>
                    <p class="mb-2">
                        <strong>Üzenet:</strong><br>
                        <?= nl2br(htmlspecialchars($row['uzenet'])) ?>
                    </p>
                    <p class="text-muted small mb-0">
                        <?= $row['datum'] ?>
                    </p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
