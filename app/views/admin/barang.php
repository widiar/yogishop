<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarang">
            Tambah Barang
        </button>
        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#tambahKategori">
            Tambah Kategori
        </button>
        <input type="hidden" value="<?= BASEURL ?>" id="baseurl">
        <div class="card shadow mt-3">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th colspan="2" class="text-center">AKSI</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($data['barang'] as $barang) : ?>
                        <tr class="text-center">
                            <td>
                                <?= $no++ ?>
                            </td>
                            <td>
                                <?= $barang['nama_brg'] ?>
                            </td>
                            <td>
                                <?= number_format($barang['harga'], 0, '.', '.') ?>
                            </td>
                            <td>
                                <?= $barang['stok'] ?>
                            </td>
                            <td>
                                <a href="<?= $barang['id_brg'] ?>" class="editBarang">
                                    <div class="btn btn-primary btn-sm">
                                        <i class="fas fa-pen-square"></i>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="<?= BASEURL ?>admin/_deletebarang/<?= $barang['id_brg'] ?>" onclick="return confirm('Serius gan?')" class="hapusBarang">
                                    <div class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>



        <div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= BASEURL ?>admin/_tambahbarang" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_brg" required placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label><br>
                                <select name="kategori" class="selectpicker form-control kategori" data-live-search="true" required title="Kategori" data-size="7">
                                    <?php foreach ($data['kategori'] as $p) : ?>
                                        <option value="<?= $p['id_kategori'] ?>">
                                            <?= $p['nama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input type="number" class="form-control" name="harga" required placeholder="Harga Barang">
                            </div>
                            <div class="form-group">
                                <label>Stok Barang</label>
                                <input type="number" class="form-control" name="stok" required placeholder="Stok Barang">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" required class="form-control"></textarea>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" required id="customFile" name="gambar">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <small class="text-danger">Pastikan file berformat png, jpg, jpeg</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah gan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editBarang" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= BASEURL ?>admin/_editbarang" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id" class="idbrg">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control namabrg" name="nama_brg" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label><br>
                                <select name="kategori" class="selectpicker form-control ekategori" id="ekategori" data-live-search="true" title="Kategori" data-size="7">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input type="number" class="form-control harga" name="harga" placeholder="Harga Barang">
                            </div>
                            <div class="form-group">
                                <label>Stok Barang</label>
                                <input type="number" class="form-control stok" name="stok" placeholder="Stok Barang">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control keterangan"></textarea>
                            </div>
                            <div class="custom-file">
                                <input type="hidden" class="gambarlama" name="gambarlama">
                                <input type="file" class="custom-file-input" id="customFile" name="gambar">
                                <label class="custom-file-label gambarlabel" for="customFile"></label>
                                <small class="text-danger">Pastikan file berformat png, jpg, jpeg</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="editgan" class="btn btn-primary">Edit gan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= BASEURL ?>admin/_tambahkategori" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Kategori">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambahbtn" class="btn btn-primary">Tambah gan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->