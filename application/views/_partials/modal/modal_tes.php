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
                        <option value="1">TOEFL 1</option>
                        <option value="2">TOEFL 2</option>
                        <option value="3">TOEFL 3</option>
                        <option value="4">TOEFL 4</option>
                        <option value="5">TOEFL 5</option>
                        <option value="6">TOEFL 6</option>
                        <option value="7">TOEFL 7</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu_add">Waktu (menit)</label>
                    <input type="number" name="waktu" id="waktu_add" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="">Catatan</label>
                    <textarea name="catatan" id="catatan_add" class="form-control form-control-sm required"></textarea>
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
                        <option value="1">TOEFL 1</option>
                        <option value="2">TOEFL 2</option>
                        <option value="3">TOEFL 3</option>
                        <option value="4">TOEFL 4</option>
                        <option value="5">TOEFL 5</option>
                        <option value="6">TOEFL 6</option>
                        <option value="7">TOEFL 7</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu_edit">Waktu (menit)</label>
                    <input type="number" name="waktu" id="waktu_edit" class="form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label for="">Catatan</label>
                    <textarea name="catatan" id="catatan_edit" class="form-control form-control-sm required"></textarea>
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

<!-- modal edit Tes  -->
<div class="modal fade" id="editPeserta" tabindex="-1" role="dialog" aria-labelledby="editTesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTesLabel">Edit Tes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="user">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-group">
                    <label>Nama Peserta</label>
                    <input type="text" name="nama" class="form form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="jk" class="form form-control form-control-sm required">
                        <option value="">Pilih Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="t4_lahir" class="form form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label>Tgl Lahir</label>
                    <input type="date" name="tgl_lahir" class="form form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label>No. WA</label>
                    <input type="text" name="no_wa" class="form form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form form-control form-control-sm required">
                </div>
                <div class="form-group">
                    <label>Alamat Sertifikat</label>
                    <textarea name="alamat" class="form form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Alamat Pengiriman</label>
                    <textarea name="alamat_pengiriman" class="form form-control"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <form action="" class="user">
                <button type="button" class="btn btn-secondary btn-user" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-user btnEdit">Edit</button>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- modal edit Tes  -->
<div class="modal fade" id="addSertifikat" tabindex="-1" role="dialog" aria-labelledby="editTesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTesLabel">Tambah Sertifikat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="user">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-group">
                    <label>Sertifikat</label>
                    <select name="sertifikat" class="form form-control form-control-sm required">
                        <option value="">Pilih Sertifikat</option>
                        <option value="Soft File">Soft File</option>
                        <option value="Hard File">Hard File</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Peserta</label>
                    <input type="text" name="nama" class="form form-control form-control-sm required" readonly>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <form action="" class="user">
                <button type="button" class="btn btn-secondary btn-user" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-user btnTambah">Tambah</button>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- modal edit Tes  -->
<div class="modal fade" id="editSertifikat" tabindex="-1" role="dialog" aria-labelledby="editTesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTesLabel">Edit Sertifikat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="user">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-group">
                    <label>Sertifikat</label>
                    <select name="sertifikat" class="form form-control form-control-sm required">
                        <option value="">Pilih Sertifikat</option>
                        <option value="Soft File">Soft File</option>
                        <option value="Hard File">Hard File</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Peserta</label>
                    <input type="text" name="nama" class="form form-control form-control-sm required" readonly>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <form action="" class="user">
                <button type="button" class="btn btn-secondary btn-user" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-user btnEdit">Edit</button>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- upload gambar  -->
<div class="modal fade" id="uploadGambar" tabindex="-1" role="dialog" aria-labelledby="editTesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editTesLabel">Upload Foto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="" enctype="multipart/form-data" class="myform">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label for="">Nama Peserta</label>
                    <input type="text" name="nama" class="form-control form-control-sm" readonly>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="file" id="file" class="form-control required">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <form action="" class="user">
                <button type="button" class="btn btn-secondary btn-user" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-user btnTambah">Tambah</button>
            </form>
        </div>
        </div>
    </div>
</div>