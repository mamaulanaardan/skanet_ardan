<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "sukses") {
    header("location:../login.php");
    exit();
}

include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Nilai</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 550px;
            background: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 126, 167, 0.20);
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            background: #dff6ff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 32px;
        }

        .header h1 {
            color: #087ea4;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #78909c;
            font-size: 14px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #176b87;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #c7eaf7;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            color: #455a64;
            background: #f8fdff;
            transition: 0.3s;
        }

        .form-group select {
            cursor: pointer;
        }

        .form-group select:focus,
        .form-group input:focus {
            border-color: #4fc3f7;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(79, 195, 247, 0.25);
        }

        /* NILAI */
        .nilai-info {
            display: flex;
            justify-content: space-between;
            margin-top: 6px;
            color: #90a4ae;
            font-size: 12px;
        }

        /* BUTTON */
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 28px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-simpan {
            background: #4fc3f7;
            color: white;
            box-shadow: 0 5px 12px rgba(79, 195, 247, 0.3);
        }

        .btn-simpan:hover {
            background: #039bd3;
            transform: translateY(-2px);
        }

        .btn-kembali {
            background: #e8f7fc;
            color: #1685aa;
        }

        .btn-kembali:hover {
            background: #c9edf9;
            transform: translateY(-2px);
        }

        /* RESPONSIVE */
        @media (max-width: 500px) {

            .container {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 25px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div class="icon">
            📊
        </div>

        <h1>Tambah Data Nilai</h1>

        <p>
            Silakan isi data nilai siswa dengan lengkap
        </p>

    </div>


    <!-- FORM -->
    <form action="simpan.php" method="POST">

        <!-- SISWA -->
        <div class="form-group">

            <label for="nis">
                👨‍🎓 Nama Siswa
            </label>

            <select name="nis" id="nis" required>

                <option value="">
                    -- Pilih Siswa --
                </option>

                <?php

                $q_siswa = mysqli_query(
                    $koneksi,
                    "SELECT * FROM siswa"
                );

                while ($siswa = mysqli_fetch_array($q_siswa)) {

                    echo "<option value='" .
                        htmlspecialchars($siswa['nis']) .
                        "'>" .
                        htmlspecialchars($siswa['nama']) .
                        "</option>";

                }

                ?>

            </select>

        </div>


        <!-- GURU -->
        <div class="form-group">

            <label for="nip">
                👨‍🏫 Nama Guru
            </label>

            <select name="nip" id="nip" required>

                <option value="">
                    -- Pilih Guru --
                </option>

                <?php

                $q_guru = mysqli_query(
                    $koneksi,
                    "SELECT * FROM guru"
                );

                while ($guru = mysqli_fetch_array($q_guru)) {

                    echo "<option value='" .
                        htmlspecialchars($guru['nip']) .
                        "'>" .
                        htmlspecialchars($guru['nama']) .
                        "</option>";

                }

                ?>

            </select>

        </div>


        <!-- MAPEL -->
        <div class="form-group">

            <label for="id_mapel">
                📚 Mata Pelajaran
            </label>

            <select name="id_mapel" id="id_mapel" required>

                <option value="">
                    -- Pilih Mata Pelajaran --
                </option>

                <?php

                $q_mapel = mysqli_query(
                    $koneksi,
                    "SELECT * FROM mapel"
                );

                while ($mapel = mysqli_fetch_array($q_mapel)) {

                    echo "<option value='" .
                        htmlspecialchars($mapel['id_mapel']) .
                        "'>" .
                        htmlspecialchars($mapel['mapel']) .
                        "</option>";

                }

                ?>

            </select>

        </div>


        <!-- NILAI -->
        <div class="form-group">

            <label for="nilai">
                📝 Nilai
            </label>

            <input
                type="number"
                id="nilai"
                name="nilai"
                min="0"
                max="100"
                placeholder="Masukkan nilai 0 - 100"
                required
            >

            <div class="nilai-info">
                <span>Minimum: 0</span>
                <span>Maksimum: 100</span>
            </div>

        </div>


        <!-- BUTTON -->
        <div class="button-group">

            <a href="index.php" class="btn btn-kembali">
                ← Kembali
            </a>

            <button
                type="submit"
                class="btn btn-simpan">
                💾 Simpan
            </button>

        </div>

    </form>

</div>

</body>
</html>
