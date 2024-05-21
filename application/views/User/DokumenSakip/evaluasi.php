<div class="evaluasi-kinerja-container">
    <div class="search-table-container">
        <div class="show-n-row-table">
            <p>Lihat</p>

            <form method="GET" action="<?= base_url('user/evaluasi_kinerja') ?>">
                <select name="banyaknya-data">
                    <option hidden></option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <!-- <option value="5">5</option> -->
                </select>
                <input type="submit" name="pilih_jum_data" value="Tampilkan">
            </form>
        </div>
    </div>
    <div class="main-content-evaluasi-kinerja">
        <table class="table-evaluasi-kinerja-user">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Dokumen</th>
                    <th>Hasil Penilaian</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;
                if (!empty($evaluasi)) {
                    foreach ($evaluasi as $s) {
                ?>
                        <tr>
                            <?php if (!$s->nilai) : ?>
                                <?php $nomor-- ?>;
                            <?php else : ?>
                                <td><?= $nomor ?></td>
                                <td><a href="<?= base_url() ?>Download/download_evaluasi/<?= $s->id ?>">
                                        <?= $s->file_name ?>
                                        <i class="fa-solid fa-file-arrow-down"></i>
                                    </a>
                                </td>
                                <td><?= $s->nilai ?></td>
                                <td><?= $s->year ?></td>
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