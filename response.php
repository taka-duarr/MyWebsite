<?php
session_start();

include 'functions.php';



// Menangani aksi berdasarkan request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'] ? $_GET['action'] : $_POST['action'];

    switch ($action) {


        //user
        case 'login':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userFound = false;

            // Cek apakah user yang login sesuai dengan data user di session
            foreach ($_SESSION['users'] as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    $_SESSION['user_login'] = $user; // Simpan data user yang login ke session
                    $userFound = true;
                    break;
                }
            }

            if ($userFound) {
                $message = "Login berhasil!";
                // Data statis mahasiswa
                addMahasiswa('luthfi', 'john.doe@example.com', 'Informatika');
                addMahasiswa('hasan', 'jane.smith@example.com', 'Sistem Informasi');
                addMahasiswa('aril', 'jane.smith@example.com', 'Sistem Informasi');
                include_once 'dashboard.php';
                return;
            } else {
                $message = "Username atau password salah!";
            }
            break;

            
        case 'add_user':
             $username = $_POST['username'];
             $password = $_POST['password'];
             $message = addUser($username, $password);
             break;
        
        case 'delete_user':
             $id = $_POST['id'];
             $message = deleteUser($id);
             break;




        case 'update_user':
             $id = $_POST['id'];
             $username = $_POST['username'];
             $password = $_POST['password'];
             $message = updateUser($id, $username, $password);
             break;

        
        //mahasiswa
        case 'add_mahasiswa':

            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $jurusan = $_POST['jurusan'];
            $message = addMahasiswa($nama, $email, $jurusan);
             break;

        case 'delete_mahasiswa':
            $id = $_POST['id'];
            $message = deleteMahasiswa($id);
            break;

        // case 'getUpdateMhs':

        case 'update_mahasiswa':
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $jurusan = $_POST['jurusan'];
            $message = updateMahasiswa($id, $nama, $email, $jurusan);
            break;

        default:
            $message = "Aksi tidak dikenali!";
            break;
    }

    echo "<script>alert('$message'); window.location.href='index.php';</script>";
}
?>