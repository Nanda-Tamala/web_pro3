<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px;
        }

        .table-data tr:nth-child(odd) {
            background-color: white;
        }

        .table-data tr:nth-child(even) {
            background-color: gray;
            color: white;
        }

        h3 {
            font-family: Verdana;
        }

        .logo {
            text-align: center;
        }

        .timestamp {
            text-align: right;
            font-size: 10pt;
            font-family: Verdana;
        }
    </style>
</head>

<body>
    <h3>
        <center>LAPORAN DATA PEMINJAMAN BUKU</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Tanggal Pengembalian</th>
                <th>Total Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 1;
            $last_no_pinjam = '';
            foreach ($laporan as $l) {
                if ($l['no_pinjam'] != $last_no_pinjam) { // Cek apakah nomor pinjam berbeda dengan nomor pinjam sebelumnya
                    $last_no_pinjam = $l['no_pinjam'];
            ?>
                    <tr>
                        <td scope="row"><?= $no++; ?></td>
                        <td><?= $l['nama']; ?></td>
                        <td><?= $l['judul_buku']; ?></td>
                        <td><?= $l['tgl_pinjam']; ?></td>
                        <td><?= $l['tgl_kembali']; ?></td>
                        <td><?= $l['tgl_pengembalian']; ?></td>
                        <td><?= $l['total_denda']; ?></td>
                        <td><?= $l['status']; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <div class="timestamp">
        Tanggal Waktu Cetak: <?= date('d-m-Y H:i:s'); ?>
    </div>
</body>

</html>
