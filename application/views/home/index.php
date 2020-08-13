<div class="container-fluid home">
    <div class="page-main">
        <!-- title -->
        <div class="title">        
            <h1>Sistem Pendukung Keputusan Pemilihan Laptop Gaming</h1>
        </div>
          

        <div class="main"> 
            <div class="content">
                <!-- alter added -->
                <div class="after-input">
                    <ul class="list-group">
                        <?php foreach ($laptop as $data) : ?>
                        <li class="list-group-item">
                            <span><?= $data->nama; ?></span>
                            <a href="<?= base_url('hapusItem/'.$data->kd_alternatif); ?>"  data-toggle="tooltip" data-placement="top" title="Hapus alternatif" >
                                <img src="<?= base_url(); ?>/assets/app/images/remove.png" alt="remove" width="35"/>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- button action-->
                <div class="action-button">
                    <button type="button" class="main-btn-rect popup-btn" data-popup="popup-reg">Tambah Alternatif</button>
                    <a href="<?= base_url('hitung'); ?>" type="button" class="main-btn-rect action-hitung">HITUNG</a>
                </div>
            </div>
            <div class="image">
                <img src="<?= base_url(); ?>/assets/app/images/laptop-home.png" alt="laptop"/>
            </div>
        </div>
    </div>



    <!-- Popup add Alter -->
    <div id="popup-reg" class="popup alter">
        <div class="popup-content">
            <div class="event-header">
                <h6>Masukan Spesifikasi Laptop</h6>
            </div>
            <hr>
            <form id="send" class="send-form" action="<?= base_url('simpan') ?>" method="POST">
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
                    <button type="submit" class="main-btn-rect" name="text" value="Send">
                    <i class="fa fa-paper-plane"></i>Tambah</button>
                </div>
            </form>
            <span class="fade-out main-btn-circle">╳</span>
        </div>
    </div>
    <!--End Popup add Alter -->


</div>