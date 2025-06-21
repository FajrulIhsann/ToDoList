<?php
session_start();
include 'service/database.php';
$user = $_SESSION['username']; // pastikan sudah login
// Ambil data to-do user
$todos = mysqli_query($conn, "SELECT * FROM todos WHERE user_id = {$_SESSION['user_id']} ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php include "layout/nav-2.html" ?>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Profil Sidebar -->
        <div class="w-1/3 bg-white rounded-lg p-6 shadow-md">
            <div class="text-center">
                <img src="assets/user.png" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-xl font-bold"><?= $user ?></h2>
            </div>
        </div>

        <!-- To-do List Area -->
        <div class="w-2/3 p-8">
            <h1 class="text-2xl font-bold mb-4">Daftar Tugas</h1>

            <!-- Form Tambah -->
            <form action="service/tambah.php" method="post" class="flex mb-6">
                <input type="text" name="task" required placeholder="Tambahkan tugas baru..." class="flex-grow p-2 rounded-l-md border border-gray-300">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-md">Tambah</button>
            </form>

            <!-- Daftar Tugas -->
            <ul class="space-y-3">
                <?php while ($row = mysqli_fetch_assoc($todos)) : ?>
                    <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                        <span class="<?php echo $row['status'] === 'done' ? 'line-through text-gray-500' : ''; ?>">
                            <?= htmlspecialchars($row['task']) ?>
                        </span>
                        <div class="flex gap-2">
                            <a href="service/edit.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:underline">Edit</a>
                            <a href="service/hapus.php?id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Yakin?')">Hapus</a>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</body>
</html>