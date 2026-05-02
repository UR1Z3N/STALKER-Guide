<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stalker Guide - Advanced Strategy</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="main-container">
        
        <header class="site-header">
            <div class="header-top">
                <div class="logo-container">
                    <a href="index.php">
                        <img src="assets/images/logo.png" alt="Stalker Guide">
                    </a>
                </div>
            </div>
        </header>

        <nav class="site-nav">
            <ul class="nav-links">
                <li>
                    <a href="index.php">Home</a>
                </li>
                
                <li>
                    <a href="#">Game ▼</a>
                    <ul class="dropdown">
                        <form method="GET" action="index.php" style="margin: 0;">
                            <?php 
                            // Mempertahankan parameter lain agar tidak hilang saat form disubmit
                            foreach ($_GET as $key => $value) {
                                if ($key !== 'game' && !is_array($value)) {
                                    echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
                                } elseif ($key !== 'game' && is_array($value)) {
                                    foreach ($value as $val) {
                                        echo '<input type="hidden" name="' . htmlspecialchars($key) . '[]" value="' . htmlspecialchars($val) . '">';
                                    }
                                }
                            }
                            ?>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="game[]" value="soc" <?= (isset($_GET['game']) && in_array('soc', $_GET['game'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>SoC</span>
                            </li>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="game[]" value="cs" <?= (isset($_GET['game']) && in_array('cs', $_GET['game'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>CS</span>
                            </li>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="game[]" value="cop" <?= (isset($_GET['game']) && in_array('cop', $_GET['game'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>CoP</span>
                            </li>
                        </form>
                    </ul>
                </li>

                <li>
                    <a href="#">Tipe ▼</a>
                    <ul class="dropdown">
                        <form method="GET" action="index.php" style="margin: 0;">
                            <?php 
                            foreach ($_GET as $key => $value) {
                                if ($key !== 'type' && !is_array($value)) {
                                    echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
                                } elseif ($key !== 'type' && is_array($value)) {
                                    foreach ($value as $val) {
                                        echo '<input type="hidden" name="' . htmlspecialchars($key) . '[]" value="' . htmlspecialchars($val) . '">';
                                    }
                                }
                            }
                            ?>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="type[]" value="trick" <?= (isset($_GET['type']) && in_array('trick', $_GET['type'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>Trick</span>
                            </li>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="type[]" value="exploit" <?= (isset($_GET['type']) && in_array('exploit', $_GET['type'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>Exploit</span>
                            </li>
                        </form>
                    </ul>
                </li>

                <li>
                    <a href="#">Level ▼</a>
                    <ul class="dropdown">
                        <form method="GET" action="index.php" style="margin: 0;">
                            <?php 
                            foreach ($_GET as $key => $value) {
                                if ($key !== 'level' && !is_array($value)) {
                                    echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
                                } elseif ($key !== 'level' && is_array($value)) {
                                    foreach ($value as $val) {
                                        echo '<input type="hidden" name="' . htmlspecialchars($key) . '[]" value="' . htmlspecialchars($val) . '">';
                                    }
                                }
                            }
                            ?>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="level[]" value="easy" <?= (isset($_GET['level']) && in_array('easy', $_GET['level'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>Easy</span>
                            </li>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="level[]" value="medium" <?= (isset($_GET['level']) && in_array('medium', $_GET['level'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>Medium</span>
                            </li>
                            <li style="padding: 8px 12px; display: flex; align-items: center; gap: 8px; color: #ccc;">
                                <input type="checkbox" name="level[]" value="hard" <?= (isset($_GET['level']) && in_array('hard', $_GET['level'])) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <span>Hard</span>
                            </li>
                        </form>
                    </ul>
                </li>

                <li>
                    <a href="index.php" style="color: #ff9800;">Reset Filter</a>
                </li>
            </ul>

            <form class="search-container" method="GET" action="index.php" style="margin: 0;">
                <input type="text" name="search" placeholder="Cari panduan..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <?php 
                if (isset($_GET['game'])) {
                    foreach ($_GET['game'] as $g) {
                        echo '<input type="hidden" name="game[]" value="' . htmlspecialchars($g) . '">';
                    }
                }
                if (isset($_GET['type'])) {
                    foreach ($_GET['type'] as $t) {
                        echo '<input type="hidden" name="type[]" value="' . htmlspecialchars($t) . '">';
                    }
                }
                if (isset($_GET['level'])) {
                    foreach ($_GET['level'] as $l) {
                        echo '<input type="hidden" name="level[]" value="' . htmlspecialchars($l) . '">';
                    }
                }
                ?>
            </form>
        </nav>