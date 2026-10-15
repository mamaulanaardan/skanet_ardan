<?php
include "koneksi.php";

$nip = $_GET['nip'];
$query = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$nip'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Guru</title>

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
            max-width: 500px;
            background: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 126, 167, 0.20);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #087ea4;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #7a8b94;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #176b87;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 13px 15px;
            border: 2px solid #c7eaf7;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            color: #444;
            background: #f8fdff;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #55c4eb;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(85, 196, 235, 0.25);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
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

        @media (max-width: 500px) {
            .container {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 26px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>✏️ Edit Data Guru</h1>
            <p>Silakan ubah data guru kemudian simpan</p>
        </div>

        <form action="update.php" method="POST">

            <div class="form-group">
                <label for="nip">NIP</label>
                <input 
                    type="text" 
                    id="nip"
                    name="nip" 
                    value="<?php echo $data['nip']; ?>"
                    readonly
                >
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input 
                    type="text" 
                    id="nama"
                    name="nama" 
                    value="<?php echo $data['nama']; ?>"
                    placeholder="Masukkan nama guru"
                    required
                >
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input 
                    type="text" 
                    id="alamat"
                    name="alamat" 
                    value="<?php echo $data['alamat']; ?>"
                    placeholder="Masukkan alamat"
                    required
                >
            </div>

            <div class="button-group">
                <a href="index.php" class="btn btn-kembali">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-simpan">
                    💾 Simpan
                </button>
            </div>

        </form>

    </div>

</body>
</html>
