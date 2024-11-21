<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
        <?php if (isset($message)) echo "<p class='text-red-600 text-center'>$message</p>"; ?>

        <form method="POST" action="response.php?action=login">
            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                <input type="text" name="username" id="username"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                    required>
            </div>
            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">Login</button>
        </form>

        <p class="mt-4 text-center text-sm">Belum punya akun? <a href="registrasi.php"
                class="text-blue-600 hover:underline">Daftar</a></p>
    </div>

</body>

</html>