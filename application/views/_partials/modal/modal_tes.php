<!-- modal add Tes  -->
<div class="modal fade" id="addTes" tabindex="-1" role="dialog" aria-labelledby="addTesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addTesLabel">Tambah Tes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="user" id="formAddTes">
                <div class="form-group">
                    <label for="tgl_tes_add">Tgl Tes</label>
                    <input type="date" name="tgl_tes" id="tgl_tes_add" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="tgl_pengumuman_edit">Tgl Pengumuman</label>
                    <input type="date" name="tgl_pengumuman" id="tgl_pengumuman_add" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="tipe_soal_add">Tipe Soal</label>
                    <select name="tipe_soal" id="tipe_soal_add" class="form-control form-control-sm required">
                        <option value="">Pilih Tipe Soal</option>
                        <option value="1">Soal 1</option>
                        <option value="2">Soal 2</option>
                        <option value="3">Soal 3</option>
                        <!-- <option value="4">Soal 4</option>
                        <option value="5">Soal 5</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu_add">Waktu (menit)</label>
                    <input type="number" name="waktu" id="waktu_add" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="password_add" class="col-form-label">Password</label>
                    <input type="text" name="password" class="form-control form-control-sm required" id="password_add">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <form action="" class="user">
                <button type="button" class="btn btn-secondary btn-user" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-user" id="btnAddTes">Simpan</button>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- modal edit Tes  -->
<div class="modal fade" id="editTes" tabindex="-1" role="dialog" aria-labelledby="editTesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTesLabel">Edit Tes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="user" id="formEditTes">
                <input type="hidden" name="id_tes" id="id_tes_edit">
                <div class="form-group">
                    <label for="status_edit">Status</label>
                    <select name="status" id="status_edit" class="form-control form-control-sm required">
                        <option value="">Pilih Status</option>
                        <option value="Berjalan">Berjalan</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_tes_edit">Tgl Tes</label>
                    <input type="date" name="tgl_tes" id="tgl_tes_edit" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="tgl_pengumuman_edit">Tgl Pengumuman</label>
                    <input type="date" name="tgl_pengumuman" id="tgl_pengumuman_edit" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="tipe_soal_edit">Tipe Soal</label>
                    <select name="tipe_soal" id="tipe_soal_edit" class="form-control form-control-sm required">
                        <option value="">Pilih Tipe Soal</option>
                        <option value="1">Soal 1</option>
                        <option value="2">Soal 2</option>
                        <option value="3">Soal 3</option>
                        <!-- <option value="4">Soal 4</option>
                        <option value="5">Soal 5</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu_edit">Waktu (menit)</label>
                    <input type="number" name="waktu" id="waktu_edit" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="password_edit" class="col-form-label">Password</label>
                    <input type="text" name="password" class="form-control form-control-sm required" id="password_edit">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <form action="" class="user">
                <button type="button" class="btn btn-secondary btn-user" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-user" id="btnEditTes">Simpan</button>
            </form>
        </div>
        </div>
    </div>
</div>