$('.confirm-delete').on('click', function (e) {
    e.preventDefault();

    $('#deleting-item-name').html($(this).data('item'));
    $('#delete-confirmed').data('form-id', $(this).data('form-id'));
    $('#confirm-delete-modal').modal('show');
});

$('#cancel-delete').on('click', function (e) {
    e.preventDefault();

    $('#confirm-delete-modal').modal('hide');
});

$('#delete-confirmed').on('click', function (e) {
    e.preventDefault();

    $('#' + $(this).data('form-id')).submit();
})
