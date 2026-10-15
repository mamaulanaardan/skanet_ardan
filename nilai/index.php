<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header('location:../logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Nilai</title>

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
            max-width: 1100px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 126, 167, 0.20);
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon {
            width: 60px;
            height: 60px;
            background: #dff6ff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
        }

        .header h1 {
            color: #087ea4;
            font-size: 30px;
            margin-bottom: 5px;
        }

        .header p {
            color: #78909c;
            font-size: 14px;
        }

        /* BUTTON TAMBAH */
        .btn-tambah {
            background: #4fc3f7;
            color: white;
            text-decoration: none;
            padding: 13px 18px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 5px 12px rgba(79, 195, 247, 0.3);
        }

        .btn-tambah:hover {
            background: #039bd3;
            transform: translateY(-2px);
        }

        /* TABLE */
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

        thead {
            background: #54c8f5;
        }

        th {
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 14px;
            white-space: nowrap;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid #dceff6;
            color: #455a64;
            font-size: 14px;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #effaff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* NILAI */
        .nilai {
            display: inline-block;
            min-width: 45px;
            padding: 7px 10px;
            text-align: center;
            background: #dff6ff;
            color: #087ea4;
            border-radius: 8px;
            font-weight: bold;
        }

        /* AKSI */
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
            white-space: nowrap;
        }

        .btn-edit {
            background: #29b6f6;
        }

        .btn-edit:hover {
            background: #0288d1;
            transform: translateY(-2px);
        }

        .btn-hapus {
            background: #ff6b6b;
        }

        .btn-hapus:hover {
            background: #e53935;
            transform: translateY(-2px);
        }

        .empty {
            text-align: center;
            color: #90a4ae;
            padding: 30px;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {

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

            .header-left {
                align-items: flex-start;
            }

            .header h1 {
                font-size: 25px;
            }

            .btn-tambah {
                width: 100%;
                text-align: center;
            }

            th,
            td {
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

    <!-- HEADER -->
    <div class="header">

        <div class="header-left">

            <div class="icon">
                📊
            </div>

            <div>
                <h1>Data Nilai</h1>
                <p>Kelola nilai siswa sekolah</p>
            </div>

        </div>

        <a href="tambah.php" class="btn-tambah">
            ＋ Tambah Data Nilai
        </a>

    </div>


    <!-- TABLE -->
    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php

            $query = mysqli_query(
                $koneksi,
                "SELECT 
                    nilai.id_nilai,
                    siswa.nama AS namasiswa,
                    guru.nama AS namaguru,
                    mapel.mapel AS namamapel,
                    nilai.nilai
                FROM siswa, guru, mapel, nilai
                WHERE nilai.nis = siswa.nis
                AND nilai.nip = guru.nip
                AND nilai.id_mapel = mapel.id_mapel"
            );

            $no = 1;

            if (mysqli_num_rows($query) > 0) {

                while ($data = mysqli_fetch_array($query)) {

            ?>

                <tr>

                    <td>
                        <?php echo $no++; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['namasiswa']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['namaguru']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($data['namamapel']); ?>
                    </td>

                    <td>
                        <span class="nilai">
                            <?php echo htmlspecialchars($data['nilai']); ?>
                        </span>
                    </td>

                    <td>

                        <div class="aksi">

                            <a
                                href="edit.php?id_nilai=<?php echo urlencode($data['id_nilai']); ?>"
                                class="btn-edit">
                                ✏️ Edit
                            </a>

                            <a
                                href="hapus.php?id_nilai=<?php echo urlencode($data['id_nilai']); ?>"
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
                    <td colspan="6" class="empty">
                        📭 Belum ada data nilai
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
