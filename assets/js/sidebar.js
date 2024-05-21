// Ini for kase hide/show sidebar
const listBar = document.getElementById("list-bar");
const sidebar = document.getElementsByClassName("sidebar")[0];

listBar.addEventListener("click", function () {
	sidebar.classList.toggle("close");
	console.log("ok");
});

/* JQUERY START */
$(document).ready(function () {
	/* --FOR KASE TANDA USER D TINDIS PILIHAN APA */
	/* 1. INI KALO USER PILIH SALAH SATU MENU DI SIDEBAR*/
	$(".menu").click(function (e) {
		$(this).addClass("active").siblings().removeClass("active");
		console.log("active");

		const classActiveSakip = $(".komponen-sakip").hasClass("active");
		const classActivePengaturan = $(".list-pengaturan").hasClass("active");
		if (
			classActiveSakip &&
			$(".dropdown.bagian-komponen-sakip").is(":hidden")
		) {
			/* 1. FOR KASE TURUN DEPE DROPDOWN */
			$(".dropdown.bagian-komponen-sakip").slideDown("fast");
			/* 2. FOR UBAH ICON UP JADI DOWN */
			$(".panah-sakip", this).toggleClass("fa-chevron-down fa-chevron-up");
			console.log("komponen slidedown sakip");
		} else {
			/* 1. FOR KASE NAE DEPE DROPDOWN */
			$(".dropdown.bagian-komponen-sakip").slideUp("fast");
			/* 2. FOR UBAH ICON DOWN JADI UP*/
			$(".panah-sakip", this).toggleClass("fa-chevron-down fa-chevron-up");
			console.log("komponen slide up sakip");
		}

		if (
			classActivePengaturan &&
			$(".dropdown.bagian-pengaturan").is(":hidden")
		) {
			/* 1. FOR KASE TURUN DEPE DROPDOWN */
			$(".dropdown.bagian-pengaturan").slideDown("fast");
			/* 2. FOR UBAH ICON UP JADI DOWN */
			$(".panah-pengaturan", this).toggleClass("fa-chevron-down fa-chevron-up");
			console.log("komponen slidedown pengaturan");

		} else {
			/* 1. FOR KASE NAE  DPE DROPDOWN*/
			$(".dropdown.bagian-pengaturan").slideUp("fast");
			/* 2. FOR UBAH ICON DOWN JADI UP */
			$(".panah-pengaturan", this).toggleClass("fa-chevron-down fa-chevron-up");
			console.log("komponen slideup pengaturan");
		}

		// INI KALO MENU LAIN PUNYA CLASS ACTIVE, MAKA YANG DROPDOWN ADA TABUKA, DIA OTOMATIS TTTUP
		if ($(".komponen-sakip").siblings().hasClass("active")) {
			$(".panah-sakip").toggleClass("fa-chevron-up");
			$(".bagian-komponen-sakip .komponen").removeClass("active");
			console.log("nda aktif sakip");
		}
		if ($(".list-pengaturan").siblings().hasClass("active")) {
			$(".panah-pengaturan").toggleClass("fa-chevron-up");
			// $(".bagian-pengaturan .pengaturan").removeClass("active");
			console.log("nda aktif pengaturan");
		}

		// INI KALO DI DALAM

		// $(".panah-sakip").toggleClass("fa-chevron-down");
		// console.log("cek");
	});

	/* 2. INI KALO USER PILIH SALAH SATU SUBMENU DI MENU KOMPONEN SAKIP/PENGATURAN SIDEBAR OPEN*/
	$("ul .komponen, ul .pengaturan").click(function () {
		$(this).addClass("active").siblings().removeClass("active");
		if ($(".sidebar .dropdown.bagian-komponen-sakip li").hasClass("active")) {
			console.log("dropdown tutup");
			$(
				".dropdown.bagian-komponen-sakip, .dropdown.bagian-komponen-sakip.side-close"
			).slideUp(700);
			$(".panah-sakip").removeClass("fa-chevron-up");
		}

		if ($(".sidebar .dropdown.bagian-pengaturan li").hasClass("active")) {
			console.log("dropdown tutup pengaturan");
			$(
				".dropdown.bagian-pengaturan, .dropdown.bagian-pengaturan.side-close"
			).slideUp(700);
			$('.panah-pengaturan').removeClass("fa-chevron-up");
		}
		console.log("halo slide");
	});

	/* INI KALO USER CLICK SALAH SATU SUBMENU DI MENU KOMPONEN SAKIP/PENGATURAN SIDEBAR OPEN*/
	$(".ul ");
	/* --USER CLICK MENU KOMPONEN SAKIP  */
	// $(".komponen-sakip").click(function () {
	// 	if ($(".dropdown.bagian-komponen-sakip").is(":hidden")) {
	// 		$(".dropdown.bagian-komponen-sakip").slideDown("slow");
	// 		/* 2. FOR UBAH ICON UP JADI DOWN DAN SEBALIKNYA */
	// 		$(".panah", this).toggleClass("fa-chevron-down");
	// 		console.log("komponen");
	// 		// KALO DROPDOWN KOMPONEN SAKIP ADA TATUTUP KONG TORANG CLIC
	// 	} else {
	// 		$(".panah", this).toggleClass("fa-chevron-down");
	// 		$(".dropdown.bagian-komponen-sakip").slideUp("slow");
	// 		console.log("sakip visible");
	// 	}
	// });
	/* USER CLICK MENU PENGATURAN */
	// $(".list-pengaturan").click(function () {
	// 	$(".dropdown.bagian-pengaturan").toggle();
	// 	$(".panah", this).toggleClass("fa-chevron-down");
	// 	console.log("poengaturan");
	// });

	// /* USER CLICK MENU KOMPONEN SAKIP SAAT SIDEBAR CLOSE */
	// // $(".sidebar").hasClass("close")(function () {
	// // 	console.log("hasclose");
	// // });
	/* KETIKA SIDBEAR DI CLICK MAKA TAMBAH CLASS DI DROPDOWNN DENGAN NAMA side-close */
	/* DEPE FUNGSI FOR PENANDA KALO ITU DROP DOWN SO ADA DALAM KONDISI SIDEBAR CLOSE */
	$(".sidebar-content").click(function () {
		$(".dropdown.bagian-komponen-sakip, .dropdown.bagian-pengaturan").addClass(
			"side-close"
		);
		console.log("close");
	});

	// $(".dropdown.bagian-komponen-sakip.side-close .komponen").click(function () {
	// 	if ($(".komponen").hasClass("active")) {
	// 		$(".dropdown.bagian-komponen-sakip").slideUp("slow");
	// 	}
	// 	console.log("side-close slideup");
	// });
	$(".list-pengaturan").click(function () {
		// KALO DROPDOWN PENGATURAN ADA TABUKA KONG TORANG D KLIK MENU, TORANG TOGGLE ULANG SPYA TTTUP
	});
});

/* JQUERY END */
