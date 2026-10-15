<?php
include "koneksi.php";

$id_mapel = $_GET['id_mapel'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mapel WHERE id_mapel='$id_mapel'"
);

$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mapel</title>

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

        .icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            background: #dff6ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
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
            padding: 14px 15px;
            border: 2px solid #c7eaf7;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            color: #455a64;
            background: #f8fdff;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #4fc3f7;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(79, 195, 247, 0.25);
        }

        /* ID Mapel tidak diubah */
        .form-group input[readonly] {
            background: #eef9fd;
            color: #78909c;
            cursor: not-allowed;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
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

        <div class="header">
            <div class="icon">📚</div>
            <h1>Edit Data Mapel</h1>
            <p>Silakan ubah data mata pelajaran</p>
        </div>

        <form action="update.php" method="POST">

            <div class="form-group">
                <label for="id_mapel">ID Mapel</label>
                <input
                    type="text"
                    id="id_mapel"
                    name="id_mapel"
                    value="<?php echo htmlspecialchars($data['id_mapel']); ?>"
                    readonly
                >
            </div>

            <div class="form-group">
                <label for="mapel">Nama Mata Pelajaran</label>
                <input
                    type="text"
                    id="mapel"
                    name="mapel"
                    value="<?php echo htmlspecialchars($data['mapel']); ?>"
                    placeholder="Masukkan nama mata pelajaran"
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
