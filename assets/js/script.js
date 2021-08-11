$(document).ready(function () {
	//TOAST ALERT
	const flashdata = $(".flashdata").data("flashdata");
	const type = $(".flashdata").data("type");
	if (flashdata) {
		$.toast({
			text: flashdata,
			showHideTransition: 'slide',
			icon: type,
			position: 'top-right'
		})
	}

	$('.get-student').select2({
		placeholder: 'Cari nama mahasiswa'
	});

	$('.get-academicyear').select2({
		placeholder: 'Pilih tahun akademik'
	});

	/* Student Start */

	function alertCustom(text, icon) {
		$.toast({
			text: text,
			showHideTransition: 'slide',
			icon: icon,
			position: 'top-right'
		})
	}

	$('.modalLogId').on('click', function () {
		let logId = $(this).data('log');
		$('#modalLogIdLabel').html(`Daily Log ID ${logId}`);
		$.ajax({
			url: `${base_url}mahasiswa/daily/log/detail`,
			dataType: 'JSON',
			method: 'POST',
			data: {
				logId: logId
			},
			success: (data) => {
				if (data.status === 'ok') {
					$('.logIdResult').html(data.data);
				} else {
					alertCustom('Server sedang sibuk', 'warning');
				}
			}
		})
	});

	$('.modalLogIdAll').on('click', function () {
		let logId = $(this).data('log');
		let role = $(this).data('role');
		let menu = $(this).data('menu');
		$('#modalLogIdLabelAll').html(`Detail ${logId}`);
		$.ajax({
			url: `${base_url}${role.toString().toLowerCase()}/${menu}`,
			dataType: 'JSON',
			method: 'POST',
			data: {
				logId: logId
			},
			success: (data) => {
				if (data.status === 'ok') {
					$('.logIdResultAll').html(data.data);
				} else {
					alertCustom('Server sedang sibuk', 'warning');
				}
			}
		})
	});

	$('.view-video').on('click', function () {
		let logId = $(this).data('log');
		let role = $(this).data('role');
		let menu = $(this).data('menu');
		$('#view-video-label').html(`Detail ${logId}`);
		$.ajax({
			url: `${base_url}${role.toString().toLowerCase()}/${menu}`,
			dataType: 'JSON',
			method: 'POST',
			data: {
				logId: logId
			},
			success: (data) => {
				if (data.status === 'ok') {
					$('.videoResult').html(data.data);
				} else {
					alertCustom('Server sedang sibuk', 'warning');
				}
			}
		})
	});

	// check point
	$(".attendance").change(function () {
		$("#time_in, #time_out").hide()
		if ($(this).val() == "H") {
			$("#time_in, #time_out").show();
			$("#note").hide();
		} else {
			$("#time_in, #time_out").hide();
			$("#note").show();
		}
	});

	// Reload page when get academic year id
	$("#academicyear").on("change", function () {
		var id = $(this).val();
		var menu = $(this).data("menu");
		document.location.href = `${base_url}dosen/${menu}/academic_year/${id}`
	});

	$("#academicyear").select2({
		ajax: {
			url: `${base_url}lecture_config/getAcademicYear`,
			type: "GET",
			dataType: 'JSON',
			delay: 250,
			data: function (params) {
				return {
					searchTerm: params.term
				};
			},
			processResults: function (response) {
				return {
					results: response
				};
			},
			cache: true
		}
	});

	$(".assesment").on('click', function () {
		allertError('isi laporan supervisi terlebih dahulu');
	});

	allertError = (text) => {
		Swal.fire({
			icon: 'error',
			title: 'Maaf...',
			text: `Menu ini belum bisa di akses, silahkan ${text}.`
		});
	}

	$(".verified").on('click', function () {
		var groupId = $(this).data("groupid");
		var url = `${base_url}dosen/report_supervision/pushed/${groupId}/`
		verification(url)
	});

	function verification(url) {
		Swal.fire({
			text: "Anda yakin ingin memverifikasi ini?",
			icon: 'info',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Verifikasi',
			cancelButtonText: 'Tolak',
			allowOutsideClick: false,
			allowEscapeKey: false
		}).then((result) => {
			var href = "";
			if (result.isConfirmed) {
				href = `${url}1`
			} else {
				href = `${url}0`
			}
			document.location.href = href;
		})
	}

	// get planning
	function select2WithCreation(route, text) {
		$('.get-' + route + '').select2({
			placeholder: text,
			ajax: {
				url: `${base_url}mahasiswa/config/get${route}`,
				dataType: 'JSON',
				type: 'POST',
				data: function (params) {
					return {
						search: params.term
					}
				},
				processResults: function (data) {
					return {
						results: data
					}
				},
				cache: true
			},
			tags: true,
		})
	}
	select2WithCreation('capaian', 'Cari capaian pembelajaran');

	// Penialain Dosen :
	startCalc = () => {
		interval = setInterval("supevisi()", 1);
		interval2 = setInterval("guidanceD3()", 1);
		interval3 = setInterval("guidanceD4()", 1);
		interval4 = setInterval("testScore()", 1);
		interval5 = setInterval("supervisorScore()", 1);
	}

	supevisi = () => {
		a = document.supervisiForm.nilai_1.value;
		b = document.supervisiForm.nilai_2.value;
		c = document.supervisiForm.nilai_3.value;
		d = document.supervisiForm.jumlah_1.value = (a * 1) * (0.4 * 1);
		e = document.supervisiForm.jumlah_2.value = (b * 1) * (0.4 * 1);
		f = document.supervisiForm.jumlah_3.value = (c * 1) * (0.2 * 1);
		document.supervisiForm.total.value = (d * 1) + (e * 1) + (f * 1);
	}

	guidanceD4 = () => {
		a = document.guidanceFormD4.nilai_1.value;
		b = document.guidanceFormD4.nilai_2.value;
		c = document.guidanceFormD4.nilai_3.value;
		d = document.guidanceFormD4.nilai_4.value;
		e = document.guidanceFormD4.jumlah_1.value = (a * 1) * (0.25 * 1);
		f = document.guidanceFormD4.jumlah_2.value = (b * 1) * (0.30 * 1);
		g = document.guidanceFormD4.jumlah_3.value = (c * 1) * (0.25 * 1);
		h = document.guidanceFormD4.jumlah_4.value = (d * 1) * (0.20 * 1);
		document.guidanceFormD4.total.value = (e * 1) + (f * 1) + (g * 1) + (h * 1);
	}

	testScore = () => {
		a = document.testScore.nilai_1.value;
		b = document.testScore.nilai_2.value;
		c = document.testScore.nilai_3.value;
		e = document.testScore.jumlah_1.value = (a * 1) * (0.35 * 1);
		f = document.testScore.jumlah_2.value = (b * 1) * (0.15 * 1);
		g = document.testScore.jumlah_3.value = (c * 1) * (0.50 * 1);
		document.testScore.total.value = (e * 1) + (f * 1) + (g * 1);
	}

	supervisorScore = () => {
		a = document.supervisorForm.nilai_1.value;
		b = document.supervisorForm.nilai_2.value;
		c = document.supervisorForm.nilai_3.value;
		d = document.supervisorForm.nilai_4.value;
		e = document.supervisorForm.nilai_5.value;
		f = document.supervisorForm.nilai_6.value;
		h = document.supervisorForm.jumlah_1.value = (a * 1) * (0.2 * 1);
		i = document.supervisorForm.jumlah_2.value = (b * 1) * (0.3 * 1);
		j = document.supervisorForm.jumlah_3.value = (c * 1) * (0.2 * 1);
		k = document.supervisorForm.jumlah_4.value = (d * 1) * (0.1 * 1);
		l = document.supervisorForm.jumlah_5.value = (e * 1) * (0.1 * 1);
		m = document.supervisorForm.jumlah_6.value = (f * 1) * (0.1 * 1);
		document.supervisorForm.total.value = (h * 1) + (i * 1) + (j * 1) + (k * 1) + (l * 1) + (m * 1);
	}

	stopCalc = () => {
		clearInterval(interval);
		clearInterval(interval2);
		clearInterval(interval3);
		clearInterval(interval4);
		clearInterval(interval5);
	}

	$('.reception').on('click', function () {
		let myProdiId = $(this).data('id');
		$(".modal-body #prodi_id").val(myProdiId);
	});

	function deleteQuestion(url, text) {
		Swal.fire({
			text: text,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yakin'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = url;
			}
		})
	}

	function buttonClickDelete(route, id) {
		var url = base_url + "supervisor/" + route + "/cancel/" + id;
		deleteQuestion(url, "Yakin akan membatalkan kesediaan menerima di prodi ini ?");
	}

	$(document).on('click', '.delete-reception', function () {
		var id = $(this).data('id');
		buttonClickDelete('report_reception', id);
	});

	checkAll = (ele) => {
		var checkboxes = document.getElementsByTagName('input');
		if (ele.checked) {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = true;
				}
			}
		} else {
			for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i].type == 'checkbox') {
					checkboxes[i].checked = false;
				}
			}
		}
	}
});
