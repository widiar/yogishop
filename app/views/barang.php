<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Shop Yogi</h1>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg">

            <div class="row my-4">
                <div class="col-lg mb-4">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= ASSET ?>img/barang/<?= $data['gambar'] ?>" class="card-img cropped">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $data['nama_brg'] ?></h4>
                                    <h5>Rp <?= number_format($data['harga'], 0, '.', '.') ?></h5>
                                    <p class="card-text"><?= $data['keterangan'] ?></p>
                                    <p class="card-text btn btn-sm btn-success">Tambah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->