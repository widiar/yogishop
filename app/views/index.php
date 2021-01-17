  <!-- Page Content -->
  <div class="container">

      <div class="row">

          <div class="col-lg-3">

              <h1 class="my-4">Shop Yogi</h1>
              <div class="list-group">
                  <?php foreach ($data['kategori'] as $k) : ?>
                      <a href="<?= BASEURL ?>home/kategori/<?= $k['id_kategori'] ?>" class="list-group-item <?php if (isset($data['catid'])) if (strcmp($k['id_kategori'], $data['catid']) == 0) echo "active" ?>"><?= $k['nama'] ?></a>
                  <?php endforeach; ?>
              </div>

          </div>
          <!-- /.col-lg-3 -->

          <div class="col-lg-9">

              <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                          <img class="d-block" src="<?= ASSET ?>img/cou.png" alt="First slide" width="900px" height="350px">
                      </div>
                      <div class="carousel-item">
                          <img class="d-block" src="<?= ASSET ?>img/cou.png" alt="Second slide" width="900px" height="350px">
                      </div>
                      <div class="carousel-item">
                          <img class="d-block" src="<?= ASSET ?>img/cou.png" alt="Third slide" width="900px" height="350px">
                      </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
              </div>

              <div class="row">
                  <?php foreach ($data['barang'] as $b) : ?>
                      <div class="col-lg-4 col-md-6 mb-4">
                          <div class="card h-100">
                              <a href="<?= BASEURL ?>home/barang/<?= $b['id_brg'] ?>"><img class="card-img-top cropped" src="<?= ASSET ?>img/barang/<?= $b['gambar'] ?>" alt=""></a>
                              <div class="card-body">
                                  <h4 class="card-title">
                                      <a href="<?= BASEURL ?>home/barang/<?= $b['id_brg'] ?>"><?= $b['nama_brg'] ?></a>
                                  </h4>
                                  <h5>Rp <?= number_format($b['harga'], 0, '.', '.') ?></h5>
                              </div>
                              <div class="card-footer">
                                  <small class="btn btn-sm btn-success">Tambah</small>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>
              <!-- /.row -->

          </div>
          <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->