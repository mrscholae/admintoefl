// ketika menekan tombol simpan pada modal tambah tes 
$("#btnAddTes").click(function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan tes?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let tgl_tes = $("#tgl_tes_add").val();
            let tgl_pengumuman = $("#tgl_pengumuman_add").val();
            let tipe_soal = $("#tipe_soal_add").val();
            let waktu = $("#waktu_add").val();
            let password = $("#password_add").val();
            let catatan = $("#catatan_add").val();

            let eror = required("#formAddTes");
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = {tgl_tes: tgl_tes, tgl_pengumuman: tgl_pengumuman, tipe_soal: tipe_soal, password: password, waktu: waktu, catatan: catatan}
                let result = ajax(url_base+"tes/add_tes", "POST", data);

                if(result == 1){
                    loadPagination(0);
                    $("#formAddTes").trigger("reset");

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil menambahkan data tes',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan, ulangi input tes'
                    })
                }
            }
        }
    })
})

// ketika menekan tombol edit tes 
$(document).on("click",".btnEditTes", function(){
    let id_tes = $(this).data("id");
    let data = {id_tes: id_tes};
    let result = ajax(url_base+"tes/get_tes", "POST", data);
    
    
    $("#id_tes_edit").val(result.id_tes);
    $("#tgl_tes_edit").val(result.tgl_tes);
    $("#tgl_pengumuman_edit").val(result.tgl_pengumuman);
    $("#tipe_soal_edit").val(result.tipe_soal);
    $("#password_edit").val(result.password);
    $("#waktu_edit").val(result.waktu);
    $("#status_edit").val(result.status);
    $("#catatan_edit").val(result.catatan);
})

// ketika menyimpan hasil edit tes 
$("#btnEditTes").click(function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data tes?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#formEditTes";
            let id_tes = $(form+" #id_tes_edit").val();
            let tgl_tes = $(form+" #tgl_tes_edit").val();
            let tgl_pengumuman = $(form+" #tgl_pengumuman_edit").val();
            let tipe_soal = $(form+" #tipe_soal_edit").val();
            let password = $(form+" #password_edit").val();
            let waktu = $(form+" #waktu_edit").val();
            let status = $(form+" #status_edit").val();
            let catatan = $(form+" #catatan_edit").val();
            
            let eror = required("#formEditTes");
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                // let status = $("#status_edit").val();
                data = {id_tes: id_tes, tgl_tes: tgl_tes, tgl_pengumuman: tgl_pengumuman, tipe_soal: tipe_soal, password: password, status: status, waktu: waktu, catatan: catatan}
                let result = ajax(url_base+"tes/edit_tes", "POST", data);

                if(result == 1){
                    loadPagination(0);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data tes',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan'
                    })
                }
            }
        }
    })
})

// ketika menghapus data tes 
$(document).on("click", ".btnHapusTes", function(){
    let id_tes = $(this).data("id");

    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menghapus data tes ini?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            data = {id_tes: id_tes}
            let result = ajax(url_base+"tes/hapus_tes", "POST", data);

            if(result == 1){
                loadPagination(0);

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: 'Berhasil menghapus data tes',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, gagal menghapus data tes'
                })
            }
        }
    })
})
