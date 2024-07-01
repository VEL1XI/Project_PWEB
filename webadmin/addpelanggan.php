<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        form input, form button {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form button {
            background: #333;
            color: #fff;
            cursor: pointer;
        }
        form button:hover {
            background: #555;
        }
        table {
            width: 100%;
            max-width: 1000px;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            color: #fff;
            border-radius: 3px;
            margin-right: 5px;
        }
        .actions a.edit {
            background: #007bff;
        }
        .actions a.delete {
            background: #dc3545;
        }
    </style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html"><span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">UTAMA</div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="Pelanggan.php"><span>Pelanggan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="Pemasok.php"><span>Pemasok</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="Item.php"><span>Item</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="Rekening.php"><span>Rekening</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">TRANSAKSI</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"><span>Transaksi</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h2>PELANGGAN</h2>
                </nav>
                <!-- KONTEN KITA -->
                <div class="pasang-konten">
                    <div class="button-container">

                        <h2><?php echo isset($item) ? 'Edit Item' : 'Tambah Pelanggan'; ?></h2>
                    <form method="POST">
                        <input type="hidden" name="action" value="<?php echo isset($item) ? 'edit' : 'tambah'; ?>">
                        <?php if (isset($item)): ?>
                            <input type="hidden" name="kodeitem" value="<?php echo $item['kodeitem']; ?>">
                        <?php endif; ?>
                        Kode Item: <input type="text" name="kodeitem" value="<?php echo isset($item) ? $item['kodeitem'] : ''; ?>" <?php echo isset($item) ? 'readonly' : ''; ?> required><br>
                        Nama: <input type="text" name="nama" value="<?php echo isset($item) ? $item['nama'] : ''; ?>" required><br>
                        Harga Beli: <input type="number" name="hargabeli" value="<?php echo isset($item) ? $item['hargabeli'] : ''; ?>" required><br>
                        Harga Jual: <input type="number" name="hargajual" value="<?php echo isset($item) ? $item['hargajual'] : ''; ?>" required><br>
                        Stok: <input type="number" name="stok" value="<?php echo isset($item) ? $item['stok'] : ''; ?>" required><br>
                        Satuan: <input type="text" name="satuan" value="<?php echo isset($item) ? $item['satuan'] : ''; ?>" required><br>
                        <button type="submit"><?php echo isset($item) ? 'Update' : 'Tambah'; ?></button>
                    </form>

                        <?php
                        // Database connection
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "project_pweb";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Koneksi gagal: " . $conn->connect_error);
                        }



                        // Display table [UNTUK TABEL]
                        // if ($result_pelanggan->num_rows > 0) {
                        //     echo '<table>
                        //             <thead>
                        //                 <tr>';
                        //     // Table headers
                        //     $fields_pelanggan = $result_pelanggan->fetch_fields();
                        //     foreach ($fields_pelanggan as $field) {
                        //         echo "<th>{$field->name}</th>";
                        //     }
                        //     echo "<th>Aksi</th></tr></thead><tbody>";

                        //     // Table rows
                        //     while ($row = $result_pelanggan->fetch_assoc()) {
                        //         echo "<tr>";
                        //         foreach ($row as $key => $value) {
                        //             echo "<td>$value</td>";
                        //         }
                        //         echo "<td class='actions'>
                        //                 <a class='edit' href='?action=edit&kodepelanggan={$row['kodepelanggan']}'>Edit</a>
                        //                 <a class='delete' href='?action=hapus&kodepelanggan={$row['kodepelanggan']}' onclick='return confirm(\"Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                        //             </td>";
                        //         echo "</tr>";
                        //     }
                        //     echo '</tbody></table>';
                        // } else {
                        //     echo "<p>Tidak ada data ditemukan</p>";
                        // }

                        // Close connection
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
