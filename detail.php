<?php 
// Sertakan file header
include 'includes/header.php';

// Data simulasi konten
$guides = [
    [
        'id' => 1,
        'title' => 'Good gear early game',
        'description' => 'Cara menedapatkan gear bagus awal permainan tanpa harus mengalahkan musuh berat atau melakukan eksploitasi yang rumit. Trik ini sangat berguna untuk pemain yang ingin memulai dengan perlengkapan yang solid tanpa harus melewati tantangan berat di awal.',
        'full_content' => 'Pada Awal permainan, banyak pemain merasa kesulitan untuk mendapatkan perlengkapan yang memadai. Namun, dengan trik ini, Anda dapat dengan mudah mendapatkan gear yang bagus tanpa harus menghadapi musuh berat atau melakukan eksploitasi yang rumit. Trik ini melibatkan eksplorasi area tertentu di awal permainan yang sering diabaikan oleh pemain lain.',
        'game' => 'cop',
        'type' => 'exploit',
        'level' => 'hard',
        'author' => 'Imad',
        'date' => 'April 2026',
        'video_url' => 'https://www.youtube.com/embed/b4gHXWuIh7E'
    ],
    [
        'id' => 2,
        'title' => 'Gauss Rifle di Awal Permainan',
        'description' => 'Trik mendapatkan senjata Gauss Rifle tanpa harus melawan musuh berat di awal permainan. Trik ini membutuhkan lompatan presisi dan sedikit koordinasi, tetapi hasilnya sangat memuaskan karena Anda akan memiliki salah satu senjata paling kuat di awal permainan.',
        'full_content' => 'Gauss Rifle adalah salah satu senjata paling kuat dalam game, tetapi biasanya sulit didapatkan di awal permainan. Namun, dengan trik ini, Anda dapat memperoleh Gauss Rifle tanpa harus menghadapi musuh berat. Trik ini melibatkan lompatan presisi ke area tertentu yang sering diabaikan oleh pemain lain, sehingga memungkinkan Anda untuk mendapatkan senjata ini dengan relatif mudah.',
        'game' => 'soc',
        'type' => 'trick',
        'level' => 'easy',
        'author' => 'Imad',
        'date' => 'April 2026',
        'video_url' => 'https://www.youtube.com/embed/_wrWLxZV84w?si=TUvrkw3Mmrk7DreE'
    ],
    [
        'id' => 3,
        'title' => 'Menjadi OP di awal permainan Call of Pripyat',
        'description' => 'Trik mendapatkan perlengkapan dan senjata terbaik di awal permainan Call of Pripyat tanpa harus menghadapi musuh berat. Trik ini melibatkan eksplorasi area tertentu yang sering diabaikan oleh pemain lain.',
        'full_content' => 'Dengan trik ini, Anda dapat dengan mudah mendapatkan perlengkapan dan senjata terbaik di awal permainan Call of Pripyat tanpa harus menghadapi musuh berat. Trik ini melibatkan eksplorasi area tertentu yang sering diabaikan oleh pemain lain, sehingga memungkinkan Anda untuk memulai permainan dengan perlengkapan yang sangat kuat.',
        'game' => 'cop',
        'type' => 'Exploit',
        'level' => 'medium',
        'author' => 'Imad',
        'date' => 'April 2026',
        'video_url' => 'https://www.youtube.com/embed/jhliB-Z_MoQ?rel=0'
    ],
    [
        'id' => 4,
        'title' => 'Cara mendapatkan uang yang banyak di clear sky',
        'description' => 'Cara mendapatkan uang yang banyak dengan memanfaatkan NPC stalker di farm kemudian bertemu bandut untuk mendapatkan uang yang banyak dengan mudah. Trik ini sangat berguna untuk pemain yang ingin cepat mengumpulkan uang tanpa harus melakukan misi berat atau menghadapi musuh kuat.',
        'full_content' => 'Dengan trik ini, Anda dapat dengan mudah mendapatkan uang yang banyak di Clear Sky dengan memanfaatkan NPC stalker di farm. Trik ini melibatkan interaksi dengan NPC tertentu yang dapat memberikan Anda kesempatan untuk mendapatkan uang dengan cepat dan mudah, tanpa harus melakukan misi berat atau menghadapi musuh kuat.',
        'game' => 'cs',
        'type' => 'exploit',
        'level' => 'medium',
        'author' => 'Imad',
        'date' => 'April 2026',
        'video_url' => 'https://www.youtube.com/embed/uf4pYVwpJRA?si=ua5R379Y2nhsz0gO'
    ]
];

