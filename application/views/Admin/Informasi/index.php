<div class="informasi-container">
    <div class="main-content-informasi">
        <div class="the-base">
            <div class="daftar-pesan-terkirim">
                <?php if (!$info) : ?>
                    <h2 class="tidak-ada-pesan">Belum ada pesan apapun...</h2>
                <?php else : ?>
                    <?php
                    foreach ($info as $i) :
                    ?>
                        <div class="pesan-terkirim">
                            <h5 class="user-pengirim">Biro Organisasi to <small><?= $i->u_tujuan ?></small>
                            </h5>
                            <p><?= $i->informasi ?></p>
                            <h5><?= $i->date_sended ?></h5>
                        </div>
                        <hr>
                    <?php
                    endforeach;
                    ?>
                <?php endif ?>
            </div>
        </div>
        <form action="<?= base_url('admin_sakip_sulut/informasi'); ?>" class="form-kirim-pesan-admin" method="POST" enctype="multipart/form-data">

            <?php if ($error = $this->session->flashdata('msg')) { ?>
                <h3 class="text-success"><?php echo  $error; ?></h3>
            <?php } ?>


            <select name="u_tujuan" id="u_tujuan" class="pilih-opd">
                <option value="" hidden>Pilih..</option>
                <option value="All">Semua</option>
                <?php foreach ($users as $value) : ?>
                    <option value="<?= $value->user_name ?>"><?= $value->user_name ?></option>
                <?php endforeach ?>
            </select>

            <!-- <span style="color: red;"><?= form_error('informasi', '<small class="text-danger">', '</small>') ?></span> -->
            <textarea name="informasi" id="informasi" rows="8" placeholder="Input pesan anda disini..."></textarea>

            <!-- <input type="file" class="input-file-informasi"> -->
            <div class="input-file-informasi-container">
                <!-- <label for="upload-file-informasi">Pilih File</label> -->
                <!-- label ini berfungsi sebagai input(secara tampilan) -->
                <label for="upload-file-informasi" class="upload-file-informasi">
                    <!-- <span style="color: red;"><?= form_error('file', '<small class="text-danger">', '</small>') ?></span> -->
                    Upload file anda disini...
                    <i class="fa-solid fa-file-circle-plus"></i>
                </label>
                <!-- hanya trima dokumen -->
                <input name="file" type="file" id="upload-file-informasi" class="upload-file-informasi-input" accept=".doc,.docx, application/pdf">
            </div>
            <button type="submit" class="btn-kirim-informasi">Kirim</button>
        </form>
    </div>
</div>
</div>