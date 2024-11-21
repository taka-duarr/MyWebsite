<?php
require_once 'functions.php';




// var_dump($_SESSION['mahasiswa']);
$mhs = getAllMahasiswa()
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen">

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Selamat datang,
            <!-- <?php echo $_SESSION['users'][$_SESSION['user_id'] - 1]['username']; ?></h2> -->

            <form method="POST" class="mb-4">
                <button type="submit" name="logout"
                    class="py-2 px-4 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none">Logout</button>
            </form>

            <a href="response.php?action=add_mahasiswa"
                class="inline-block mb-4 text-white bg-green-600 py-2 px-4 rounded-md hover:bg-green-700">Tambah
                Mahasiswa</a>

            <h3 class="text-xl font-semibold mb-4">Data Mahasiswa</h3>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Jurusan</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mhs as $mahasiswa) : ?>
                    <tr>
                        <td class="px-4 py-2 border"><?php echo $mahasiswa['nama']; ?></td>
                        <td class="px-4 py-2 border"><?php echo $mahasiswa['email']; ?></td>
                        <td class="px-4 py-2 border"><?php echo $mahasiswa['jurusan']; ?></td>
                        <td class="px-4 py-2 border">
                            <form method="POST" action="response.php?action=update_mahasiswa" class="inline">
                                <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>">
                                <button type="submit" name="update_mahasiswa"
                                    class="text-blue-600 hover:underline">Update</button>
                            </form>
                            <form method="POST" action="response.php?action=delete_mahasiswa" class="inline ml-2">
                                <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>">
                                <button type="submit" name="delete_mahasiswa"
                                    class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>

</body>

</html>