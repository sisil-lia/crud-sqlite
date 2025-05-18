<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Tugas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: #fff;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        h2 {
            color: #2c3e50;
        }
        .tugas {
            background: #ecf0f1;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .tugas span {
            font-weight: bold;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 30px 0;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Koneksi ke database SQLite
try {
    $conn = new PDO("sqlite:database.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div class='success'>Berhasil terkoneksi ke database.</div>";
} catch (PDOException $e) {
    die("<div class='error'>Koneksi gagal: " . $e->getMessage() . "</div>");
}

// --- CREATE ---
$deskripsiBaru = 'Tidur siang';
$waktuBaru = 90;
$sql = 'INSERT INTO tugas(deskripsi, waktu) VALUES(:deskripsi, :waktu)';
$statement = $conn->prepare($sql);
$statement->execute([
    ':deskripsi' => $deskripsiBaru,
    ':waktu' => $waktuBaru
]);
$tugas_id_baru = $conn->lastInsertId();
echo "<h2>CREATE</h2>";
echo "<div class='success'>Tugas baru berhasil ditambahkan dengan ID: $tugas_id_baru</div>";


// --- READ ALL ---
echo "<h2>READ - Semua Tugas</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas';
$statement = $conn->query($sql);
$tugas = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($tugas) {
    foreach ($tugas as $t) {
        echo "<div class='tugas'><span>ID {$t['id']}:</span> {$t['deskripsi']} ({$t['waktu']} menit)</div>";
    }
} else {
    echo "<div class='error'>Belum ada tugas.</div>";
}


// --- READ DETAIL ---
$idDetail = 1;
echo "<hr><h2>READ - Detail Tugas ID $idDetail</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDetail, PDO::PARAM_INT);
$statement->execute();
$tugasDetail = $statement->fetch(PDO::FETCH_ASSOC);

if ($tugasDetail) {
    echo "<div class='tugas'><span>ID {$tugasDetail['id']}:</span> {$tugasDetail['deskripsi']} ({$tugasDetail['waktu']} menit)</div>";
} else {
    echo "<div class='error'>Tugas dengan ID $idDetail tidak ditemukan.</div>";
}


// --- UPDATE ---
echo "<hr><h2>UPDATE</h2>";
$tugasUpdate = [
    'id' => 1,
    'deskripsi' => 'Hiking Gunung Batur',
    'waktu' => 50
];

$sql = 'UPDATE tugas SET deskripsi = :deskripsi, waktu = :waktu WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $tugasUpdate['id'], PDO::PARAM_INT);
$statement->bindParam(':deskripsi', $tugasUpdate['deskripsi']);
$statement->bindParam(':waktu', $tugasUpdate['waktu'], PDO::PARAM_INT);

if ($statement->execute()) {
    echo "<div class='success'>Tugas dengan ID {$tugasUpdate['id']} berhasil diupdate!</div>";
} else {
    echo "<div class='error'>Gagal mengupdate tugas.<<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Tugas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: #fff;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        h2 {
            color: #2c3e50;
        }
        .tugas {
            background: #ecf0f1;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .tugas span {
            font-weight: bold;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 30px 0;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Koneksi ke database SQLite
try {
    $conn = new PDO("sqlite:database.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div class='success'>Berhasil terkoneksi ke database.</div>";
} catch (PDOException $e) {
    die("<div class='error'>Koneksi gagal: " . $e->getMessage() . "</div>");
}

// --- CREATE ---
$deskripsiBaru = 'Tidur siang';
$waktuBaru = 90;
$sql = 'INSERT INTO tugas(deskripsi, waktu) VALUES(:deskripsi, :waktu)';
$statement = $conn->prepare($sql);
$statement->execute([
    ':deskripsi' => $deskripsiBaru,
    ':waktu' => $waktuBaru
]);
$tugas_id_baru = $conn->lastInsertId();
echo "<h2>CREATE</h2>";
echo "<div class='success'>Tugas baru berhasil ditambahkan dengan ID: $tugas_id_baru</div>";


// --- READ ALL ---
echo "<h2>READ - Semua Tugas</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas';
$statement = $conn->query($sql);
$tugas = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($tugas) {
    foreach ($tugas as $t) {
        echo "<div class='tugas'><span>ID {$t['id']}:</span> {$t['deskripsi']} ({$t['waktu']} menit)</div>";
    }
} else {
    echo "<div class='error'>Belum ada tugas.</div>";
}


// --- READ DETAIL ---
$idDetail = 1;
echo "<hr><h2>READ - Detail Tugas ID $idDetail</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDetail, PDO::PARAM_INT);
$statement->execute();
$tugasDetail = $statement->fetch(PDO::FETCH_ASSOC);

if ($tugasDetail) {
    echo "<div class='tugas'><span>ID {$tugasDetail['id']}:</span> {$tugasDetail['deskripsi']} ({$tugasDetail['waktu']} menit)</div>";
} else {
    echo "<div class='error'>Tugas dengan ID $idDetail tidak ditemukan.</div>";
}


// --- UPDATE ---
echo "<hr><h2>UPDATE</h2>";
$tugasUpdate = [
    'id' => 1,
    'deskripsi' => 'Hiking Gunung Batur',
    'waktu' => 50
];

$sql = 'UPDATE tugas SET deskripsi = :deskripsi, waktu = :waktu WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $tugasUpdate['id'], PDO::PARAM_INT);
$statement->bindParam(':deskripsi', $tugasUpdate['deskripsi']);
$statement->bindParam(':waktu', $tugasUpdate['waktu'], PDO::PARAM_INT);

if ($statement->execute()) {
    echo "<div class='success'>Tugas dengan ID {$tugasUpdate['id']} berhasil diupdate!</div>";
} else {
    echo "<div class='error'>Gagal mengupdate tugas.</div>";
}


// --- DELETE ---
echo "<hr><h2>DELETE</h2>";
$idDelete = 1;
$sql = 'DELETE FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDelete, PDO::PARAM_INT);

if ($statement->execute()) {
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Tugas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: #fff;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        h2 {
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Tugas</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: #fff;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        h2 {
            color: #2c3e50;
        }
        .tugas {
            background: #ecf0f1;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .tugas span {
            font-weight: bold;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 30px 0;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Koneksi ke database SQLite
try {
    $conn = new PDO("sqlite:database.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div class='success'>Berhasil terkoneksi ke database.</div>";
} catch (PDOException $e) {
    die("<div class='error'>Koneksi gagal: " . $e->getMessage() . "</div>");
}

// --- CREATE ---
$deskripsiBaru = 'Tidur siang';
$waktuBaru = 90;
$sql = 'INSERT INTO tugas(deskripsi, waktu) VALUES(:deskripsi, :waktu)';
$statement = $conn->prepare($sql);
$statement->execute([
    ':deskripsi' => $deskripsiBaru,
    ':waktu' => $waktuBaru
]);
$tugas_id_baru = $conn->lastInsertId();
echo "<h2>CREATE</h2>";
echo "<div class='success'>Tugas baru berhasil ditambahkan dengan ID: $tugas_id_baru</div>";


// --- READ ALL ---
echo "<h2>READ - Semua Tugas</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas';
$statement = $conn->query($sql);
$tugas = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($tugas) {
    foreach ($tugas as $t) {
        echo "<div class='tugas'><span>ID {$t['id']}:</span> {$t['deskripsi']} ({$t['waktu']} menit)</div>";
    }
} else {
    echo "<div class='error'>Belum ada tugas.</div>";
}


// --- READ DETAIL ---
$idDetail = 1;
echo "<hr><h2>READ - Detail Tugas ID $idDetail</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDetail, PDO::PARAM_INT);
$statement->execute();
$tugasDetail = $statement->fetch(PDO::FETCH_ASSOC);

if ($tugasDetail) {
    echo "<div class='tugas'><span>ID {$tugasDetail['id']}:</span> {$tugasDetail['deskripsi']} ({$tugasDetail['waktu']} menit)</div>";
} else {
    echo "<div class='error'>Tugas dengan ID $idDetail tidak ditemukan.</div>";
}


// --- UPDATE ---
echo "<hr><h2>UPDATE</h2>";
$tugasUpdate = [
    'id' => 1,
    'deskripsi' => 'Hiking Gunung Batur',
    'waktu' => 50
];

$sql = 'UPDATE tugas SET deskripsi = :deskripsi, waktu = :waktu WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $tugasUpdate['id'], PDO::PARAM_INT);
$statement->bindParam(':deskripsi', $tugasUpdate['deskripsi']);
$statement->bindParam(':waktu', $tugasUpdate['waktu'], PDO::PARAM_INT);

if ($statement->execute()) {
    echo "<div class='success'>Tugas dengan ID {$tugasUpdate['id']} berhasil diupdate!</div>";
} else {
    echo "<div class='error'>Gagal mengupdate tugas.</div>";
}


// --- DELETE ---
echo "<hr><h2>DELETE</h2>";
$idDelete = 1;
$sql = 'DELETE FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDelete, PDO::PARAM_INT);

if ($statement->execute()) {
    echo "<div class='success'>Tugas dengan ID $idDelete berhasil dihapus!</div>";
} else {
    echo "<div class='error'>Gagal menghapus tugas dengan ID $idDelete.</div>";
}
?>
</div>
</body>
</html>
            color: #2c3e50;
        }
        .tugas {
            background: #ecf0f1;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .tugas span {
            font-weight: bold;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 30px 0;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Koneksi ke database SQLite
try {
    $conn = new PDO("sqlite:database.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div class='success'>Berhasil terkoneksi ke database.</div>";
} catch (PDOException $e) {
    die("<div class='error'>Koneksi gagal: " . $e->getMessage() . "</div>");
}

// --- CREATE ---
$deskripsiBaru = 'Tidur siang';
$waktuBaru = 90;
$sql = 'INSERT INTO tugas(deskripsi, waktu) VALUES(:deskripsi, :waktu)';
$statement = $conn->prepare($sql);
$statement->execute([
    ':deskripsi' => $deskripsiBaru,
    ':waktu' => $waktuBaru
]);
$tugas_id_baru = $conn->lastInsertId();
echo "<h2>CREATE</h2>";
echo "<div class='success'>Tugas baru berhasil ditambahkan dengan ID: $tugas_id_baru</div>";


// --- READ ALL ---
echo "<h2>READ - Semua Tugas</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas';
$statement = $conn->query($sql);
$tugas = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($tugas) {
    foreach ($tugas as $t) {
        echo "<div class='tugas'><span>ID {$t['id']}:</span> {$t['deskripsi']} ({$t['waktu']} menit)</div>";
    }
} else {
    echo "<div class='error'>Belum ada tugas.</div>";
}


// --- READ DETAIL ---
$idDetail = 1;
echo "<hr><h2>READ - Detail Tugas ID $idDetail</h2>";
$sql = 'SELECT id, deskripsi, waktu FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDetail, PDO::PARAM_INT);
$statement->execute();
$tugasDetail = $statement->fetch(PDO::FETCH_ASSOC);

if ($tugasDetail) {
    echo "<div class='tugas'><span>ID {$tugasDetail['id']}:</span> {$tugasDetail['deskripsi']} ({$tugasDetail['waktu']} menit)</div>";
} else {
    echo "<div class='error'>Tugas dengan ID $idDetail tidak ditemukan.</div>";
}


// --- UPDATE ---
echo "<hr><h2>UPDATE</h2>";
$tugasUpdate = [
    'id' => 1,
    'deskripsi' => 'Hiking Gunung Batur',
    'waktu' => 50
];

$sql = 'UPDATE tugas SET deskripsi = :deskripsi, waktu = :waktu WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $tugasUpdate['id'], PDO::PARAM_INT);
$statement->bindParam(':deskripsi', $tugasUpdate['deskripsi']);
$statement->bindParam(':waktu', $tugasUpdate['waktu'], PDO::PARAM_INT);

if ($statement->execute()) {
    echo "<div class='success'>Tugas dengan ID {$tugasUpdate['id']} berhasil diupdate!</div>";
} else {
    echo "<div class='error'>Gagal mengupdate tugas.</div>";
}


// --- DELETE ---
echo "<hr><h2>DELETE</h2>";
$idDelete = 1;
$sql = 'DELETE FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $idDelete, PDO::PARAM_INT);

if ($statement->execute()) {
    echo "<div class='success'>Tugas dengan ID $idDelete berhasil dihapus!</div>";
} else {
    echo "<div class='error'>Gagal menghapus tugas dengan ID $idDelete.</div>";
}
?>
</div>
</body>
</html>
    echo "<div class='success'>Tugas dengan ID $idDelete berhasil dihapus!</div>";
} else {
    echo "<div class='error'>Gagal menghapus tugas dengan ID $idDelete.</div>";
}
?>
</div>
</body>
</html>

