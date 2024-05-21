$(document).ready(function () {
	// General
	$(".modal-close").click(function () {
		$(".modal-pengaturan, .modal").removeClass("active");
	});

	// Modal tambah user
	$(".btn-tambah-user").click(function () {
		$(".modal-tambah-user-container").addClass("active");
	});

	$(".btn-tambah-user-modal").click(function () {
		$(".modal-tambah-user-container").removeClass("active");
	});

	// Modal edit user

	$(".btn-edit-user").click(function () {
		$(".modal-edit-user-container").addClass("active");
	});

	$(".btn-edit-user-modal").click(function () {
		$(".modal-edit-user-container").removeClass("active");
	});

	// Modal Lupa Password

	$(".btn-lupa-password").click(function () {
		$(".modal-lupa-password-container").addClass("active");
	});

	$(".btn-lupa-password-modal").click(function () {
		$(".modal-lupa-password-container").removeClass("active");
	});

	// Modal block user
	$(".btn-block-user").click(function () {
		$(".modal-block-user-container").addClass("active");
	});

	$(".btn-tidak-block").click(function () {
		$(".modal-block-user-container").removeClass("active");
	});

	// Modal pengukuran

	// triwulan 1
	$(".triwulan1-modal").click(function (e) {
		// e.preventDefault();
		$(".modal-triwulan-1-container").addClass("active");
	});

	// triwulan 2
	$(".triwulan2-modal").click(function () {
		$(".modal-triwulan-2-container").addClass("active");
	});
	// triwulan 3
	$(".triwulan3-modal").click(function () {
		$(".modal-triwulan-3-container").addClass("active");
	});

	// triwulan 4
	$(".triwulan4-modal").click(function () {
		$(".modal-triwulan-4-container").addClass("active");
	});
});
