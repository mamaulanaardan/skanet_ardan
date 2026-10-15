<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Data Siswa</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;

            background:
                linear-gradient(
                    135deg,
                    #dff6ff,
                    #9edcff
                );

            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 1000px;

            margin: auto;

            background: #ffffff;

            padding: 30px;

            border-radius: 20px;

            box-shadow:
                0 15px 35px
                rgba(0, 126, 167, 0.20);
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

            box-shadow:
                0 5px 12px
                rgba(79, 195, 247, 0.3);
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

            font-size: 15px;

            white-space: nowrap;
        }

        td {
            padding: 14px 15px;

            border-bottom:
                1px solid #dceff6;

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


        /* NOMOR */

        .nomor {
            width: 70px;

            text-align: center;
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


        /* DATA KOSONG */

        .empty {
            text-align: center;

            color: #90a4ae;

            padding: 30px;
        }


        /* RESPONSIVE */

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
                👨‍🎓
            </div>

            <div>

                <h1>
                    Data Siswa
                </h1>

                <p>
                    Kelola data siswa sekolah
                </p>

            </div>

        </div>


        <a
            href="tambah.php"
            class="btn-tambah">

            ＋ Tambah Data

        </a>

    </div>



    <!-- TABLE -->

    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th class="nomor">
                        No
                    </th>

                    <th>
                        NIS
                    </th>

                    <th>
                        Nama Siswa
                    </th>

                    <th>
                        Alamat
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

            <?php

            $no = 1;

            $query = mysqli_query(
                $koneksi,
                "SELECT * FROM siswa"
            );


            if (mysqli_num_rows($query) > 0) {

                while (
                    $data =
                    mysqli_fetch_array($query)
                ) {

            ?>

                <tr>

                    <td class="nomor">

                        <?php
                        echo $no++;
                        ?>

                    </td>


                    <td>

                        <?php
                        echo htmlspecialchars(
                            $data['nis']
                        );
                        ?>

                    </td>


                    <td>

                        <?php
                        echo htmlspecialchars(
                            $data['nama']
                        );
                        ?>

                    </td>


                    <td>

                        <?php
                        echo htmlspecialchars(
                            $data['alamat']
                        );
                        ?>

                    </td>


                    <td>

                        <div class="aksi">


                            <a
                                href="edit.php?nis=<?php
                                echo urlencode(
                                    $data['nis']
                                );
                                ?>"
                                class="btn-edit">

                                ✏️ Edit

                            </a>


                            <a
                                href="hapus.php?nis=<?php
                                echo urlencode(
                                    $data['nis']
                                );
                                ?>"
                                class="btn-hapus"

                                onclick="
                                    return confirm(
                                    'Yakin ingin menghapus data ini?'
                                    )
                                ">

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

                    <td
                        colspan="5"
                        class="empty">

                        📭 Belum ada data siswa

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
