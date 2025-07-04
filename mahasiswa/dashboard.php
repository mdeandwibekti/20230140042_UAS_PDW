<?php

$pageTitle = 'Dashboard';
$activePage = 'dashboard';
require_once 'templates/header_mahasiswa.php';

// --- Anda perlu menambahkan logika PHP di sini untuk mendapatkan data dinamis ---
// Contoh placeholder data (Anda harus menggantinya dengan query DB sungguhan)
// Asumsi Anda punya koneksi $conn dari config.php
// require_once '../config.php'; // Pastikan ini sudah di header_mahasiswa.php atau panggil di sini jika belum

// Contoh placeholder data (ganti dengan query database Anda)
$praktikum_diikuti = 0; // Ganti dengan SELECT COUNT(*) FROM pendaftaran WHERE id_mahasiswa = $_SESSION['user_id']
$tugas_selesai = 0;    // Ganti dengan SELECT COUNT(*) FROM laporan WHERE id_mahasiswa = $_SESSION['user_id'] AND status = 'Dinilai'
$tugas_menunggu = 0;   // Ganti dengan SELECT COUNT(*) FROM laporan WHERE id_mahasiswa = $_SESSION['user_id'] AND status = 'Menunggu Penilaian'

// Contoh notifikasi (ganti dengan query database Anda)
// SELECT * FROM notifikasi WHERE id_mahasiswa = $_SESSION['user_id'] ORDER BY created_at DESC LIMIT 5
$notifications = [
    [
        'type' => 'grade', // 'grade', 'deadline', 'registration'
        'message' => 'Nilai untuk <a href="detail_praktikum.php?id_praktikum=X&id_modul=Y" class="font-semibold text-blue-300 hover:underline">Modul 1: HTML & CSS</a> telah diberikan.',
        'icon' => '⭐' // Or a custom SVG for grades
    ],
    [
        'type' => 'deadline',
        'message' => 'Batas waktu pengumpulan laporan untuk <a href="detail_praktikum.php?id_praktikum=X&id_modul=Y" class="font-semibold text-yellow-300 hover:underline">Modul 2: PHP Native</a> adalah besok!',
        'icon' => '⏰' // Or a custom SVG for deadlines
    ],
    [
        'type' => 'registration',
        'message' => 'Anda berhasil mendaftar pada mata praktikum <a href="detail_praktikum.php?id_praktikum=X" class="font-semibold text-green-300 hover:underline">Jaringan Komputer</a>.',
        'icon' => '✅' // Or a custom SVG for registration
    ],
    [
        'type' => 'info',
        'message' => 'Modul baru telah ditambahkan ke <a href="detail_praktikum.php?id_praktikum=X" class="font-semibold text-purple-300 hover:underline">Praktikum Basis Data</a>.',
        'icon' => '✨'
    ],
];

// Pastikan untuk mengganti X dan Y dengan ID praktikum dan modul yang sebenarnya
// Misalnya:
// $stmt = $conn->prepare("SELECT COUNT(DISTINCT id_praktikum) FROM pendaftaran WHERE id_mahasiswa = ?");
// $stmt->bind_param("i", $_SESSION['user_id']);
// $stmt->execute();
// $stmt->bind_result($praktikum_diikuti);
// $stmt->fetch();
// $stmt->close();

?>

<div class="animate-fade-in-down bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-10 rounded-2xl shadow-xl mb-10 transform hover:scale-100 transition-all duration-300">
    <h1 class="text-4xl font-extrabold mb-2 leading-tight">Halo, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</h1>
    <p class="text-lg opacity-90">Jaga semangatmu tetap membara dalam setiap langkah praktikum.</p>
    <div class="mt-6">
        <a href="my_courses.php" class="inline-flex items-center bg-white text-blue-700 hover:bg-blue-100 font-semibold py-3 px-6 rounded-full shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
            Lihat Praktikum Saya
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
    
    <div class="bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center justify-center transform hover:scale-105 transition-all duration-300 ease-in-out border-b-4 border-blue-500">
        <div class="flex items-center justify-center bg-blue-50 text-blue-600 rounded-full w-16 h-16 mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
        </div>
        <div class="text-5xl font-extrabold text-blue-600">4</div>
        <div class="mt-3 text-xl text-gray-700 font-semibold text-center">Praktikum Diikuti</div>
    </div>
    
    <div class="bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center justify-center transform hover:scale-105 transition-all duration-300 ease-in-out border-b-4 border-green-500">
        <div class="flex items-center justify-center bg-green-50 text-green-600 rounded-full w-16 h-16 mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="text-5xl font-extrabold text-blue-600">1</div>
        <div class="mt-3 text-xl text-gray-700 font-semibold text-center">Tugas Selesai</div>
    </div>
    
    <div class="bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center justify-center transform hover:scale-105 transition-all duration-300 ease-in-out border-b-4 border-yellow-500">
        <div class="flex items-center justify-center bg-yellow-50 text-yellow-600 rounded-full w-16 h-16 mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="text-5xl font-extrabold text-blue-600">3</div>
        <div class="mt-3 text-xl text-gray-700 font-semibold text-center">Tugas Menunggu</div>
    </div>
    
</div>

<div class="bg-white p-8 rounded-2xl shadow-xl">
    <h3 class="text-3xl font-bold text-gray-800 mb-6">Notifikasi Terbaru</h3>
    <ul class="space-y-4">
        <?php if (!empty($notifications)): ?>
            <?php foreach ($notifications as $notification): ?>
                <li class="flex items-start p-4 rounded-lg
                    <?php
                        // Dynamically apply background color based on notification type
                        switch ($notification['type']) {
                            case 'grade': echo 'bg-blue-50 border-l-4 border-blue-500'; break;
                            case 'deadline': echo 'bg-yellow-50 border-l-4 border-yellow-500'; break;
                            case 'registration': echo 'bg-green-50 border-l-4 border-green-500'; break;
                            case 'info': echo 'bg-purple-50 border-l-4 border-purple-500'; break;
                            default: echo 'bg-gray-50 border-l-4 border-gray-200'; break;
                        }
                    ?>">
                    <span class="text-3xl flex-shrink-0 mr-4 mt-1"><?php echo htmlspecialchars($notification['icon']); ?></span>
                    <div class="flex-grow text-gray-800 text-lg leading-relaxed">
                        <?php echo $notification['message']; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="text-center text-gray-500 py-4">Belum ada notifikasi terbaru.</li>
        <?php endif; ?>
    </ul>
</div>

<?php
// Panggil Footer
require_once 'templates/footer_mahasiswa.php';
?>

<style>
    /* Custom keyframe for animation */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out forwards;
    }
</style>