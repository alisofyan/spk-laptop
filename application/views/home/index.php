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
                        <li class="list-group-item">
                            <span>Gigabyte Aero 15-Y9 i9-8950HK</span>
                            <a href=""  data-toggle="tooltip" data-placement="top" title="Hapus alternatif" >
                                <img src="<?= base_url(); ?>/assets/app/images/remove.png" alt="remove" width="35"/>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span>MSI GT75 Titan 8SG i9-8950HK</span>
                            <a href=""  data-toggle="tooltip" data-placement="top" title="Hapus alternatif" >
                                <img src="<?= base_url(); ?>/assets/app/images/remove.png" alt="remove" width="35"/>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span>ASUS ROG STRIX GL503GE</span>
                            <a href=""  data-toggle="tooltip" data-placement="top" title="Hapus alternatif" >
                                <img src="<?= base_url(); ?>/assets/app/images/remove.png" alt="remove" width="35"/>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span>Predator Helios 300 with Intel 9th gen</span>
                            <a href=""  data-toggle="tooltip" data-placement="top" title="Hapus alternatif" >
                                <img src="<?= base_url(); ?>/assets/app/images/remove.png" alt="remove" width="35"/>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span>Acer Nitro 7 with Intel 9th gen</span>
                            <a href=""  data-toggle="tooltip" data-placement="top" title="Hapus alternatif" >
                                <img src="<?= base_url(); ?>/assets/app/images/remove.png" alt="remove" width="35"/>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- button action-->
                <div class="action-button">
                    <button type="button" class="main-btn-rect popup-btn" data-popup="popup-reg">Tambah Alternatif</button>
                    <a href="<?= base_url('hasil'); ?>" type="button" class="main-btn-rect action-hitung">HITUNG</a>
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
            <form id="send" class="send-form">
                <div class="form-group">
                    <input type="text" placeholder="Masukan merk dan seri laptop" id="merk" name="merk" required="required">
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
                    <select class="custom-select" id="vga">
                        <option selected>Pilih VGA</option>
                        <option value="2">2 GB</option>
                        <option value="4">4 GB</option>
                        <option value="8">8 GB</option>
                        <option value="16">16 GB</option>
                        <option value="32">32 GB</option>
                    </select>
                    <label class="label vga" for="vga">VGA</label>
                </div>
                
                <div class="form-group">    
                    <select class="custom-select" id="ram">
                        <option selected>Pilih RAM</option>
                        <option value="2">2 GB</option>
                        <option value="4">4 GB</option>
                        <option value="8">8 GB</option>
                        <option value="16">16 GB</option>
                        <option value="32">32 GB</option>
                    </select>
                    <label class="label ram" for="ram">RAM</label>
                </div>

                <div class="form-group">    
                    <select class="custom-select" id="processor">
                        <option selected>Pilih Processor</option>
                        <option value="3">core i3</option>
                        <option value="5">core i5</option>
                        <option value="7">core i7</option>
                        <option value="9">core i9</option>
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