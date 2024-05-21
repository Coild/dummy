<div class="pengukuran-kinerja-container">
    <div class="search-table-container-pengukuran">
        <div class="show-n-row-table-pengukuran">
            <form method="GET" action="<?= base_url('admin_sakip_sulut/pengukuran_kinerja') ?>">
                <p>Lihat</p>

                <select name="banyaknya-data">
                    <option hidden></option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <!-- <option value="5">5</option> -->
                </select>
                <input type="submit" name="pilih_jum_data" value="Tampilkan">
            </form>
            <form class="form-pilih-triwulan" method="GET" action="<?= base_url('admin_sakip_sulut/pengukuran_kinerja') ?>">
                Pilih Triwulan
                <select name="triwulan" id="pilih-tahun-pengukuran">
                    <option value="" selected hidden></option>
                    <option value="triwulan1">Triwulan 1</option>
                    <option value="triwulan2">Triwulan 2</option>
                    <option value="triwulan3">Triwulan 3</option>
                    <option value="triwulan4">Triwulan 4</option>
                </select>
                <input type="submit" name="pilih_triwulan_input" value="Tampilkan">
            </form>
            <?php if (!$year) : ?>
            <?php else : ?>
                <form class="form-pilih-tahun-pengukuran" method="GET" action="<?= base_url('admin_sakip_sulut/pengukuran_kinerja') ?>">
                    Pilih Tahun
                    <select class="select" name="year" id="pilih-tahun-pengukuran">
                        <?php foreach ($year as $y) : ?>
                            <option value="" selected hidden></option>
                            <option value="<?= $y->year ?>"><?= $y->year ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="submit" name="pilih_tahun-pengukuran-input" value="Tampilkan">
                </form>
            <?php endif ?>
        </div>
        <div class="search-table">
            <form action="<?= base_url('admin_sakip_sulut/pengukuran_kinerja') ?>" method="GET">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Ketik Disini" class="search-table-input" autocomplete="off">
                <input type="submit" name="submit" value="Cari" class="search-table-submit"></input>
            </form>
        </div>
    </div>
    <div class="main-content-pengukuran-kinerja">
        <div class="table-triwulan triwulan-1 active">
            <table class="table-pengukuran-kinerja" id="triwulan-1">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>OPD</th>
                        <th>Triwulan</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($triwulan)) {
                        $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;
                        foreach ($triwulan as $opd) {
                    ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $opd->opd; ?></td>
                                <td><?= $opd->jenis_dok ?></td>
                                <td><?= $opd->year ?></td>
                                <td>
                                    <?php if ($opd->nilai_triwulan == true) : ?>
                                        <a style="pointer-events: none; background:lightgrey; color:black" class="btn-triwulan <?= $opd->jenis_dok ?>-modal" id="<?= $opd->jenis_dok ?>" data-opd="<?= $opd->opd ?>" data-id="<?= $opd->id ?>" data-year="<?= $opd->year ?>" type="button">
                                            Input Data
                                        </a>
                                    <?php else : ?>
                                        <a class="btn-triwulan <?= $opd->jenis_dok ?>-modal" id="<?= $opd->jenis_dok ?>" data-opd="<?= $opd->opd ?>" data-id="<?= $opd->id ?>" data-year="<?= $opd->year ?>" type="button">
                                            Input Data
                                        </a>
                                    <?php endif ?>
                            </tr>
                    <?php
                            $nomor++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="footer-for-pagination">
                <div class="button-pagination">
                    <?php echo $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal triwulan 1 -->
<div class="modal-triwulan-1-container modal">
    <div class="modal-triwulan" id="modal_t1">
    </div>
</div>

<!-- modal triwulan 2 -->
<div class="modal-triwulan-2-container modal">
    <div class="modal-triwulan" id="modal_t2">
    </div>
</div>

<!-- modal triwulan 3 -->
<div class="modal-triwulan-3-container modal">
    <div class="modal-triwulan" id="modal_t3">
    </div>
</div>

<!-- modal triwulan 4 -->
<div class="modal-triwulan-4-container modal">
    <div class="modal-triwulan" id="modal_t4">
    </div>
</div>
</div>