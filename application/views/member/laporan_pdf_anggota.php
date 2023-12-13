<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
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
        padding: 10px 10px 10px 10px;
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
    <h3>
        <center>Laporan Data Buku Perpustakaan Online</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Email</th>
                <th>Role ID</th>
                <th>Aktif</th>
                <th>Member Sejak</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anggota as $a) {
            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?= $a['role_id']; ?></td>
                    <td><?= $a['is_active']; ?></td>
                    <td><?= date('Y', $a['tanggal_input']); ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="timestamp">
        Tanggal Waktu Cetak: <?= date('d-m-Y H:i:s'); ?>
    </div>
</body>

</html>