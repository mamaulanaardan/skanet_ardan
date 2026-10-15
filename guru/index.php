<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #dff6ff, #9edcff);
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 126, 167, 0.20);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #087ea4;
            font-size: 30px;
        }

        .header p {
            color: #78909c;
            margin-top: 5px;
            font-size: 14px;
        }

        .btn-tambah {
            background: #4fc3f7;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 5px 12px rgba(79, 195, 247, 0.3);
        }

        .btn-tambah:hover {
            background: #039bd3;
            transform: translateY(-2px);
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        table th {
            background: #54c8f5;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 15px;
        }

        table td {
            padding: 14px 15px;
            border-bottom: 1px solid #dceff6;
            color: #455a64;
        }

        table tbody tr {
            transition: 0.2s;
        }

        table tbody tr:hover {
            background: #effaff;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        .aksi {
            display: flex;
            gap: 8px;
        }

        .btn-edit,
        .btn-hapus {
            text-decoration: none;
            padding: 8px 13px;
            border-radius: 7px;
            color: white;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-edit {
            background: #29b6f6;
        }

        .btn-edit:hover {
            background: #0288d1;
        }

        .btn-hapus {
            background: #ff6b6b;
        }

        .btn-hapus:hover {
            background: #e53935;
        }

        .empty {
            text-align: center;
            color: #90a4ae;
            padding: 25px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .container {
                padding: 20px 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header h1 {
                font-size: 25px;
            }

            .btn-tambah {
                width: 100%;
                text-align: center;
            }

            table th,
            table td {
                padding: 12px 10px;
                font-size: 13px;
            }

            .aksi {
                flex-direction: column;
            }

            .btn-edit,
            .btn-hapus {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>👨‍🏫 Data Guru</h1>
            <p>Kelola data guru sekolah</p>
        </div>

        <a href="tambah.php" class="btn-tambah">
            ＋ Tambah Data
        </a>
    </div>

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM guru");

            if (mysqli_num_rows($query) > 0) {

                while ($data = mysqli_fetch_array($query)) {
            ?>

                <tr>
                    <td><?php echo $no++; ?></td>

                    <td>
                        <?php echo htmlspecialchars($data['nip']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['nama']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['alamat']); ?>
                    </td>

                    <td>
                        <div class="aksi">

                            <a 
                                href="edit.php?nip=<?php echo urlencode($data['nip']); ?>" 
                                class="btn-edit">
                                ✏️ Edit
                            </a>

                            <a 
                                href="hapus.php?nip=<?php echo urlencode($data['nip']); ?>" 
                                class="btn-hapus"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                🗑️ Hapus
                            </a>

                        </div>
                    </td>
                </tr>

            <?php
                }

            } else {
            ?>

                <tr>
                    <td colspan="5" class="empty">
                        📭 Belum ada data guru
                    </td>
                </tr>

            <?php
            }
            ?>

            </tbody>
        </table>

    </div>

</div>

</body>
</html>
