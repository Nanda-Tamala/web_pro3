<!-- Pertemuan 6 -->
<div class="container-fluid">
	<center>
		<table>
			<tr>
				<td>
					<div class="table-responsive full-width">
						<table class="table table-bordered table-striped table-hover" id="table-datatable">
							<tr>
								<th>No Pinjam </th>
								<th>Tanggal Pinjam </th>
								<th>Id User </th>
								<th>Id Buku </th>
								<th>Tanggal Batas Kembali </th>
								<th>Tanggal Pengembalian </th>
								<th>Terlambat </th>
								<th>Denda </th>
								<th>Status </th>
								<th>Total Denda </th>
								<th>Pilihan </th>
							</tr>
							<?php
$last_no_pinjam = '';
foreach ($pinjam as $p):
    if ($p['no_pinjam'] != $last_no_pinjam): // Cek apakah nomor pinjam berbeda dengan nomor pinjam sebelumnya
        $last_no_pinjam = $p['no_pinjam'];
?>
        <tr>
            <td><?= $p['no_pinjam']; ?></td>
            <td><?= $p['tgl_pinjam']; ?></td>
            <td><?= $p['id_user']; ?></td>
            <td><?= $p['id_buku']; ?></td>
            <td><?= $p['tgl_kembali']; ?></td>
            <td>
                <?= $p['tgl_pengembalian']; ?>
                <input type="hidden" value="<?= date('Y-m-d') ?>" name="tgl_pengembalian" id="tgl_pengembalian">
            </td>
            <td>
                <?php
                // validasi keterlambatan
                $tgl1 = new DateTime($p['tgl_kembali']);
                $tgl2 = new DateTime();
                if ($p['status'] == 'Kembali') {
                    $tgl3 = new DateTime($p['tgl_pengembalian']);
                    $selisih = $tgl3->diff($tgl1)->format("%a");
                    if ($tgl1 > $tgl3) {
                        $selisih = 0;
                        echo $selisih;
                    } else {
                        echo $selisih;
                    }
                } else {
                    $selisih = $tgl2->diff($tgl1)->format("%a");
                    if ($tgl1 > $tgl2) {
                        $selisih = 0;
                        echo $selisih;
                    } else {
                        echo $selisih;
                    }
                }
                ?> Hari
            </td>
            <td><?= $p['denda']; ?></td>
            <?php if ($p['status'] == "Pinjam") {
                $status = "warning";
            } else {
                $status = "secondary";
            } ?>
            <td>
                <i class="btn btn-outline-<?= $status; ?> btn-sm"><?= $p['status'] ?></i>
            </td>
            <?php if ($selisih < 0) {
                $total_denda = $p['denda'] * 0;
            } else {
                $total_denda = $p['denda'] * $selisih;
            } ?>
            <td><?= $total_denda; ?></td>
            <td nowrap>
                <?php if ($p['status'] == "Kembali"): ?>
                    <i class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-fw fa-edit"></i>Ubah Status
                    </i>
                <?php else: ?>
                    <form action="<?= base_url('pinjam/ubahStatus/' . $p['id_buku'] . '/' . $p['no_pinjam']); ?>" method="post">
                        <button class="btn btn-sm btn-outline-info" type="submit">
                            <i class="fas fa-fw fa-cart-plus"></i> Ubah Status
                        </button>
                        <input type="hidden" value="<?= $total_denda; ?>" name="total_denda" id="total_denda">
                    </form>
                <?php endif ?>
            </td>
        </tr>
    <?php endif; ?>
<?php endforeach ?>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</center>
</div>