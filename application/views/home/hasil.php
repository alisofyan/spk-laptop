<div class="container-fluid hasil">
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <!-- title -->
            <div class="title">        
                <h1>Sistem Pendukung Keputusan Pemilihan Laptop Gaming</h1>
            </div>
        </div>
    </div>

    <!-- main -->
    <div class="page-main">
        <!-- sidebar -->
        <div class="sidebar">
            <div class="popup-content">
                <div class="event-header">
                    <h6>Tambah Alternatif</h6>
                </div>
                <hr>
                <form id="send" class="send-form" action="<?= base_url('tambah_hitung') ?>" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Masukan merk dan seri laptop" id="merek" name="merek" required="required">
                        <label for="merk">
                            <span>Merk</span>
                        </label>
                    </div>
                
                    <div class="form-group">
                        <input type="number" placeholder="Masukan dalam rupiah" id="harga" name="harga" required="required">
                        <label for="harga">
                            <span>Harga</span>
                        </label>
                    </div>
                
                    <div class="form-group">    
                        <select class="custom-select" id="vga" name="vga">
                            <option selected>Pilih VGA</option>
                            <option value="1">2 GB</option>
                            <option value="2">4 GB</option>
                            <option value="3">8 GB</option>
                            <option value="4">16 GB</option>
                            <option value="5">32 GB</option>
                        </select>
                        <label class="label vga" for="vga">VGA</label>
                    </div>
                    
                    <div class="form-group">    
                        <select class="custom-select" id="ram" name="ram">
                            <option selected>Pilih RAM</option>
                            <option value="1">4 GB</option>
                            <option value="2">8 GB</option>
                            <option value="3">16 GB</option>
                            <option value="4">32 GB</option>
                        </select>
                        <label class="label ram" for="ram">RAM</label>
                    </div>

                    <div class="form-group">    
                        <select class="custom-select" id="processor" name="processor">
                            <option selected>Pilih Processor</option>
                            <option value="1">core i3</option>
                            <option value="2">core i5</option>
                            <option value="3">core i7</option>
                            <option value="4">core i9</option>
                        </select>
                        <label class="label processor" for="processor">Processor</label>
                    </div>

                    <div class="form-group">
                        <input type="number" placeholder="Masukan dalam mAh" id="baterai" name="baterai" required="required">
                        <label for="baterai">
                            <span>Baterai</span>
                        </label>
                    </div>

                    <div class="form-group action">
                        <button type="submit" class="main-btn-rect" name="text" value="Send">Tambah</button>
                        <button type="button" class="cancel alternatif">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- content -->
        <div class="content">
            <button type="button" class="open-popup">Tambah Alternatif</button>
            <div class="pre-tittle">
                <span class="judul">Hasil Rekomendasi Pemilihan Laptop Gaming</span>
                <div class="keterangan">
                    <span class="ket-no">No.</span>
                    <span class="ket-alter">Alternatif</span>
                </div>
            </div>
            <!-- hasil -->
            <?php foreach($hasil as $data) : ?>
            <div class="card">
                <div class="card-header">
                    <span><?= $data->Rangking ?></span>
                </div>
                <div class="card-body">
                    <span class="alter-name"><?= $data->laptop ?></span>
                    <span class="alter-nilai">Nilai : <?= $data->Total ?></span>
                 </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>



<!-- copyright -->
<footer>
  <p class="copyright">Copyright 2020 @</p>
  <p class="creator">Rama Fatra Rusadi</p>
</footer>