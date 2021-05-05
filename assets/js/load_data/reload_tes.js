var page = "";

// Detect pagination click
$("#pagination").on("click", "a", function (e) {
	e.preventDefault();
	var pageno = $(this).attr("data-ci-pagination-page");
	loadPagination(pageno);

	page = pageno;
});

loadPagination(0);

// Load pagination
function loadPagination(pagno) {
	let result = ajax(url_base + "tes/loadRecord/" + pagno, "POST", "");

	console.log(result.total_rows);

	if (result.total_rows != 0) {
		if (result.total_rows_perpage != 0) {
			$("#pagination").html(result.pagination);
			createTable(result.result, result.row);
		} else {
			pageback = pagno - 1;
			let result = ajax(url_base + "tes/loadRecord/" + pageback, "POST", "");

			$("#pagination").html(result.pagination);
			createTable(result.result, result.row);
		}
	} else {
		html = `<div class="col-12"><div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-1"></i>Data tes kosong</div></div>`;
		$("#dataAjax").html(html);
	}
}

// Create table list
function createTable(data, sno) {
	sno = Number(sno);

	html = "";

	for (index in data) {
		if (data[index].status == "Selesai") {
			color = `list-group-item-success`;
		} else {
			color = `list-group-item-warning`;
		}

		html +=
			`
        <div class="col-12 col-md-4">
            <div class="card shadow mb-4">
                <div class="` +
			color +
			` card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-calendar mr-3"></i>` +
			data[index].tgl_tes +
			`</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Tes</div>
                            <a class="dropdown-item btnEditTes" href="#editTes" data-toggle="modal" data-id="` +
			data[index].id_tes +
			`">Edit</a>
                            <a class="dropdown-item" target="_blank" href="` +
			url_base +
			`tes/list_peserta/` +
			data[index].id_tes +
			`">List Peserta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item btnHapusTes" href="javascript:void(0)" data-id="` +
			data[index].id_tes +
			`">Hapus</a>
                        </div>
                    </div>
                </div>
                <div class="card-body text-gray-900">
                    <p><i class="fa fa-bullhorn text-warning mr-2"></i> ` +
			data[index].tgl_pengumuman +
			`</p>
                    <p><i class="fa fa-info-circle text-info mr-2"></i> ` +
			data[index].status +
			`</p>
                    <p><i class="fa fa-clipboard text-info mr-2"></i> ` +
			data[index].catatan +
			`</p>
                    <p><i class="fa fa-file-alt text-success mr-3"></i> Soal ` +
			data[index].tipe_soal +
			`</p>
                    <p><i class="fa fa-stopwatch text-dark mr-3"></i>` +
			data[index].waktu +
			` (menit)</p>
                    <p><i class="fa fa-key text-danger mr-2"></i> ` +
			data[index].password +
			`</p>
                    <p><i class="fa fa-users text-dark mr-2"></i> ` +
			data[index].peserta +
			` Peserta</p>
                    <p><i class="fa fa-link text-primary mr-2"></i> ` +
			data[index].link +
			`</p>
                    <p class="text-right"><a href="` +
			url_base +
			`/tes/hasil/` +
			data[index].id_hasil +
			`" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-certificate text-warning mr-1"></i> Hasil</a></p>
                    
                </div>
            </div>
        </div>`;
	}

	$("#dataAjax").html(html);
}
