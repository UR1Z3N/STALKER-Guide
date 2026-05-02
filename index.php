<?php 
include 'includes/header.php';

// Data simulasi konten
$guides = [
    [
        'id' => 1,
        'title' => 'Good gear early game',
        'description' => 'Cara mendapatkan gear bagus awal permainan tanpa harus mengalahkan musuh berat atau melakukan eksploitasi yang rumit...',
        'game' => 'soc',
        'type' => 'trick',
        'level' => 'easy',
        'author' => 'Imad',
        'date' => 'April 2026'
    ],
    [
        'id' => 2,
        'title' => 'Gauss Rifle di Awal Permainan',
        'description' => 'Trik mendapatkan senjata Gauss Rifle tanpa harus melawan musuh berat di awal permainan. Trik ini membutuhkan lompatan presisi dan sedikit koordinasi.',
        'game' => 'soc',
        'type' => 'trick',
        'level' => 'easy',
        'author' => 'Imad',
        'date' => 'April 2026'
    ],
    [
        'id' => 3,
        'title' => 'Menjadi OP di awal permainan Call of Pripyat',
        'description' => 'Trik mendapatkan perlengkapan dan senjata terbaik di awal permainan Call of Pripyat tanpa harus menghadapi musuh berat. Trik ini melibatkan eksplorasi area tertentu yang sering diabaikan oleh pemain lain.',
        'game' => 'cop',
        'type' => 'exploit',
        'level' => 'medium',
        'author' => 'Imad',
        'date' => 'April 2026'
    ],
    [
        'id' => 4,
        'title' => 'Cara mendapatkan uang yang banyak di clear sky',
        'description' => 'cara menadapatkan uang yang banyak dengan memanfaatkan npc stalker di farm kemudian bertemu bandut untuk mendapatkan uang yang banyak dengan mudah',
        'game' => 'cs',
        'type' => 'exploit',
        'level' => 'medium',
        'author' => 'Imad',
        'date' => 'April 2026'
    ]
];

// Fungsi untuk menentukan class badge secara dinamis
function getBadgeClass($type) {
    $typeLower = strtolower($type);
    if ($typeLower === 'exploit') {
        return 'badge-exploit';
    } elseif ($typeLower === 'trick') {
        return 'badge-trick';
    }
    return 'badge-difficulty'; // Default fallback
}

// Menangkap input array filter dari URL
$filter_games = isset($_GET['game']) ? $_GET['game'] : [];
$filter_types = isset($_GET['type']) ? $_GET['type'] : [];
$filter_levels = isset($_GET['level']) ? $_GET['level'] : [];
// Menangkap input pencarian
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

// Menyaring data
$filtered_guides = array_filter($guides, function($item) use ($filter_games, $filter_types, $filter_levels, $search_query) {
    // 1. Filter Game
    if (!empty($filter_games) && !in_array($item['game'], $filter_games)) {
        return false;
    }
    // 2. Filter Tipe
    if (!empty($filter_types) && !in_array(strtolower($item['type']), array_map('strtolower', $filter_types))) {
        return false;
    }
    // 3. Filter Level
    if (!empty($filter_levels) && !in_array($item['level'], $filter_levels)) {
        return false;
    }
    // 4. Pencarian Berdasarkan Judul
    if ($search_query !== '') {
        if (stripos($item['title'], $search_query) === false) {
            return false;
        }
    }
    return true;
});
?>

<div class="layout-container">
    
    <div class="main-content">
        <h2>
            <?php 
            if (!empty($filter_games) || !empty($filter_types) || !empty($filter_levels)) {
                echo "Hasil Filter Konten";
            } else {
                echo "Latest Advanced Strategies & Exploits";
            }
            ?>
        </h2>
        
        <?php if (count($filtered_guides) > 0): ?>
            <?php foreach ($filtered_guides as $guide): ?>
                <div class="guide-item">
                    <div class="meta-tags">
                        <span class="badge <?= getBadgeClass($guide['type']) ?>"><?= ucfirst($guide['type']) ?></span>
                        <span class="badge badge-mod"><?= strtoupper($guide['game']) ?></span>
                        <span class="badge badge-difficulty"><?= ucfirst($guide['level']) ?></span>
                    </div>
                    <h3><a href="detail.php?id=<?= $guide['id'] ?>" style="color: #fff; text-decoration: none;"><?= htmlspecialchars($guide['title']) ?></a></h3>
                    <p><?= htmlspecialchars($guide['description']) ?></p>
                    <small>Published by <?= $guide['author'] ?> | <?= $guide['date'] ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: #666; padding: 20px 0;">Tidak ada panduan yang ditemukan dengan kriteria filter tersebut.</p>
        <?php endif; ?>
    </div>
    
    <div class="sidebar">
        <h3>REKOMENDASI</h3>
        
        <a href="https://www.stalker2.com/" class="recommendation-item-link" target="_blank">
            <div class="recommendation-item">
                <img src="assets/images/stalker2.jpg" alt="S.T.A.L.K.E.R. 2">
                <div class="rec-info">
                    <h4>S.T.A.L.K.E.R. 2: Heart of Chornobyl</h4>
                    <p>Berita terbaru seputar perilisan game yang sangat dinantikan.</p>
                </div>
            </div>
        </a>

        <a href="https://ap-pro.ru/forums/topic/179-gunslinger-mod/?tab=comments#comment-257" class="recommendation-item-link" target="_blank">
            <div class="recommendation-item">
                <img src="assets/images/gunslinger.jpg" alt="Pripyat Boiler">
                <div class="rec-info">
                    <h4>gunslinger mod</h4>
                    <p>Update terbaru untuk mod Gunslinger yang menambahkan banyak konten baru ke dalam game.</p>
                    <p>22.08.2024</p>
                </div>
            </div>
        </a>

        <a href="https://ap-pro.ru/forums/topic/4030-dead-city-final/" class="recommendation-item-link" target="_blank">
            <div class="recommendation-item">
                <img src="assets/images/deadcity.jpg" alt="Dead City Final">
                <div class="rec-info">
                    <h4>Dead City Final</h4>
                    <p>Modifikasi terbaru untuk seri Call of Pripyat.</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?php 
include 'includes/footer.php'; 
?>