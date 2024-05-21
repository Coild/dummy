$(document).ready(function () {
	/*ABIS ITU TORANG DEKLARASI INISIALISASI 3 VARIABLE. VARIABLE PERTAMA FOR SIMPAN NOMOR PAGE, VARIABLE KEDUA FOR SIMPAN BANYAKNYA DATA YANG MO DITAMPILKAN, VARIABLE KETIGA FOR SIMPAN TOTAL DATA DALAM DATABASE */
	/* TORANG KASE NILAI DEFAULT DULU */
	var halaman_sekarang = 1;
	var banyaknya_data_per_halaman = 5;
	console.log(total_data)
	/* ABIS ITU TORANG BEKING VARIABLE FOR HITUNG TOTAL HALAMAN YANG BISA DIBAGIKAN UNTUK SEMUA DATA */
	var total_halaman = Math.ceil(total_data / banyaknya_data_per_halaman);

	/* DISINI TORANG BEKING FUNGSI FOR TAMPILKAN BUTTON PAGINATION KE TABLE */
	$.fn.tampilkanButtonPagination = function () {
		// torang beking dulu html yang mo kase selip di bagian  div button-pagination
		var html_pagination_button =
			// ini button sebelumnya
			// kalo click, torang pangge fungsi for pindah ke halaman sebelumnya
			'<a class"btn-sebelumnya" onclick = "javascript: $.fn.pindah_halaman_sebelumnya()"><i class="fa-solid fa-angle-left"></i></a>';

		// abis itu torang beking variable for kase active button penanda yang di click user ato yang sementara tampil
		var status_penanda_halaman = '';
		// terus torang mo beking button berdasarkan halaman, jadi pas user click angka 2 misal maka mo tapindah di halaman 2
		// maka torang perlu looping berdasarkan jumlah data dengan halaman
		for (var halaman = halaman_sekarang; halaman <= total_halaman; halaman++) {
			// abis itu torang mo kase class active ke halaman yang dipilih
			// pertama kase nilai default dulu ke halaman 1, karena torang mo landing pertama kan di halaman 1
			if (halaman == 1) {
				status_penanda_halaman = 'active';
				// abis itu torang kase nonaktif itu button previous
				$('.button-pagination .btn-sebelumnya').hide()

			}
			// depe sisa torang kase kosong dulu
			else {
				status_penanda_halaman = '';
			}

			// abis itu torang kase fungsi ketika di klik penanda halaman, maka halaman yang diklik itu mo aktif(status pun berubah). torang perlu kirim argumen ke fungsi pindah halaman
			html_pagination_button =
				html_pagination_button + '<a id="index' + halaman + '" class="penanda-halaman ' + status_penanda_halaman + ' " onClick="javascript: $.fn.pindah_penanda_halaman(' + halaman + ')">' + halaman + "</a>";
		}
		// ini button next
		html_pagination_button =
			html_pagination_button +
			'<a class="btn-selanjutnya" onclick = "javascript: $.fn.pindah_halaman_selanjutnya()"><i class="fa-solid fa-angle-right"></i></a>';
		// html_pagination_button = html_pagination_button + '<a class'

		$('.button-pagination').text('')
		$('.button-pagination').append(html_pagination_button)
		// $(".button-pagination").html(html_pagination_button);
		// $.fn.hide_show_btn(halaman);
		/*ABIS ITU TORANG HAPUS BAGIAN BODY YANG DEFAULT */
		$(".table-dashboard tbody tr").remove();
		/*KONG TORANG SELIP YANG TORANG D BEKING */
		$(".table-dashboard tbody").append(selip_html);
	};

	// $.fn.tampilkanTable = function () {
	// 	// data mulai diambil ditandakan dengan index untuk masing-masing data. jadi dimulai dari indeks 0
	// 	// misal index[0] = data1, dst.
	// 	var data_pertama_per_page = (halaman_sekarang - 1) * banyaknya_data_per_halaman;
	// 	var data_terakhir_per_page = (banyaknya_data_per_halaman - 1) + data_pertama_per_page;
	// 	// terus torang beking kondisi, kalo misal dpe data terakhir itu so melebihi dari total data, maka torang ambe nilai yang data terakhir. karena klo torang ambe yang sesuai rumus, maka torang mo dpa data yang lebe dari total data kalo so di halaman terakhir.
	// 	data_terakhir_per_page = data_terakhir_per_page >= total_data ? total_data - 1 : data_terakhir_per_page;
	// 	//abis itu torang beking variable for tampung data yang torang mo tampilkna
	// 	var html_data_table = '';
	// 	for (var data = data_pertama_per_page; data <= data_terakhir_per_page; data++) {
	// 		console.log('banyaknya data per halaman: ', banyaknya_data_per_halaman)
	// 		console.log('data pertama per page ', data_pertama_per_page)
	// 		console.log('data terakhir per page ', data_terakhir_per_page)
	// 		html_data_table = html_data_table + '<tr>' + '<td>' + tabledashboard[data].nomor + '</td>' + '<td>' + tabledashboard[data].opd + '</td>'
	// 			+ '<td>' + tabledashboard[data].rpjmd + '</td>'
	// 			+ '<td>' + tabledashboard[data].renstra + '</td>'
	// 			+ '<td>' + tabledashboard[data].iku + '</td>'
	// 			+ '<td>' + tabledashboard[data].renja + '</td>'
	// 			+ '<td>' + tabledashboard[data].pk + '</td>'
	// 			+ '<td>' + tabledashboard[data].renaksi + '</td>'
	// 			+ '<td>' + tabledashboard[data].laporan_kinerja + '</td>'
	// 			+ '<td>' + tabledashboard[data].lainnya + '</td>'
	// 			+ '</tr>'
	// 		console.log('data ', data)
	// 		console.log('data nomor', tabledashboard[data].nomor)
	// 		console.log('halaman ', halaman_sekarang)
	// 	}
	// 	$('.table-dashboard tbody tr').remove() // torang kase kosong dulu
	// 	// abis itu torang kase selip tu html yang torang so beking ke body dari table
	// 	$('.table-dashboard tbody').html(html_data_table)
	// 	// $.fn.tampilkanButtonPagination()
	// }

	/* BERIKUT DAFTAR FUNGSI FOR PAGINATION */
	$.fn.hide_show_btn = function (halaman) {
		if (halaman == 1) {
			$('.btn-sebelumnya').hide()
			console.log('status hide')
		}
	}
	$.fn.pindah_penanda_halaman = function (halaman) {
		// $('.penanda-halaman').removeClass('active')
		$('#index' + halaman).addClass('active').siblings().removeClass('active');
		console.log('pindah halaman')
		halaman_sekarang = parseInt(halaman);
		console.log('halaman penanda ', halaman_sekarang)
		// $.fn.tampilkanTable()
	}

	$.fn.pindah_halaman_sebelumnya = function () {
		if (halaman_sekarang != 1) {
			halaman_sekarang--;
			console.log('sebelumnya:', halaman_sekarang)
			$.fn.pindah_penanda_halaman(halaman_sekarang);
		}
		else {
			$('.button-pagination .btn-sebelumnya').hide()
		}
	}

	$.fn.pindah_halaman_selanjutnya = function () {
		if (halaman_sekarang != total_halaman) {
			halaman_sekarang++;
			$.fn.pindah_penanda_halaman(halaman_sekarang);
			console.log('selanjutnya:', halaman_sekarang)

		}
		else {
			console.log('selanjutnya nda jadi')
		}
	}


	// ini kalo itu dropdown lihat banyaknya data berubah, maka jalankan script berikut
	$('.banyaknya-data').change(function () {
		alert('data berubah')
		// torang ambe dpe nilai banyaknya data yang dipilih dari option
		var value = $(this).val()
		console.log(value);
		halaman_sekarang = 1;
		// abis itu torang update jumlah data yang torang mo kase tampil, mar torang ubah dulu depe nilai, soalnya dpe nilai itu berupa string. ubah ke int
		banyaknya_data_per_halaman = parseInt(value);
		// abis itu torang update lagi total halaman yang mo ditampilkan, soalnya kalo dpe jumlah data yang ditampilkan berubah, itu berarti dpe total halaman le mo berubah. misal: total_data = 100, kong banyaknya_data_per_halaman = 20, maka total_halaman yang mo dapa itu ada 5. beda lagi dpe kasus kalo  banyaknya_data_per_halaman = 25
		total_halaman = Math.ceil(total_data / banyaknya_data_per_halaman);
		console.log('total data ', total_data)
		console.log('total halaman ', total_halaman)
	})

	// $.fn.tampilkanButtonPagination();
	// $.fn.tampilkanTable()

	// 	// abis itu torang tampilkan deh
	// 	// $.fn.tampilkanDataTable();

	// 	/*DISINI TORANG MO BEKING DPE BUTTON FOR PAGINATION SUPAYA SINKRON DENGAN TABLE */

	// 	/*BERIKUT INI TORANG BEKING FUNGSI FOR PINDAH HALAMAN */
});
