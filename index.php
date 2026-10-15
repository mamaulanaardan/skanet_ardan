<?php
session_start();

if ($_SESSION['status'] <> "sukses") {
    header('location:logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #dff6ff, #a8ddff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 650px;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 123, 180, 0.2);
            text-align: center;
        }

        h1 {
            color: #087ea4;
            margin-bottom: 10px;
            font-size: 32px;
        }

        .subtitle {
            color: #6b7c85;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .menu {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .menu li a {
            display: block;
            text-decoration: none;
            background: #6ecff6;
            color: white;
            padding: 18px 15px;
            border-radius: 12px;
            font-size: 17px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 5px 12px rgba(46, 169, 216, 0.25);
        }

        .menu li a:hover {
            background: #159dcc;
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(46, 169, 216, 0.35);
        }

        .logout {
            margin-top: 20px;
        }

        .logout a {
            display: block;
            text-decoration: none;
            background: #ff6b6b;
            color: white;
            padding: 15px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout a:hover {
            background: #e74c3c;
            transform: translateY(-3px);
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            .menu {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Menu Utama</h1>
        <p class="subtitle">Sistem Informasi Akademik</p>

        <ul class="menu">
            <li><a href="siswa">👨‍🎓 Siswa</a></li>
            <li><a href="guru">👨‍🏫 Guru</a></li>
            <li><a href="nilai">📊 Nilai</a></li>
            <li><a href="mapel">📚 Mata Pelajaran</a></li>
        </ul>

        <div class="logout">
            <a href="logout.php">🚪 Logout</a>
        </div>

    </div>

</body>
</html>
