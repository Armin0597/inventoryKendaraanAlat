const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal(
		'Data',
		'Berhasil ' + flashData,
		'success'
	);
}
// tombol-hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href')

	Swal({
		title: 'Anda Yakin?',
		text: "Akan Menghapus Ini!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, hapus data ini!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
