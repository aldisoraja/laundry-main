<?php 
	include_once ('../koneksi.php');
	session_start ();
	if(!isset($_SESSION['id'])) {
	header("location: ../index.php");
	echo "<script>alert('Silahkan Login Terlebih Dahulu!!!');</script>";
	exit;
	}

if (isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);
    $kontak = htmlspecialchars($_POST['kontak']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $level = htmlspecialchars($_POST['level']);
    $sql = "INSERT INTO tb_daftar (nama_pelanggan, username, password_pelanggan, kontak_pelanggan, alamat_pelanggan, level) VALUES ('$nama', '$username', '$pass', '$kontak', '$alamat', '$level');";
    mysqli_query($koneksi, $sql);
	if($sql){
        echo "<script>alert('Data User Berhasil Ditambahkan!!');</script>";
    }else{
        echo "<script>alert('Data User Gagal Ditambahkan!!');</script>";
    }
    echo "<script>window.location='tabel_admin.php';</script>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data User</title>
	<link rel="stylesheet" type="text/css" href="css/tabel_pegawai.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	<!-- Template Start -->
 	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

	<link rel="stylesheet"
  	href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  	<link rel="preconnect" href="https://fonts.googleapis.com">
  	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


</head>
<body>
	<!-- Navbar Start -->
	<header>
		<a href="tabel_pegawai.php" class="logo"><img src="img/laundry-machine.png" alt="" style="width: 60px; padding-right: 3px;"><span>Ngumbah.in</span></a>

		<ul class="navbar">
			 <li><a href="beranda_admin.php" >Beranda</a></li>
			 <li><a href="tabel_admin.php" >User</a></li>
             <li><a href="tabel_pelanggan.php">Pelanggan</a></li>
            <li><a href="tabel_pesanan.php">Pesanan</a></li>
            <li><a href="tabel_laporan.php">Laporan</a></li>
		</ul>

		<div class="main">
            <button type="button" class="user"><a style="color :black;" href="../logout.php" onclick="return confirm('Yakin Ingin Keluar?')">Keluar</a></button>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
	</header>
	 <!--  Navbar End -->

	<div class="text">
		<p >Data User</p>
	</div>

<!-- Tabel Start -->
<div class="container">
	<div class="card shadow-sm mt-10 ">
			 <div class="card-header ">
					   <!-- <p>Pegawai</p> -->

					   	<!-- Button trigger modal -->
					   	<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#aksi">
							<i class="fa-solid fa-plus"></i> Tambah User
						</button>
			  </div>

			  	<!-- Modal Start-->
			<div class="modal fade" id="aksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header text-white bg-secondary">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      				<div class="modal-body ">
							      		<form action="" method="POST">
											<div class="row">
												<div class="col-3">
													<label class="mt-2">Nama Lengkap :</label>
												</div>
												<div class="col-9">
													<input type="text" placeholder="Cth: Aldi Soraja" name="nama" class="form-control mb-3" required>
												</div>
											</div>
											<div class="row">
												<div class="col-3">
													<label class="mt-2">Username :</label>
												</div>
												<div class="col-9">
													<input type="text" placeholder="Cth: aldi" name="username" class="form-control mb-3" required>
												</div>
											</div>
											<div class="row">
												<div class="col-3">
													<label class="mt-2">Password :</label>
												</div>
												<div class="col-9">
													<input type="password" placeholder="Cth: *******" name="pass" class="form-control mb-3" required>
												</div>
											</div>
											<div class="row">
												<div class="col-3">
													<label class="mt-2">No. Telp :</label>
												</div>
												<div class="col-9">
													<input type="number" placeholder="Cth: 089874635727" name="kontak" class="form-control mb-3" required>
												</div>
											</div>
											<div class="row">
												<div class="col-3">
													<label class="mt-2">Alamat :</label>
												</div>
												<div class="col-9">
													<input type="text" placeholder="Cth: Jl. Balai Pemuda No.24" name="alamat" class="form-control mb-3" required>
												</div>
											</div>
											<div class="row">
												<div class="col-3">
													<label class="mt-2">Akses Masuk :</label>
												</div>
												<div class="col-9">
													<select name="level" class="form-select" aria-label="Default select example">
														<option value="">-- Pilih Akses Masuk --</option>
														<option value="admin">Admin</option>
														<option value="pegawai">Pegawai</option>
													</select>
												</div>
											</div>
							      	</div>
							     	 <div class="modal-footer">
								        <button type="submit" name="simpan" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
								        </form>
				      				</div>
				    </div>
				  </div>
			</div>
<!-- Modal Start-->
				<div class="card-body table-responsive">
					<table id="table1" class="table table-bordered display">
						<thead >
							<tr>
								<th style="text-align:center">No</th>
								<th style="text-align:center">Nama</th>
								<th style="text-align:center">Username</th>
								<th style="text-align:center">No Telp</th>
								<th style="text-align:center">Alamat</th>
								<th style="text-align:center">Akses Masuk</th>
								<th style="text-align:center">Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							include '../koneksi.php';
							$no =1;
							$sql_daftar =mysqli_query($koneksi, "SELECT * FROM tb_daftar WHERE level ='admin' OR level ='pegawai' ") or die (mysqli_error($koneksi));
							if(mysqli_num_rows($sql_daftar) > 0){
								while($data = mysqli_fetch_array($sql_daftar)){ ?>
									<tr>
									<td><?=$no++?></td>
									<td><?=$data['nama_pelanggan']?></td>
									<td><?=$data['username']?></td>
									<td><?=$data['kontak_pelanggan']?></td>
									<td><?=$data['alamat_pelanggan']?></td>
									<td><?=$data['level']?></td>
									<td> 
									<!-- Modal Button Ubah Start -->
										<a type="button" data-bs-target="#ubah<?= $data['id_daftar'];?>" class="btn btn-warning btn-sm" data-bs-toggle="modal"><i class="fa-solid fa-pen-to-square"></i></i></a>								
										<!-- Modal Button Ubah End -->

										<a href="pelanggan/hapus_admin.php?id=<?= $data['id_daftar'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Hapus?')"><i class="fa-solid fa-trash"></i></a>	
									</td>
									</tr>
									<!-- Modal Edit Start -->
									  	<div class="modal fade" id="ubah<?=$data['id_daftar'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header text-white bg-secondary">
										        <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      			<div class="modal-body">
										      	<!-- <div class="form-group"> -->
										  
													      <form action="pelanggan/ubah_admin.php" method="POST">
													    	<input type="hidden" name="id_daftar" value="<?= $data['id_daftar']; ?>">
															<div class="row">
																<div class="col-3">
																	<label>Nama Lengkap :</label>
																</div>
																<div class="col-9">
																	<input type="text" name="nama" value="<?=$data['nama_pelanggan'];?>" class="form-control mb-3" required>
																</div>
															</div>
															<div class="row">
																<div class="col-3">
																	<label class="mt-2">Username :</label>
																</div>
																<div class="col-9">
																	<input type="text" name="username" value="<?=$data['username'];?>" class="form-control mb-3" required>
																</div>
															</div>
															<div class="row">
																<div class="col-3">
																	<label class="mt-2">No Telp :</label>
																</div>
																<div class="col-9">
																<input type="number" name="kontak" value="<?=$data['kontak_pelanggan'];?>" class="form-control mb-3" required>
																</div>
															</div>
															<div class="row">
																<div class="col-3">
																	<label class="mt-2">Alamat :</label>
																</div>
																<div class="col-9">
																	<input type="text" name="alamat" value="<?=$data['alamat_pelanggan'];?>" class="form-control mb-3" required>
																</div>
															</div>
															<div class="row">
																<div class="col-3">
																	<label>Akses Masuk :</label>
																</div>
																<div class="col-9">
																	<select value="<?=$data['level'];?>" name="level" class="form-select">
																	<option value="<?php echo $data['level'] ?>"><?php echo $data['level'] ?></option>
																	<option value="admin" >Admin</option>
																	<option value="pegawai">Pegawai</option>
																</div>
															</div>

													       	</select>
													       	
													      <!--  </div> -->
													      </div>
													      <div class="modal-footer">
													       
													        <button type="submit" name="ubah" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i> Ubah</button>
													        </form>
													      
										      			</div>
										    </div>
										  </div>
										</div>

									<!-- Modal Edit End -->
								<?php
								}
							}else {
								echo "<tr><td colspan =\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
							}

							 ?>
				
							
						</tbody>
					</table>
			  	</div>
			  	
	</div>	
</div>
	<div class="footer">
		<div class="content">
			<div class="isi">

				<div class="col" style="text-align: center;">
					<h4>Tentang Kami</h4>
					<ul>
						<a href=""><i class="fa-solid fa-location-dot"></i></a>
						<span>Alamat</span>
						<p>Dusun Pecarikan RT. 02/ RW. 03 Desa Jetis, Kec Jetis, Kab Mojokerto, Jawa timur</p>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.4737589977117!2d112.46858911596416!3d-7.412701360435961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e780f46eb2aa5c5%3A0x2698afa9310a50da!2sRahayu%20Laundry!5e0!3m2!1sid!2sid!4v1670329302213!5m2!1sid!2sid" width="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</ul>
					
				</div>

				<div class="col" style="text-align: center;">
					<h4>Link</h4>
					<ul>
						 <li><a href="beranda_admin.php"><i class="fa-solid fa-caret-down"></i> Beranda</a></li>
						 <li><a href="tabel_admin.php"><i class="fa-solid fa-caret-down"></i> User</a></li>
                        <li><a href="tabel_pelanggan.php"><i class="fa-solid fa-caret-down"></i> Pelanggan</a></li>
                        <li><a href="tabel_pesanan.php"><i class="fa-solid fa-caret-down"></i> Pesanan</a></li>
                        <li><a href="tabel_laporan.php"><i class="fa-solid fa-caret-down"></i> Laporan</a></li>
					</ul>
					
				</div>

				<div class="col" style="text-align: center;">
					<h4>Ikuti Kami</h4>
					<div class="laundry">
						<a href="" style="font-size: 40px; line-height: 40px;">
	                    <img src="img/laundry.in.png" alt="" >
	                	</a>
					</div>
					<div class="social">
						<a href=""><i class="fa-brands fa-whatsapp"></i></a>
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
					</div>

				</div>

				
			</div>
			
		</div>
		
	</div>

	<div class="copyright" style="border-top: 1px solid rgba(23, 162, 184, .2); background: #222327;" >
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">Ngumbah.in</a>. All Rights Reserved. Designed
                by
                <a class="text-primary font-weight-bold" href="https://www.its.ac.id/teo/id/beranda/">DTEO ITS</a>
            </p>
        </div>

<!--   Footer End -->
    <script type="text/javascript" src="js/navbar2.js"></script>
	<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#table1').DataTable();
		} );
	</script>
</body>
</html>
   