<div class="perencanaan-kinerja-container">
    <div class="main-content-perencanaan-kinerja">
        <form id="perencanaan" action="<?= base_url('User/perencanaan_kinerja'); ?>" class="form-input-dokumen-perencanaan" method="POST" enctype="multipart/form-data">
            <div class="wrapper-input-dokumen">
                <label for="input-nama-dokumen">Nama Dokumen</label>
                <input name="nama_dok" id="nama_dok" type="text" placeholder="Contoh: IKU2019..." class="input-nama-dokumen upload-input">
            </div>

            <div class="wrapper-input-dokumen">
                <label for="input-jenis-dokumen">Jenis Dokumen</label>
                <select name="jenis_dok" id="jenis_dok" class="input-jenis-dokumen upload-input" required>
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
                <label for="upload-file-dokumen">Pilih File</label>
                <!-- label ini berfungsi sebagai input(secara tampilan) -->
                <label for="upload-file-dokumen" class="upload-file-dokumen">
                    Upload file anda disini...
                    <i class="fa-solid fa-file-circle-plus"></i>
                </label>
                <!-- hanya trima dokumen dan gambar -->
                <input type="file" name="File_dok" id="upload-file-dokumen" class="upload-file-perencanaan upload-input" required accept=".doc,.docx, application/pdf">
            </div>

            <button type="submit" value="KIRIM" id="kirim-dokumen-perencanaan">Kirim</button>
        </form>
    </div>
</div>