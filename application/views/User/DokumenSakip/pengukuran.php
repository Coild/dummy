<div class="pengukuran-kinerja-container">
    <div class="main-content-pengukuran-kinerja" style="height: 100vh;">
        <?php if (!$year) : ?>
        <?php else : ?>
            <form class="form-pilih-tahun-pengukuran" method="GET" action="<?= base_url('user/pengukuran_kinerja') ?>">
                Pilih Tahun
                <select class="select" name="year" id="pilih-tahun-evaluasi">
                    <?php foreach ($year as $y) : ?>
                        <option value="" selected hidden></option>
                        <option value="<?= $y->year ?>"><?= $y->year ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" name="pilih_tahun" value="Tampilkan">
            </form>
        <?php endif ?>

        <div class="pilih-lihat-upload-pengukuran-container">
            <div class="pilih-lihat-hasil-pengukuran pilih-lihat-upload-pengukuran active">
                Lihat Hasil
            </div>
            <div class="pilih-upload-dokumen-pengukuran pilih-lihat-upload-pengukuran">
                Upload Dokumen
            </div>
        </div>

        <div class="pilih-lihat-hasil-pengukuran-content active" style="margin-top: 40px;">
            <?php if (!$nilai_triwulan) : ?>
                <a style="pointer-events: none; background-color:lightgrey;" class="btn-triwulan triwulan1-modal" type="button">
                    Triwulan 1
                </a>
                <a style="pointer-events: none; background-color:lightgrey;" class="btn-triwulan triwulan2-modal" type="button">
                    Triwulan 2
                </a>
                <a style="pointer-events: none; background-color:lightgrey;" class="btn-triwulan triwulan3-modal" type="button">
                    Triwulan 3
                </a>
                <a style="pointer-events: none; background-color:lightgrey;" class="btn-triwulan triwulan4-modal" type="button">
                    Triwulan 4
                </a>
            <?php else : ?>
                <a class="btn-triwulan triwulan1-modal" type="button">
                    Triwulan 1
                </a>
                <a class="btn-triwulan triwulan2-modal" type="button">
                    Triwulan 2
                </a>
                <a class="btn-triwulan triwulan3-modal" type="button">
                    Triwulan 3
                </a>
                <a class="btn-triwulan triwulan4-modal" type="button">
                    Triwulan 4
                </a>
            <?php endif ?>
        </div>

        <?php
        if (!empty($nilai_triwulan)) {
            foreach ($nilai_triwulan as $nt) {
        ?>
                <!-- triwula1 -->
                <div class="modal-triwulan-1-container modal">
                    <div class="modal-triwulan-user">
                        <div class="head-modal-triwulan">
                            Hasil Triwulan I
                            <i class="fa-solid fa-circle-xmark modal-close"></i>
                        </div>
                        <div class="content-modal-triwulan-user">

                            <div class="hasil-pengukuran-container">
                                <label for="jlh-indikator">Jumlah Indikator</label>
                                <input type="text" disabled value="<?= $nt->ji_t1 ?>" id="jlh-indikator" class="jlh-indikator" disabled>
                            </div>
                            <div class="hasil-pengukuran-container">
                                <label for="tidak-ada-target-input">Target</label>
                                <input type="text" value="<?= $nt->tt_t1 ?>" class="tidak-ada-target-input" disabled>
                            </div>
                            <div class="tidak-tercapai-user-container">
                                <p>Tidak Tercapai:</p>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-pertama">00.00 s/d 49.99</label>
                                    <input value="<?= $nt->tc1_t1 ?>" type="text" id="tidak-tercapai-pertama" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kedua">50.00 s/d 64.99</label>
                                    <input value="<?= $nt->tc2_t1 ?>" type="text" id="tidak-tercapai-kedua" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-ketiga">65.00 s/d 74.99</label>
                                    <input value="<?= $nt->tc3_t1 ?>" type="text" id="tidak-tercapai-ketiga" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-keempat">75.00 s/d 89.99</label>
                                    <input value="<?= $nt->tc4_t1 ?>" type="text" id="tidak-tercapai-keempat" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kelima">90.00 s/d 99.99</label>
                                    <input value="<?= $nt->tc5_t1 ?>" type="text" id="tidak-tercapai-kelima" class="tidak-tercapai-input" disabled>
                                </div>
                            </div>
                            <div class="tercapai-melebihi-container">
                                <label for="tercapai-input" style="font-size: 14px;">Tercapai</label>
                                <input value="<?= $nt->t_t1 ?>" type="text" id="tercapai-input" class="tercapai-input" disabled>
                                <label for="melebihi-target-input" style="font-size: 14px; ">Melebihi Target</label>
                                <input value="<?= $nt->mt_t1 ?>" type="text" id="melebihi-target-input" class="melebihi-target-input" disabled style="margin-left: 0px;">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- triwula2 -->
                <div class="modal-triwulan-2-container modal">
                    <div class="modal-triwulan-user">
                        <div class="head-modal-triwulan">
                            Hasil Triwulan II
                            <i class="fa-solid fa-circle-xmark modal-close"></i>
                        </div>
                        <div class="content-modal-triwulan-user">
                            <div class="hasil-pengukuran-container">
                                <label for="jlh-indikator">Jumlah Indikator</label>
                                <input type="text" disabled value="<?= $nt->ji_t2 ?>" id="jlh-indikator" class="jlh-indikator" disabled>
                            </div>
                            <div class="hasil-pengukuran-container">
                                <label for="tidak-ada-target-input">Target</label>
                                <input type="text" value="<?= $nt->tt_t2 ?>" class="tidak-ada-target-input" disabled>
                            </div>
                            <div class="tidak-tercapai-user-container">
                                <p>Tidak Tercapai:</p>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-pertama">00.00 s/d 49.99</label>
                                    <input value="<?= $nt->tc1_t2 ?>" type="text" id="tidak-tercapai-pertama" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kedua">50.00 s/d 64.99</label>
                                    <input value="<?= $nt->tc2_t2 ?>" type="text" id="tidak-tercapai-kedua" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-ketiga">65.00 s/d 74.99</label>
                                    <input value="<?= $nt->tc3_t2 ?>" type="text" id="tidak-tercapai-ketiga" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-keempat">75.00 s/d 89.99</label>
                                    <input value="<?= $nt->tc4_t2 ?>" type="text" id="tidak-tercapai-keempat" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kelima">90.00 s/d 99.99</label>
                                    <input value="<?= $nt->tc5_t2 ?>" type="text" id="tidak-tercapai-kelima" class="tidak-tercapai-input" disabled>
                                </div>
                            </div>
                            <div class="tercapai-melebihi-container">
                                <label for="tercapai-input" style="font-size: 14px;">Tercapai</label>
                                <input value="<?= $nt->t_t2 ?>" type="text" id="tercapai-input" class="tercapai-input" disabled>
                                <label for="melebihi-target-input" style="font-size: 14px; ">Melebihi Target</label>
                                <input value="<?= $nt->mt_t2 ?>" type="text" id="melebihi-target-input" class="melebihi-target-input" disabled style="margin-left: 0px;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- triwula3 -->
                <div class="modal-triwulan-3-container modal">
                    <div class="modal-triwulan-user">
                        <div class="head-modal-triwulan">
                            Hasil Triwulan III
                            <i class="fa-solid fa-circle-xmark modal-close"></i>
                        </div>
                        <div class="content-modal-triwulan-user">
                            <div class="hasil-pengukuran-container">
                                <label for="jlh-indikator">Jumlah Indikator</label>
                                <input type="text" disabled value="<?= $nt->ji_t3 ?>" id="jlh-indikator" class="jlh-indikator" disabled>
                            </div>
                            <div class="hasil-pengukuran-container">
                                <label for="tidak-ada-target-input">Target</label>
                                <input type="text" value="<?= $nt->tt_t3 ?>" class="tidak-ada-target-input" disabled>
                            </div>
                            <div class="tidak-tercapai-user-container">
                                <p>Tidak Tercapai:</p>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-pertama">00.00 s/d 49.99</label>
                                    <input value="<?= $nt->tc1_t3 ?>" type="text" id="tidak-tercapai-pertama" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kedua">50.00 s/d 64.99</label>
                                    <input value="<?= $nt->tc2_t3 ?>" type="text" id="tidak-tercapai-kedua" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-ketiga">65.00 s/d 74.99</label>
                                    <input value="<?= $nt->tc3_t3 ?>" type="text" id="tidak-tercapai-ketiga" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-keempat">75.00 s/d 89.99</label>
                                    <input value="<?= $nt->tc4_t3 ?>" type="text" id="tidak-tercapai-keempat" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kelima">90.00 s/d 99.99</label>
                                    <input value="<?= $nt->tc5_t3 ?>" type="text" id="tidak-tercapai-kelima" class="tidak-tercapai-input" disabled>
                                </div>
                            </div>
                            <div class="tercapai-melebihi-container">
                                <label for="tercapai-input" style="font-size: 14px;">Tercapai</label>
                                <input value="<?= $nt->t_t3 ?>" type="text" id="tercapai-input" class="tercapai-input" disabled>
                                <label for="melebihi-target-input" style="font-size: 14px; ">Melebihi Target</label>
                                <input value="<?= $nt->mt_t3 ?>" type="text" id="melebihi-target-input" class="melebihi-target-input" disabled style="margin-left: 0px;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- triwula4 -->
                <div class="modal-triwulan-4-container modal">
                    <div class="modal-triwulan-user">
                        <div class="head-modal-triwulan">
                            Hasil Triwulan IV
                            <i class="fa-solid fa-circle-xmark modal-close"></i>
                        </div>
                        <div class="content-modal-triwulan-user">
                            <div class="hasil-pengukuran-container">
                                <label for="jlh-indikator">Jumlah Indikator</label>
                                <input type="text" disabled value="<?= $nt->ji_t4 ?>" id="jlh-indikator" class="jlh-indikator" disabled>
                            </div>
                            <div class="hasil-pengukuran-container">
                                <label for="tidak-ada-target-input">Target</label>
                                <input type="text" value="<?= $nt->tt_t4 ?>" class="tidak-ada-target-input" disabled>
                            </div>
                            <div class="tidak-tercapai-user-container">
                                <p>Tidak Tercapai:</p>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-pertama">00.00 s/d 49.99</label>
                                    <input value="<?= $nt->tc1_t4 ?>" type="text" id="tidak-tercapai-pertama" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kedua">50.00 s/d 64.99</label>
                                    <input value="<?= $nt->tc2_t4 ?>" type="text" id="tidak-tercapai-kedua" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-ketiga">65.00 s/d 74.99</label>
                                    <input value="<?= $nt->tc3_t4 ?>" type="text" id="tidak-tercapai-ketiga" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-keempat">75.00 s/d 89.99</label>
                                    <input value="<?= $nt->tc4_t4 ?>" type="text" id="tidak-tercapai-keempat" class="tidak-tercapai-input" disabled>
                                </div>
                                <div class="tidak-tercapai-indikator">
                                    <label for="tidak-tercapai-kelima">90.00 s/d 99.99</label>
                                    <input value="<?= $nt->tc5_t4 ?>" type="text" id="tidak-tercapai-kelima" class="tidak-tercapai-input" disabled>
                                </div>
                            </div>
                            <div class="tercapai-melebihi-container">
                                <label for="tercapai-input" style="font-size: 14px;">Tercapai</label>
                                <input value="<?= $nt->t_t4 ?>" type="text" id="tercapai-input" class="tercapai-input" disabled>
                                <label for="melebihi-target-input" style="font-size: 14px; ">Melebihi Target</label>
                                <input value="<?= $nt->mt_t4 ?>" type="text" id="melebihi-target-input" class="melebihi-target-input" disabled style="margin-left: 0px;">
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>

        <!-- form untuk input pengukuran kinerja -->
        <form action="<?= base_url('User/pengukuran_kinerja'); ?>" class="form-input-dokumen-pengukuran" method="POST" enctype="multipart/form-data">
            <div class="wrapper-input-dokumen">
                <label for="input-nama-dokumen">Nama Dokumen</label>
                <input type="text" name="nama_dok" id="nama_dok" placeholder="Cth: Laporan Kinerja Triwulan 1" class="input-nama-dokumen upload-input">
            </div>
            <div class="wrapper-input-dokumen">
                <label for="inpTri">Input Triwulan</label>
                <select name="inpTri" id="inpTri" class="input-triwulan upload-input">
                    <?php foreach ($jenis_surat as $value) : ?>
                        <option value="" hidden>Pilih..</option>
                        <option value="<?= $value->name ?>"><?= $value->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- untuk pilih tahun -->
            <div class="wrapper-input-dokumen">
                <label for="year">Pilih Tahun</label>
                <select name="year" id="year" class="select input-triwulan upload-input">
                    <?php foreach ($year as $value) : ?>
                        <option value="" hidden>Pilih..</option>
                        <option value="<?= $value->year ?>"><?= $value->year ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="wrapper-input-dokumen">
                <label for="file">Pilih File</label>
                <!-- label ini berfungsi sebagai input(secara tampilan) -->
                <label for="file" class="upload-file-dokumen">
                    Upload file anda disini...
                    <i class="fa-solid fa-file-circle-plus"></i>
                </label>
                <!-- hanya trima dokumen dan gambar -->
                <input type="file" id="file" name="file" class="upload-file-pengukuran upload-input" required accept=".doc,.docx, application/pdf">
            </div>
            <button type="submit">Kirim</button>
        </form>
    </div>
</div>