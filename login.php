<?php
session_start();
require_once 'config.php';

// Jika sudah login, redirect ke halaman yang sesuai
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'asisten') {
        header("Location: asisten/dashboard.php");
    } elseif ($_SESSION['role'] == 'mahasiswa') {
        header("Location: mahasiswa/dashboard.php");
    }
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $message = "Email dan password harus diisi!";
    } else {
        $sql = "SELECT id, nama, email, password, role FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password benar, simpan semua data penting ke session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];

                // Logika untuk mengarahkan pengguna berdasarkan peran (role)
                if ($user['role'] == 'asisten') {
                    header("Location: asisten/dashboard.php");
                    exit();
                } elseif ($user['role'] == 'mahasiswa') {
                    header("Location: mahasiswa/dashboard.php");
                    exit();
                } else {
                    // Fallback jika peran tidak dikenali
                    $message = "Peran pengguna tidak valid.";
                }

            } else {
                $message = "Password yang Anda masukkan salah.";
            }
        } else {
            $message = "Akun dengan email tersebut tidak ditemukan.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Praktikum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif; /* Modern sans-serif font */
            background: linear-gradient(135deg,rgb(34, 60, 176) 0%,rgb(0, 225, 255) 100%); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Use min-height for better responsiveness */
            margin: 0;
            padding: 20px; /* Add padding for small screens */
            box-sizing: border-box; /* Include padding in element's total width and height */
        }
        .login-card {
            background-color: #ffffff;
            padding: 2.5rem; /* Increased padding */
            border-radius: 1rem; /* More rounded corners */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* Stronger, softer shadow */
            width: 100%;
            max-width: 420px; /* Increased max-width */
            animation: fadeIn 0.8s ease-out; /* Simple fade-in animation */
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group input {
            transition: all 0.2s ease-in-out; /* Smooth transition for focus */
        }
        .form-group input:focus {
            border-color: #6366f1; /* Indigo color on focus */
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2); /* Soft shadow on focus */
            outline: none; /* Remove default outline */
        }
        .btn {
            transition: all 0.2s ease-in-out; /* Smooth transition for button hover */
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-2">Selamat Datang!</h2>
            <p class="text-gray-600">Silakan login ke akun Anda.</p>
        </div>

        <?php 
            if (isset($_GET['status']) && $_GET['status'] == 'registered') {
                echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">';
                echo '<strong class="font-bold">Sukses!</strong>';
                echo '<span class="block sm:inline ml-2">Registrasi berhasil! Silakan login.</span>';
                echo '</div>';
            }
            if (!empty($message)) {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">';
                echo '<strong class="font-bold">Error!</strong>';
                echo '<span class="block sm:inline ml-2">' . $message . '</span>';
                echo '</div>';
            }
        ?>

        <form action="login.php" method="post">
            <div class="mb-5">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 placeholder-gray-400" 
                    placeholder="nama@contoh.com"
                >
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 placeholder-gray-400"
                    placeholder="••••••••"
                >
            </div>
            <button 
                type="submit" 
                class="btn w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-4 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-lg"
            >
                Login
            </button>
        </form>

        <div class="text-center mt-6">
            <p class="text-gray-600">Belum punya akun? <a href="register.php" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-200">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>