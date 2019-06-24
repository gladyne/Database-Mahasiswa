<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data mahasiswa &raquo; </h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
				$nim		     = $_POST['nim'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat_asal     = $_POST['alamat_asal'];
				$alamat_sekarang = $_POST['alamat_sekarang'];
				$no_telepon		 = $_POST['no_telepon'];
				$email  		 = $_POST['email'];
				$dosen_pembimbing = $_POST['dosen_wali'];
				$jurusan	     = $_POST['jurusan'];
				$fakultas	     = $_POST['fakultas'];
				$username		 = $_POST['username'];
				$pass1	         = $_POST['pass1'];
				$pass2           = $_POST['pass2'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'"); 
				if(mysqli_num_rows($cek) == 0){ 
					if($pass1 == $pass2){ 
						$pass = md5($pass1); 
						$insert = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat_asal, alamat_sekarang, no_telepon, email, dosen_pembimbing, jurusan, fakultas, username, password) VALUES('$nim','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat_asal', '$alamat_sekarang', '$no_telepon', '$email', '$dosen_pembimbing', '$jurusan', '$fakultas', '$username', '$pass')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ 
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data Mahasiswa Berhasil Di Simpan.'
						}else{ 
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Mahasiswa Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Mahasiswa Gagal Di simpan!'
						}
					} else{ 
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama!</div>'; // maka tampilkan 'Password Tidak sama!'
					}
				}else{ 
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'nim Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="nim" class="form-control" placeholder="nim" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat Asal</label>
					<div class="col-sm-3">
						<textarea name="alamat_asal" class="form-control" placeholder="Alamat Asal"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat Sekarang</label>
					<div class="col-sm-3">
						<textarea name="alamat_sekarang" class="form-control" placeholder="Alamat Sekarang"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dosen wali</label>
					<div class="col-sm-4">
						<input type="text" name="dosen_wali" class="form-control" placeholder="Dosen wali" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jurusan</label>
					<div class="col-sm-2">
						<select name="jurusan" class="form-control" required>
							<option value=""> - Pilih Jurusan - </option>
							<option value="Teknik Elektro">Teknik Elektro</option>
							<option value="Teknik Kimia">Teknik Kimia</option>
							<option value="Fisika">Fisika</option>
							<option value="Biologi">Biologi</option>
                            <option value="Agroteknologi">Agroteknologi</option>
							<option value="Akutansi">Akutansi</option>
							<option value="Ilmu & Teknologi Pangan">Ilmu & Teknologi Pangan</option>
							<option value="Kedokteran">Kedokteran</option>
							<option value="Biologi">Biologi</option>							
							<option value="Ekonomi">Ekonomi</option>
							<option value="Bisnis">Bisnis</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fakultas</label>
					<div class="col-sm-2">
						<select name="fakultas" class="form-control" required>
							<option value=""> - Pilih Fakultas - </option>
							<option value="Teknik">Teknik</option>
							<option value="Sekolah Vokasi">Sekolah Vokasi</option>
							<option value="Kedokteran">Kedokteran</option>
							<option value="Sains dan Matematika">Sains dan Matematika</option>
							<option value="Ekonomi dan Bisnis">Ekonomi dan Bisnis</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulangi Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass2" class="form-control" placeholder="Ulangi Password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>