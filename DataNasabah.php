<?php
include 'koneksi.php';


$sql = "SELECT * FROM nasabah";
$result = $conn->query($sql);

// session_start();
// if (!isset($_SESSION['login'])) {
//     header("Location: login.php");
//     exit;
// }


$conn->close();
?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Data Nasabah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white">
    <div class="bg-teal-500 p-4">
        <div class="flex items-center justify-between">
            <a href="#" class="text-white text-3xl mr-4">
                <i class="fas fa-chevron-right"></i>
            </a>
            <h1 class="text-white text-2xl font-bold text-center flex-grow">Data Nasabah</h1>
            <div class="w-10"></div> <!-- Placeholder to balance the flex layout -->
        </div>
        <div class="mt-4 flex space-x-2">
            <input type="text" placeholder="Cari Nasabah" class="bg-gray-200 text-black px-4 py-2 rounded" />
            <button class="bg-gray-400 text-black px-4 py-2 rounded" onclick="window.location.href= 'DaftarkanNasabah.php'">+ Tambah Nasabah</button>
        </div>
    </div>
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full bg-gray-300 text-left">
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Tanggal Regis</th>
                    <th class="py-2 px-4">Nasabah</th>
                    <th class="py-2 px-4">Alamat</th>
                    <th class="py-2 px-4">Telepon</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <?php
                if ($result->num_rows > 0) {
                    $counter = 1;
                    while ($row = $result->fetch_assoc()) {
                        // $id = $row['id'];
                        // $saldo = $row['masuk'] + $row['keluar'];
                ?>
            <tbody>
                <tr>
                    <td class="py-2 px-4"><?php echo $counter; ?></td>
                    <td class="py-2 px-4"><?php echo $row["tanggal"]; ?></td>
                    <td class="py-2 px-4"><?php echo $row["nama"]; ?></td>
                    <td class="py-2 px-4"><?php echo $row["alamat"]; ?></td>
                    <td class="py-2 px-4"><?php echo $row["kontak"]; ?></td>
                    <td class="py-2 px-4">
                        <i class="fas fa-trash-alt text-gray-600 cursor-pointer"></i>
                        <i class="fas fa-edit text-gray-600 cursor-pointer ml-2"></i>
                        <i class="fas fa-eye text-gray-600 cursor-pointer ml-2"></i>
                    </td>
                </tr>
                <!-- Repeat for each row as needed -->
            </tbody>
            <?php
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='12'>No data available</td></tr>";
                }
                ?>
            <!-- <tbody>
                <tr>
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">01/01/2023</td>
                    <td class="py-2 px-4">John Doe</td>
                    <td class="py-2 px-4">123 Main St</td>
                    <td class="py-2 px-4">123-456-7890</td>
                    <td class="py-2 px-4">
                        <i class="fas fa-trash-alt text-gray-600 cursor-pointer"></i>
                        <i class="fas fa-edit text-gray-600 cursor-pointer ml-2"></i>
                        <i class="fas fa-eye text-gray-600 cursor-pointer ml-2"></i>
                    </td>
                </tr>
            </tbody> -->
        </table>
    </div>
</body>

</html>