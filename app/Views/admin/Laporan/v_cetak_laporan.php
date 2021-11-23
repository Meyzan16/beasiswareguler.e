<?php foreach ($lolos  as $data) { ?>

<?php } ?>
<?php $this->db = db_connect(); ?>
<html>
<head>
	<title>DAFTAR BEASISWA <?=$pilih_tahun; ?></title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body onload="window.print();setTimeout(window.close, 0);">
	<center>
        <table>
			<tr>
				<td><img src="<?= base_url() ?>/unib.png" width="100" height="100"></td>
				<td>
				<center>
					<font size="4">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font><br>
                    <font size="4"><b>FAKULTAS TEKNIK</b></font><br>
					<font size="4"><b>UNIVERSITAS BENGKULU</b></font><br>
					<font size="2">Jalan W.R Supratman Kandang Limun,Bengkulu Kode Pos 38371 </font><br>
					<font size="2">Telepon/Fax (0736)24144; Tlp.(0736) 21170 Pesawat 211 </font>
					<!-- <font size="2">Telepon/Faksimile (0736)21290,21170,21884 Pesawat 206.226</font> -->
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
        <table width="625">
                <tr>
                    <td class="text2"> 
                    <h3 style="text-align: center;">DATA BEASISWA REGULER TEKNIK KATEGORI <?= strtoupper($kategori) ?> TAHUN <?= $pilih_tahun; ?></h3>
                    </td>
                </tr>
            </table>
		</table>
    <table border="1" class="table  table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NPM</th>
                <th class="text-center">NAMA MAHASISWA</th>
                <th class="text-center">JENIS KELAMIN</th>
                <th class="text-center">PROGRAM STUDI</th>
                <th class="text-center">NO REKENING</th>
                <th class="text-center">NO HP MAHASISWA</th>
                <th class="text-center">STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($lolos as $data) :  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++ ?></td>
                    <td style="text-align: center;"><?= $data['npm'] ?></td>
                    <td style="text-align: center;"><?= $data['nama_mhs'] ?></td>
                    <td style="text-align: center;"><?= $data['jenkel'] ?></td>
                    <td style="text-align: center;"><?= $data['nama_prodi'] ?></td>
                    <td style="text-align: center;"><?= $data['no_rek_mhs'] ?></td>
                    <td style="text-align: center;"><?= $data['no_hp_mhs'] ?></td>
                    <?php
                    $warna = " ";
                    if ($data['status'] == "belum diverifikasi") {
                        $warna = "info";
                    } else if ($data['status'] == "lolos") {
                        $warna = "success";
                    } else {
                        $warna = "danger";
                    }
                    ?>

                    <td style="text-align: center;"><span class="badge badge-<?= $warna; ?>">
                            <?php echo $data['status']; ?></span>

                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
		<br>

        <?php
        $data1 = $this->db->query("SELECT * FROM data_wd WHERE status = 'Y' ")->getRowArray(); ?>

            <table width="625">
                <tr>
                    <td width="430"><br><br><br></td>
                    <td class="text-align:center;" style="font-size:13px;" >
                    Bengkulu, <?php
                            $tgl = date('d-m-Y');
                            echo $tgl; ?> <br>
                    WD Bidang Kemahasiswaan <br><br><br><br><br><br> <?= $data1['nama'] ?>
                    <br> Nip : <?= $data1['nip'] ?></td>
                
                </td>
                </tr>
            </table>
	</center>
</body>
</html>
