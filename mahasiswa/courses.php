<?php
$pageTitle = 'Cari Praktikum';
$activePage = 'courses';
require_once 'templates/header_mahasiswa.php';

// --- DATA STATIS (DUMMY) ---
// Nantinya, data ini akan diambil dari database melalui query SQL.
$daftarPraktikum = [
    [
        'id' => 1,
        'nama' => 'Pemrograman Web',
        'deskripsi' => 'Mempelajari dasar-dasar pengembangan web dengan HTML, CSS, PHP, dan MySQL.',
        'asisten' => 'Andi Budiman, S.Kom.'
    ],
    [
        'id' => 2,
        'nama' => 'Jaringan Komputer',
        'deskripsi' => 'Praktikum untuk memahami konsep dasar jaringan, topologi, dan konfigurasi perangkat.',
        'asisten' => 'Citra Lestari, M.T.'
    ],
    [
        'id' => 3,
        'nama' => 'Struktur Data',
        'deskripsi' => 'Implementasi struktur data seperti linked list, stack, queue, dan tree dalam bahasa C++.',
        'asisten' => 'Doni Firmansyah, S.T.'
    ],
    [
        'id' => 4,
        'nama' => 'Basis Data Lanjutan',
        'deskripsi' => 'Mempelajari optimasi query, stored procedure, dan trigger pada sistem database Oracle.',
        'asisten' => 'Elisa Putri, S.Kom.'
    ]
];

?>

<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-3 animate-fade-in-down">Temukan Praktikum Impianmu!</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto animate-fade-in-up">Jelajahi berbagai mata praktikum yang tersedia dan daftar untuk memperkaya pengalaman belajarmu.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <?php foreach ($daftarPraktikum as $praktikum) : ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 border border-gray-100 relative group animate-card-pop-in">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-tight"><?php echo htmlspecialchars($praktikum['nama']); ?></h3>
                    <p class="text-gray-500 text-sm mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        Oleh: <span class="font-semibold ml-1"><?php echo htmlspecialchars($praktikum['asisten']); ?></span>
                    </p>
                    <p class="text-gray-700 mb-6 h-20 overflow-hidden text-ellipsis line-clamp-3">
                        <?php echo htmlspecialchars($praktikum['deskripsi']); ?>
                    </p>
                    
                    <a href="daftar_action.php?id_praktikum=<?php echo $praktikum['id']; ?>" class="w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Daftar Praktikum
                    </a>
                </div>
                <div class="absolute inset-x-0 bottom-0 h-1.5 bg-gradient-to-r from-indigo-500 to-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require_once 'templates/footer_mahasiswa.php';
?>

<style>
/* Keyframe Animations */
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

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes cardPopIn {
    0% {
        opacity: 0;
        transform: scale(0.95);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

/* Apply Animations */
.animate-fade-in-down {
    animation: fadeInDown 0.8s ease-out forwards;
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards 0.2s; /* Slight delay for the paragraph */
}

.animate-card-pop-in {
    animation: cardPopIn 0.5s ease-out forwards;
    /* This will be managed by JS for staggered animation */
}
</style>

<script>
// Staggered animation for cards
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.animate-card-pop-in');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${0.1 * index + 0.5}s`; // Staggered delay + initial delay
        card.style.opacity = 0; // Hide initially
    });
});
</script>