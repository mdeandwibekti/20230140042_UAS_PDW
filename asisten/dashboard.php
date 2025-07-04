<?php
// 1. Definisi Variabel untuk Template
$pageTitle = 'Dashboard';
$activePage = 'dashboard';

// 2. Panggil Header
require_once 'templates/header.php';
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
        <div class="flex items-center space-x-4">
            <div class="bg-blue-200 p-3 rounded-full shadow-md">
                <svg class="w-8 h-8 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
            </div>
            <div>
                <p class="text-sm text-blue-100">Total Modul Diajarkan</p>
                <p class="text-3xl font-extrabold text-white">4</p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
        <div class="flex items-center space-x-4">
            <div class="bg-green-200 p-3 rounded-full shadow-md">
                <svg class="w-8 h-8 text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-sm text-green-100">Total Laporan Masuk</p>
                <p class="text-3xl font-extrabold text-white">15</p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
        <div class="flex items-center space-x-4">
            <div class="bg-yellow-200 p-3 rounded-full shadow-md">
                <svg class="w-8 h-8 text-yellow-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-sm text-yellow-100">Laporan Belum Dinilai</p>
                <p class="text-3xl font-extrabold text-white">10</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-8 rounded-xl shadow-lg mt-8">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Aktivitas Laporan Terbaru</h3>
    <div class="space-y-6">
        <div class="flex items-center bg-gray-50 p-4 rounded-lg shadow-sm">
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-4 flex-shrink-0">
                <span class="font-bold text-blue-600 text-lg">BS</span>
            </div>
            <div>
                <p class="text-gray-800 text-lg"><strong>bekti</strong> mengumpulkan praktikum UAS></p>
                <p class="text-sm text-gray-500 mt-1">10 menit lalu</p>
            </div>
        </div>
        <div class="flex items-center bg-gray-50 p-4 rounded-lg shadow-sm">
            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center mr-4 flex-shrink-0">
                <span class="font-bold text-purple-600 text-lg">CL</span>
            </div>
            <div>
                <p class="text-gray-800 text-lg"><strong>Citra Lestari</strong> mengumpulkan laporan untuk <strong class="text-purple-600">Modul 2</strong></p>
                <p class="text-sm text-gray-500 mt-1">45 menit lalu</p>
            </div>
        </div>
        <div class="flex items-center bg-gray-50 p-4 rounded-lg shadow-sm">
            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mr-4 flex-shrink-0">
                <span class="font-bold text-green-600 text-lg">AD</span>
            </div>
            <div>
                <p class="text-gray-800 text-lg"><strong>Andi Darmawan</strong> mengumpulkan laporan untuk <strong class="text-green-600">Modul 1</strong></p>
                <p class="text-sm text-gray-500 mt-1">1 jam lalu</p>
            </div>
        </div>
    </div>
</div>

<?php
// 3. Panggil Footer
require_once 'templates/footer.php';
?>