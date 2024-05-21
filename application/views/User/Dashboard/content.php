<div class="dashboard-container">

    <div class="search-table-container">
        <div class="show-n-row-table">
            <p>Lihat</p>
            <form method="GET" action="<?= base_url('user/') ?>">
                <select name="banyaknya-data">
                    <option hidden></option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <!-- <option value="5">5</option> -->
                </select>
                <input type="submit" name="pilih_jum_data" value="Tampilkan">
            </form>
        </div>
        <div class="search-table">
            <form action="<?= base_url('user/index') ?>" method="post">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Ketik Disini" class="search-table-input" autocomplete="off">
                <input type="submit" name="submit" value="Cari" class="search-table-submit"></input>
            </form>
        </div>
    </div>

    <div class="main-content-dashboard-user">
        <table class="table-dashboard-user">
            <!-- DI BAGIAN TABLE SO BOLEH COBA PAKE API FOR DATA DUMMY -->
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Dokumen</th>
                    <th>Status</th>
                    <th>Tahun</th>
                    <th>Unduh Dokumen</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;
                if (!empty($all_docs)) {
                    foreach ($all_docs as $s) {
                ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td style="text-align: start; padding-left: 20px"><?= $s->nama_dok; ?></td>
                            <td><i class="fa-solid fa-circle-check"></i></td>
                            <td><?= $s->year; ?></td>
                            <td>
                                <a href="<?= base_url() ?>Download/download/<?= $s->id ?>">
                                    <i class="fa-solid fa-file-arrow-down">
                                    </i>
                                </a>
                            </td>
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