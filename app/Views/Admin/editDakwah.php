<?php
include 'header.php';
?>
    <script>
        buttonPengguna = document.getElementById("buttonDakwah");
        buttonPengguna.setAttribute("aria-expanded", "true");
        subButtonPengguna = document.getElementById("sidebar-dakwah");
        subButtonPengguna.classList.add("show");
        buttonPengguna2 = document.getElementById("buttonListDakwah");
        buttonPengguna2.classList.add("active");
    </script>
<?php
$errors = session()->getFlashdata();
if (isset($errors["errors"])) {
    ?>
    <div style="padding-bottom: 0px" class="alert alert-bottom alert-danger alert-dismissible fade show " role="alert">
        <div>Terjadi kesalahan saat menambahkan data:
            <ul>
                <?php
                foreach ($errors as $error) {
                    foreach ($error as $err) {
                        ?>
                        <li><?= $err ?></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}
?>
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="align-items: center">
            <div class="header-title">
                <h4 class="card-title">Edit Dakwah</h4>
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="/admin/dakwah/update" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data[0]["id"] ?>">
                <div class="row" style="padding-left: 10px;padding-right: 10px">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault01">Judul</label>
                        <input name="judul" autocomplete="off" type="text" class="form-control" id="validationDefault01"
                               value="<?= $data[0]["judul"] ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault02">Tema</label>
                        <input name="tema" autocomplete="off" type="text" class="form-control" id="validationDefault02"
                               value="<?= $data[0]["tema"] ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputdatetime" class="form-label">Waktu Mulai</label>
                        <input name="waktuMulai" type="datetime-local" class="form-control" id="exampleInputdatetime"
                               value="<?= $data[0]["waktuMulai"] ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault03">Durasi</label>
                        <input name="durasi" autocomplete="off" type="number" class="form-control"
                               id="validationDefault03" value="<?= $data[0]["durasi"] ?>">
                        <div class="d-inline-block align-items-center" style="font-size: 14px;margin-top: 0px;">
                            <span>
                                * Gunakan satuan menit.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault04">Pendakwah</label>
                        <input name="pendakwah" autocomplete="off" type="text" class="form-control"
                               id="exampleInputPassword3" value="<?= $data[0]["pendakwah"] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault06">Lokasi</label>
                        <input name="lokasi" autocomplete="off" type="text" class="form-control"
                               id="validationDefault06" value="<?= $data[0]["lokasi"] ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault05">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1"
                                  rows="5"><?= $data[0]["deskripsi"] ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault07">Nama Penyelenggara</label>
                        <select class="form-select" name="id_penyelenggara" id="">
                            <option value="" disabled selected>Pilih nama lembaga</option>
                            <?php
                            foreach ($data2 as $value) {
                                ?>
                                <option <?php if ($value["id"] == $data[0]["id_penyelenggara"]) {
                                    echo "selected";
                                } ?> value="<?= $value["id"] ?>"><?= $value["namaLembaga"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault05">Poster Picture</label>
                        <input style="display: none;visibility: hidden" name="posterPict" id="uploadGambar"
                               class="form-control" type="file" accept=".jpg, .jpeg, .png">
                        <button style=" padding: 0;margin: 0;width: fit-content;height: fit-content"
                                class="form-control" type="button" onclick="klikInput()">
                            <img id="imageAfterPoster"
                                 style="border-radius: 0.25rem;width: 100%;height: 100%; padding: 0px"
                                 src="<?= base_url() . "/upload/" . $data[0]['posterPict'] ?>">
                        </button>

                        <div class="d-inline-block align-items-center" style="font-size: 14px;margin-top: 0px">
                            <span>* Only</span>
                            <a href="javascript:void();">.jpg</a>
                            <a href="javascript:void();">.png</a>
                            <a href="javascript:void();">.jpeg</a>
                            <span>allowed.</span>
                        </div>
                        <br>
                        <div class="d-inline-block align-items-center">
                            <span style="font-size: 14px;">* If not change, it will use previous poster picture.</span>
                        </div>
                    </div>
                </div>
                <button style="font-size: 14px;margin-left: 10px; margin-top: 10px" class="btn btn-primary "
                        type="submit">Submit
                </button>
                <a href="/admin/dakwah" class="btn btn-danger flex-row align-itr"
                   style=" margin-top: 10px;margin-left: 5px" role="button">
                    Cancel
                </a>
            </form>
        </div>
    </div>
    <script src="<?= base_url() ?>customJS/modalPosterPict.js" defer></script>
<?php
include 'footer.php';
?>