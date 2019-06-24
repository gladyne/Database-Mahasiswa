<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 97 dibawah
				$nim = $_GET['nim']; // ambil nilai nim
				$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'"); // query untuk memilih entri dengan nim yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nim yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nim yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan fakultas -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data Mahasiswa</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Teknik" <?php if($filter == 'Teknik'){ echo 'selected'; } ?>>Teknik</option>
						<option value="Sekolah Vokasi" <?php if($filter == 'Sekolah Vokasi'){ echo 'selected'; } ?>>Sekolah Vokasi</option>
						<option value="Kedokteran" <?php if($filter == 'Kedokteran'){ echo 'selected'; } ?>>Kedokteran</option>
                        <option value="Sains dan Matematika" <?php if($filter == 'Sains dan Matematika'){ echo 'selected'; } ?>>Sains dan Matematika</option>
						<option value="Ekonomi dan Bisnis" <?php if($filter == 'Ekonomi dan Bisnis'){ echo 'selected'; } ?>>Ekonomi dan Bisnis</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>No Telepon</th>
						<th>Dosen Wali</th>
						<th>Jurusan</th>
						<th>Fakultas</th>
						<th>Tools</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas='$filter' ORDER BY nim ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nim'].'</td>
								<td><a href="profile.php?nim='.$row['nim'].'">'.$row['nama'].'</a></td>
								<td>'.$row['jenis_kelamin'].'</td>
								<td>'.$row['tempat_lahir'].'</td>
								<td>'.$row['tanggal_lahir'].'</td>
								<td>'.$row['no_telepon'].'</td>
								<td>'.$row['dosen_pembimbing'].'</td>
								<td>'.$row['jurusan'].'</td>
								<td>';
								if($row['fakultas'] == 'Teknik'){
									echo '<span class="label label-success">Teknik</span>';
								}
								else if ($row['fakultas'] == 'Sekolah Vokasi' ){
									echo '<span class="label label-success">Sekolah Vokasi</span>';
								}
								else if ($row['fakultas'] == 'Kedokteran' ){
									echo '<span class="label label-success">Kedokteran</span>';
								}
								else if ($row['fakultas'] == 'Sains dan Matematika' ){
									echo '<span class="label label-success">Sains dan Matematika</span>';
								}
								else if ($row['fakultas'] == 'Ekonomi dan Bisnis' ){
									echo '<span class="label label-success">Ekonomi dan Bisnis</span>';
								}
							echo '
								</td>
								<td>
									
									<a href="edit.php?nim='.$row['nim'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="password.php?nim='.$row['nim'].'" title="Ganti Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
									<a href="delete.php?nim='.$row['nim'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>