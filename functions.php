<?php

// Simulasi data User dan Mahasiswa dalam session
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [];
}

// Fungsi untuk menyimpan data User ke session
// Fungsi untuk menyimpan data User ke session
function saveUserToSession(array $users) {
    $_SESSION['users'] = $users;
}

// Fungsi untuk menyimpan data Mahasiswa ke session
function saveMahasiswaToSession($mahasiswa) {
    $_SESSION['mahasiswa'][] = $mahasiswa; // Tambah data mahasiswa ke dalam array mahasiswa di sesi
}

// Fungsi untuk menambah User
function addUser($username, $password) {
    // Periksa jika $_SESSION['users'] adalah array, jika tidak, inisialisasi sebagai array kosong
    if (!is_array($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }
    
    $newUser = [
        'id' => count($_SESSION['users']) + 1,
        'username' => $username,
        'password' => $password
    ];
    
    $_SESSION['users'][] = $newUser; // Tambahkan user baru ke array users
    saveUserToSession($_SESSION['users']); // Simpan data User setelah ditambahkan
    return "User berhasil ditambahkan!";
}

// Fungsi untuk menambah Mahasiswa
function addMahasiswa($nama, $email, $jurusan) {
    $npm = generateNpm();
    $newMahasiswa = [
        'id' => count($_SESSION['mahasiswa']) + 1,
        'nama' => $nama,
        'npm' => $npm,
        'email' => $email,
        'jurusan' => $jurusan
    ];
    
    saveMahasiswaToSession($newMahasiswa); // Simpan data Mahasiswa setelah ditambahkan
    return "Mahasiswa berhasil ditambahkan!";
}

// Fungsi untuk mendapatkan semua User
function getAllUsers() {
    return $_SESSION['users'];
}

// Fungsi untuk mendapatkan semua Mahasiswa
function getAllMahasiswa() {
    return $_SESSION['mahasiswa'];
}

// Fungsi untuk generate NPM (Nomor Pokok Mahasiswa)
function generateNpm() {
    return rand(1000000000, 9999999999); // NPM acak
}

// Fungsi untuk menghapus User berdasarkan ID
function deleteUser($id) {
    foreach ($_SESSION['users'] as $index => $user) {
        if ($user['id'] == $id) {
            unset($_SESSION['users'][$index]);
            $_SESSION['users'] = array_values($_SESSION['users']); // Reset array keys
            return "User berhasil dihapus!";
        }
    }
    return "User tidak ditemukan!";
}

// Fungsi untuk menghapus Mahasiswa berdasarkan ID
function deleteMahasiswa($id) {
    foreach ($_SESSION['mahasiswa'] as $index => $mahasiswa) {
        if ($mahasiswa['id'] == $id) {
            unset($_SESSION['mahasiswa'][$index]);
            $_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']); // Reset array keys
            return "Mahasiswa berhasil dihapus!";
        }
    }
    return "Mahasiswa tidak ditemukan!";
}

// Fungsi untuk mengupdate User berdasarkan ID
function updateUser($id, $username, $password) {
    foreach ($_SESSION['users'] as &$user) {
        if ($user['id'] == $id) {
            $user['username'] = $username;
            $user['password'] = $password;
            return "User berhasil diupdate!";
        }
    }
    return "User tidak ditemukan!";
}

// Fungsi untuk mengupdate Mahasiswa berdasarkan ID
function updateMahasiswa($id, $nama, $email, $jurusan) {
    foreach ($_SESSION['mahasiswa'] as &$mahasiswa) {
        if ($mahasiswa['id'] == $id) {
            $mahasiswa['nama'] = $nama;
            $mahasiswa['email'] = $email;
            $mahasiswa['jurusan'] = $jurusan;
            return "Mahasiswa berhasil diupdate!";
        }
    }
    return "Mahasiswa tidak ditemukan!";
}
?>