// Ambil ID dari URL
$guide_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$current_guide = null;

foreach ($guides as $g) {
    if ($g['id'] == $guide_id) {
        $current_guide = $g;
        break;
    }
}
?>

<div class="layout-container" style="max-width: 1100px; margin: 40px auto; padding: 0 20px;">
    
    <div class="main-content" style="width: 100%; max-width: 1000px; margin: 0 auto; background-color: #222; padding: 40px; border-radius: 8px;">
        
        <?php if ($current_guide): ?>
            <a href="index.php" style="color: #ff9800; text-decoration: none; display: inline-block; margin-bottom: 25px;">&larr; Kembali ke Beranda</a>

            <div class="meta-tags" style="margin-bottom: 10px;">
                <span class="badge badge-<?= $current_guide['type'] ?>" style="background-color: <?= $current_guide['type'] === 'exploit' ? '#d9534f' : '#0275d8' ?>; color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 0.85em;"><?= ucfirst($current_guide['type']) ?></span>
                <span class="badge badge-mod" style="background-color: #5cb85c; color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 0.85em;"><?= strtoupper($current_guide['game']) ?></span>
                <span class="badge badge-difficulty" style="background-color: #0275d8; color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 0.85em;"><?= ucfirst($current_guide['level']) ?></span>
            </div>
            
            <h1 style="color: #fff; margin: 10px 0 15px 0; line-height: 1.2; font-size: 2.2em;"><?= htmlspecialchars($current_guide['title']) ?></h1>

            <div style="background-color: #1a1a1a; padding: 15px 20px; border-radius: 6px; margin-bottom: 25px; display: inline-block;">
                <span style="color: #aaa; font-size: 0.85em;">Ditulis oleh: <strong style="color: #fff;"><?= $current_guide['author'] ?></strong></span>
                <span style="color: #666; margin: 0 10px;">|</span>
                <span style="color: #aaa; font-size: 0.85em;">Diterbitkan: <span style="color: #fff; font-weight: 500;"><?= $current_guide['date'] ?></span></span>
            </div>

            <hr style="border: 0; border-top: 1px solid #333; margin: 20px 0;">

            <div class="content-body" style="line-height: 1.6; color: #ddd; margin-top: 20px;">
                <p style="font-size: 1.05em; font-weight: 500; margin-bottom: 15px; color: #eee;"><?= htmlspecialchars($current_guide['description']) ?></p>
                <p><?= htmlspecialchars($current_guide['full_content']) ?></p>
            </div>

            <hr style="border: 0; border-top: 1px solid #444; margin: 40px 0;">

            <div class="video-container">
                <h3 style="color: #ff9800; margin-bottom: 15px;">📹 Video Tutorial Trik</h3>
                <div class="iframe-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background: #000; border-radius: 6px;">
                    <iframe src="<?= htmlspecialchars($current_guide['video_url']) ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen></iframe>
                </div>
            </div>

        <?php else: ?>
            <p style="color: #ff9800; padding: 20px 0; text-align: center;">Panduan tidak ditemukan.</p>
            <a href="index.php" style="color: #ff9800; text-decoration: none; display: block; text-align: center; margin-top: 20px;">&larr; Kembali ke Beranda</a>
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

<?php include 'includes/footer.php'; ?>