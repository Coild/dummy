<div class="evaluasi-kinerja-container">
    <div class="search-table-container">
        <div class="show-n-row-table-evaluasi">
            <form class="form-pilih-tahun-evaluasi" method="GET" action="<?= base_url('admin_sakip_sulut/evaluasi_kinerja') ?>">
                <p>Lihat</p>
                <select name="banyaknya-data">
                    <option hidden></option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
                <input type="submit" name="pilih_jum_data" value="Tampilkan">
            </form>
            <?php if (!$year) : ?>
            <?php else : ?>
                <form class="form-pilih-tahun-evaluasi" method="GET" action="<?= base_url('admin_sakip_sulut/evaluasi_kinerja') ?>">
                    Pilih Tahun
                    <select class="select" name="year" id="pilih-tahun-evaluasi">
                        <?php foreach ($year as $y) : ?>
                            <option value="" selected hidden></option>
                            <option value="<?= $y->year ?>"><?= $y->year ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="submit" name="pilih_tahun-evaluasi-input" value="Tampilkan">
                </form>
            <?php endif ?>
        </div>

        <div class="search-table">
            <form action="<?= base_url('admin_sakip_sulut/evaluasi_kinerja') ?>" method="post">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Ketik Disini" class="search-table-input" autocomplete="off">
                <input type="submit" name="submit" value="Cari" class="search-table-submit"></input>
            </form>
        </div>
    </div>

    <div class="main-content-evaluasi-kinerja">
        <table class="table-evaluasi-kinerja">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Perangkat Daerah</th>
                    <th>Tahun</th>
                    <th>Kategori (per Tahun)</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;
                foreach ($table as $baris) :
                ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $baris['opd'] ?></td>
                        <td><?= $baris['year'] ?></td>
                        <td>
                            <form id="tambah_evaluasi" action="<?= base_url('Admin_sakip_sulut/evaluasi_kinerja/') ?>" method="POST" class="form-input-evaluasi-admin" enctype="multipart/form-data">
                                <div class="input-file-evaluasi-container">
                                    <?php if (!$baris['file_name']) : ?>
                                        <label for="upload-file-evaluasi-<?= $nomor ?>" class="up-file-evaluasi upload-file-evaluasi-label-<?= $nomor ?>">
                                            Upload file anda disini...
                                            <i class="fa-solid fa-file-circle-plus"></i>
                                        </label>
                                        <input type="file" name="file" id="upload-file-evaluasi-<?= $nomor ?>" class="upload-file-evaluasi-input" required accept=".doc,.docx, application/pdf" data-nomor="<?= $nomor ?>">
                                    <?php else : ?>
                                        <label style="cursor:default;" for="upload-file-evaluasi-<?= $nomor ?>" class="up-file-evaluasi upload-file-evaluasi-label-<?= $nomor ?>">
                                            <?= $baris['file_name'] ?>
                                            <i class="fa-solid fa-file-circle-plus"></i>
                                        </label>
                                        <input type="file" disabled name="file" id="upload-file-evaluasi-<?= $nomor ?>" class="upload-file-evaluasi-input" required accept=".doc,.docx, application/pdf" data-nomor="<?= $nomor ?>">
                                    <?php endif ?>
                                </div>
                                <?php if (!$baris['nilai']) : ?>
                                    <input type="text" id="nilai" name="nilai" class="input-evaluasi-admin" placeholder="Input Nilai">
                                <?php else : ?>
                                    <input type="text" disabled value="<?= $baris['nilai'] ?>" id="nilai" name="nilai" class="input-evaluasi-admin" placeholder="Input Nilai">
                                <?php endif ?>
                                <input type="text" id="opd" name="opd" hidden value="<?= $baris['opd'] ?>">
                                <input type="text" id="select_year" name="select_year" hidden value="<?= $baris['year'] ?>">
                                <button type="submit">Selesai</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $nomor++;
                endforeach;
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