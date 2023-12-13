<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
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

    .table-data th {
        background-color: grey;
        color: black;
    }
    .centered-cell {
        text-align: center;
        vertical-align: middle;
    }

    .centered-image {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .timestamp {
        text-align: right;
        font-size: 10pt;
        font-family: Verdana;
    }
</style>
<table class="table-data">
    <thead>
        <tr>
            <th colspan="7" class="centered-cell">
                <h3>Laporan Data Buku Perpustakaan Online</h3>
                <div class="centered-image">
                    <img src="<?= base_url('assets/img/kk.jpeg') ?>" height="200" width="210" alt="">
                </div>
            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Terbit</th>
            <th>Tahun Penerbit</th>
            <th>ISBN</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($buku as $b) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $b['judul_buku']; ?></td>
                <td><?= $b['pengarang']; ?></td>
                <td><?= $b['penerbit']; ?></td>
                <td><?= $b['tahun_terbit']; ?></td>
                <td><?= $b['isbn']; ?></td>
                <td><?= $b['stok']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="timestamp">
    Tanggal Waktu Cetak: <?= date('d-m-Y H:i:s'); ?>
</div>