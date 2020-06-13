$(document).on("click", ".edit", function () {
	var kode	     = $(this).data('kode');
	var nama         = $(this).data('nama');

	$(".modal-body #kode").val( kode );
	$(".modal-body #nama").val( nama );
});