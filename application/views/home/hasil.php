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
            <div class="card">
                <div class="card-header">
                    <span>1</span>
                </div>
                <div class="card-body">
                    <span class="alter-name">ASUS ROG STRIX GL503GE</span>
                    <span class="alter-nilai">Nilai : 0,835</span>
                 </div>
            </div>
            <!-- hasil -->
            <div class="card">
                <div class="card-header">
                    <span>2</span>
                </div>
                <div class="card-body">
                    <span class="alter-name">Acer Nitro 7 with Intel 9th gen</span>
                    <span class="alter-nilai">Nilai : 0,7321</span>
                 </div>
            </div>
            <!-- hasil -->
            <div class="card">
                <div class="card-header">
                    <span>3</span>
                </div>
                <div class="card-body">
                    <span class="alter-name">MSI GT75 Titan 8SG i9-8950HK</span>
                    <span class="alter-nilai">Nilai : 0,72835</span>
                 </div>
            </div>
            <!-- hasil -->
            <div class="card">
                <div class="card-header">
                    <span>4</span>
                </div>
                <div class="card-body">
                    <span class="alter-name">Gigabyte Aero 15-Y9 i9-8950HK</span>
                    <span class="alter-nilai">Nilai : 0,6521</span>
                 </div>
            </div>
            <!-- hasil -->
            <div class="card">
                <div class="card-header">
                    <span>5</span>
                </div>
                <div class="card-body">
                    <span class="alter-name">Predator Helios 300 with Intel 9th gen</span>
                    <span class="alter-nilai">Nilai : 0,5934</span>
                 </div>
            </div>          
        </div>
    </div>
</div>



<!-- copyright -->
<footer>
  <p class="copyright">Copyright 2020 @</p>
  <p class="creator">Rama Fatra Rusadi</p>
</footer>