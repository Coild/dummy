$(document).ready(function () {
	/* FOR UBAH DEPE WIDTH DARI KONTEN KETIKA SIDEBAR DI TUTUP */
	$(".sidebar").click(function () {
		const hasClass = $(".sidebar").hasClass("close");
		// TORANG CHECK DULU KALO DPE SIDEBAR ADA CLOSE ATO NDA
		if (hasClass) {
			// KALO ADA CLOSE, MAKA CONTENT JADI LEBIH LEBAR, SIDEBAR JADI LEBIH KECIL
			$(".content-container").addClass("lebih-lebar");
			$(".sidebar-container").addClass("lebih-kecil");
			console.log("lebih-lebar");
		} else {
			// KALO TABUKA, MAKA CONTENT JADI LEBIH KECIL, SIDEBAR JADI LEBE BESAR
			$(".content-container").removeClass("lebih-lebar");
			$(".sidebar-container").removeClass("lebih-kecil");
		}
	});

	/*FOR UBAH WARNA ICON NOTIFIKASI */
	$(".headline-for-all i").click(function () {
		$(".headline-for-all i").toggleClass("active");
		$(".head-notification-container").toggleClass("active");
		console.log("headline");
	});

	// FOR KASE TIMBUL DROPDOW DI PILIH USER (UPDATE DATA USER)
	$(".pilih-user-opd span").click(function () {
		$(".pilih-user-opd ul.daftar-user").toggleClass("active");
		$('.pilih-user-opd span').toggleClass("active");
		const classActivePilihUser = $(".pilih-user-opd ul.daftar-user").hasClass("active");
		if (
			classActivePilihUser &&
			$(".pilih-user-opd .daftar-user").is(":hidden")
		) {
			/* 1. FOR KASE TURUN DEPE DROPDOWN */
			console.log("slidedown aktif");

			// $(".pilih-user-opd .daftar-user").addClass("active");
			$(".pilih-user-opd .daftar-user").slideDown("fast");
			/* 2. FOR UBAH ICON UP JADI DOWN */
		}
		$(".pilih-user-opd label i").toggleClass("fa-chevron-up fa-chevron-down");

		// } else {
		// 	console.log("slideup aktif");
		// 	/* 1. FOR KASE NAE DEPE DROPDOWN */
		// 	$(".pilih-user-opd .daftar-user").slideUp("fast");
		// 	// $(".pilih-user-opd .daftar-user").removeClass("active");
		// 	$(".pilih-user-opd span i").toggleClass("fa-chevron-down fa-chevron-up");
		// 	/* 2. FOR UBAH ICON DOWN JADI UP*/
		// }
		// $(".pilih-user-opd .daftar-user").addClass("active");

	});

	// $(".daftar-user .pilih-user").click(function (e) {
	// 	e.preventDefault()
	// 	$(".pilih-user-opd .daftar-user").removeClass("active");
	// 	$('.main-content-edit-data .form-edit-user').addClass("active")

	// });

	$('.pilih-lihat-upload-pengukuran').click(function () {
		$(this).addClass("active").siblings().removeClass("active")

		if ($('.pilih-lihat-hasil-pengukuran').hasClass('active')) {
			$('.pilih-lihat-hasil-pengukuran-content').toggleClass('active')
		}
		else {
			$('.pilih-lihat-hasil-pengukuran-content').removeClass('active')
		}
		if ($('.pilih-upload-dokumen-pengukuran').hasClass('active')) {
			$('.form-input-dokumen-pengukuran').toggleClass('active')
		}
		else {
			$('.form-input-dokumen-pengukuran').removeClass('active')
		}

	})

	$('.pilih-btn-triwulan').click(function () {
		$(this).addClass("active").siblings().removeClass("active");
		$(this).addClass("point-none").siblings().removeClass("point-none");

		if ($('.btn-triwulan-1').hasClass('active')) {
			$('.triwulan-1').toggleClass('active');
		}
		else {
			$('.triwulan-1').removeClass('active');
		}

		if ($('.btn-triwulan-2').hasClass('active')) {
			$('.triwulan-2').toggleClass('active');
		}
		else {
			$('.triwulan-2').removeClass('active');
		}

		if ($('.btn-triwulan-3').hasClass('active')) {
			$('.triwulan-3').toggleClass('active');

		}
		else {
			$('.triwulan-3').removeClass('active');
		}

		if ($('.btn-triwulan-4').hasClass('active')) {
			$('.triwulan-4').toggleClass('active');

		}
		else {
			$('.triwulan-4').removeClass('active');
		}
	})

	/*FOR UBAH WARNA DI BUTTON PAGINATION */
});


