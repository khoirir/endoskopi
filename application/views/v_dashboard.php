<!-- Main content -->
<div class="content-wrapper">
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i> Beranda</a></li>
			</ul>
		</div>
	</div>

	<!-- Content area -->
	<div class="content">
		<!-- Dashboard content -->
		<div class="row">

			<div class="col-sm-12 col-md-3">
				<div class="panel panel-body bg-teal-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-left media-middle">
							<a class="animation" data-animation="fadeOutLeftBig"><img style="float: left; width: 50px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/patient.svg" onclick="klik(this)" name="registrasi"></a>
						</div>
						<div class="media-body media-middle text-left">
							<span class="text-uppercase text-size-large">REGISTRASI PASIEN</span>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="col-sm-12 col-md-3">
				<div class="panel panel-body bg-warning-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-left media-middle">
							<a class="animation" data-animation="fadeOutLeftBig"><img style="float: left; width: 50px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/ok_berkas.png" onclick="klik(this)" name="permintaan"></a>
						</div>
						<div class="media-body media-middle text-left">
							<span class="text-uppercase text-size-large">PERMINTAAN OPERASI</span>
						</div>
					</div>
				</div>
			</div> -->

			<div class="col-sm-12 col-md-3">
				<div class="panel panel-body bg-teal-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-left media-middle">
							<a class="animation" data-animation="fadeOutLeftBig"><img style="float: left; width: 50px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/pasien.svg" onclick="klik(this)" name="permintaansudah"></i></a>
						</div>
						<div class="media-body media-middle text-left">
							<span class="text-uppercase text-size-large">LIST PASIEN</span>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="col-sm-12 col-md-3">
				<div class="panel panel-body bg-success-400 has-bg-image">
					<div class="media no-margin">
						<div class="media-left media-middle">
							<a class="animation" data-animation="fadeOutLeftBig"><img style="float: left; width: 50px; height: auto; margin-right: 7px; margin-left: auto;" src="<?php echo base_url(); ?>/template/assets/css/icons/ok_laporan.png"onclick="klik(this)" name="hasil"></a>
						</div>
						<div class="media-body media-middle text-left">
							<span class="text-uppercase text-size-large">HASIL OPERASI</span>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<!-- /dashboard content -->

		<script type="text/javascript">
			function klik(element) {
				let nama = element.name;
				if (nama == "registrasi") {
					location.href = "<?php echo base_url('registrasipasien') ?>";
				}
				// else if(nama=="permintaan"){
				// 	location.href="<?php echo base_url('semuapermintaan') ?>";
				// }
				else if (nama == "permintaansudah") {
					location.href = "<?php echo base_url('permintaansudah') ?>";
				}
				// else if(nama=="hasil"){
				// 	location.href="<?php echo base_url('laporanhasiloperasi') ?>";
				// }
			}
		</script>