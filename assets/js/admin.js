$(document).ready(function () {
	// utk menampilkan data triwulan 1
	jQuery(document).on("click", "#triwulan1", function (e) {
		e.preventDefault();

		var id = $(this).data("id");
		var opd = $(this).data("opd");
		var year = $(this).data("year");

		$.ajax({
			type: "POST",
			url: "triwulan1",
			data: { id: id, opd: opd, year: year },
			success: function (data) {
				$("#modal_t1").html(data);
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});
	});

	// utk menampilkan data triwulan 2
	jQuery(document).on("click", "#triwulan2", function (e) {
		e.preventDefault();

		var id = $(this).data("id");
		var opd = $(this).data("opd");
		var year = $(this).data("year");

		$.ajax({
			type: "POST",
			url: "triwulan2",
			data: { id: id, opd: opd, year: year },
			success: function (data) {
				$("#modal_t2").html(data);
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});
	});

	// utk menampilkan data triwulan 3
	jQuery(document).on("click", "#triwulan3", function (e) {
		e.preventDefault();

		var id = $(this).data("id");
		var opd = $(this).data("opd");
		var year = $(this).data("year");

		$.ajax({
			type: "POST",
			url: "triwulan3",
			data: { id: id, opd: opd, year: year },
			success: function (data) {
				$("#modal_t3").html(data);
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});
	});

	// utk menampilkan data triwulan 4
	jQuery(document).on("click", "#triwulan4", function (e) {
		e.preventDefault();

		var id = $(this).data("id");
		var opd = $(this).data("opd");
		var year = $(this).data("year");

		$.ajax({
			type: "POST",
			url: "triwulan4",
			data: { id: id, opd: opd, year: year },
			success: function (data) {
				$("#modal_t4").html(data);
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});
	});

	//utk input triwulan1 ke db
	var form = $("#triwulan-1");
	form.submit(function (e) {
		e.preventDefault();

		$.ajax({
			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serialize(),
			success: function (data) {
				if ((data.status = true)) {
					location.reload();
				} else if ((data.status = false)) {
					location.reload();
				}
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});

		// $("#modal_t1").modal("show");
	});

	//utk input triwulan2 ke db
	var form = $("#triwulan-2");
	form.submit(function (e) {
		e.preventDefault();

		$.ajax({
			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serialize(),
			success: function (data) {
				if ((data.status = true)) {
					location.reload();
				} else if ((data.status = false)) {
					location.reload();
				}
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});

		// $("#modal_t1").modal("show");
	});

	//utk input triwulan3 ke db
	var form = $("#triwulan-3");
	form.submit(function (e) {
		e.preventDefault();

		$.ajax({
			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serialize(),
			success: function (data) {
				if ((data.status = true)) {
					location.reload();
				} else if ((data.status = false)) {
					location.reload();
				}
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});

		// $("#modal_t1").modal("show");
	});

	//utk input triwulan4 ke db
	var form = $("#triwulan-4");
	form.submit(function (e) {
		e.preventDefault();

		$.ajax({
			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serialize(),
			success: function (data) {
				if ((data.status = true)) {
					location.reload();
				} else if ((data.status = false)) {
					location.reload();
				}
			},
			error: function () {
				alert("Terjadi Kesalahan!");
			},
		});

		// $("#modal_t1").modal("show");
	});

	//utk menghapus duplicate select option
	$(".select option").each(function () {
		$(this)
			.siblings('[value="' + this.value + '"]')
			.remove();
	});
});
