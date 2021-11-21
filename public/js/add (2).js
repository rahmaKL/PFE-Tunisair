$('#confirm-delete').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});

$('#confirm-send').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Send URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});

$('#confirm-valider').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Valider URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});
$('#confirm-refuser').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Refuser URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});
$('#confirm-demarrer').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Demarrer URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});
$('#confirm-cloturer').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Cloture URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});