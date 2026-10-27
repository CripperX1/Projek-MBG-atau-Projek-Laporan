<?php
session_start();
$nama = $_SESSION['old_nama'] ?? '';
$email = $_SESSION['old_email'] ?? '';
$errorNama = $_SESSION['err_nama'] ?? '';
$errorEmail = $_SESSION['err_email'] ?? '';
session_unset();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-slate-800 text-center mb-6">Form Pendaftaran</h2>
        
        <form method="POST" action="prosesForm.php" class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap:</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($nama);?>" 
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <span class="text-xs text-red-500 mt-1 block min-h-[16px]"><?= $errorNama;?></span>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email:</label>
                <input type="text" name="email" value="<?= htmlspecialchars($email);?>" 
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                <span class="text-xs text-red-500 mt-1 block min-h-[16px]"><?= $errorEmail;?></span>
            </div>
            
            <button type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg text-sm transition duration-200 shadow-md hover:shadow-lg mt-2">
                Daftar Sekarang
            </button>
        </form>
    </div>

</body>
</html>