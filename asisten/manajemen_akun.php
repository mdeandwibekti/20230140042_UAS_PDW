<?php
$pageTitle = 'Manajemen Akun';
$activePage = 'manajemen_akun'; // Akan kita tambahkan ke navigasi
require_once 'templates/header.php';
require_once '../config.php';

// Ambil semua pengguna dari database
$result = $conn->query("SELECT id, nama, email, role FROM users ORDER BY nama ASC");
?>

<div class="container mx-auto px-4 py-8">
    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'added'): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md mb-6 animate-fade-in-down" role="alert">
                <div class="flex items-center">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Akun Berhasil Ditambahkan!</p>
                        <p class="text-sm">Akun pengguna baru telah berhasil didaftarkan.</p>
                    </div>
                </div>
            </div>
        <?php elseif ($_GET['status'] == 'edited'): ?>
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-md mb-6 animate-fade-in-down" role="alert">
                <div class="flex items-center">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Akun Berhasil Diperbarui!</p>
                        <p class="text-sm">Data akun pengguna telah berhasil diubah.</p>
                    </div>
                </div>
            </div>
        <?php elseif ($_GET['status'] == 'deleted'): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-md mb-6 animate-fade-in-down" role="alert">
                <div class="flex items-center">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Akun Berhasil Dihapus!</p>
                        <p class="text-sm">Akun pengguna telah berhasil dihapus.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h2 class="text-3xl font-bold text-gray-800">Manajemen Akun Pengguna</h2>
            <a href="akun_tambah.php" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Akun Baru
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($user = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($user['nama']); ?></td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600"><?php echo htmlspecialchars($user['email']); ?></td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="capitalize px-3 py-1 text-xs font-semibold rounded-full
                                        <?php echo ($user['role'] == 'asisten') ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800'; ?>">
                                        <?php echo htmlspecialchars($user['role']); ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm">
                                    <a href="akun_edit.php?id=<?php echo $user['id']; ?>" class="inline-flex items-center bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1.5 px-3 rounded-md transition-colors duration-200 mr-2">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-7.65 7.65-2.828 2.828L7.05 13.05l7.65-7.65zM15 11l-3 3v2h2l3-3z"></path></svg>
                                        Edit
                                    </a>
                                    <?php if ($_SESSION['user_id'] != $user['id']): // Cegah admin menghapus dirinya sendiri ?>
                                        <a href="akun_hapus.php?id=<?php echo $user['id']; ?>" class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-medium py-1.5 px-3 rounded-md transition-colors duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus akun <?php echo htmlspecialchars($user['nama']); ?>?');">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 112 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd"></path></svg>
                                            Hapus
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="py-6 px-6 text-center text-gray-500 italic">Tidak ada akun pengguna ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$conn->close();
require_once 'templates/footer.php';
?>

<style>
/* Basic fade-in animation for messages */
@keyframes fade-in-down {
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
    animation: fade-in-down 0.5s ease-out forwards;
}
</style>