$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        tittle = me.attr('tittle');

    $('#modal-title').text(title);
    $('#modal-glyphicon-save').removeClass('hide')
    .text(me.hasClass('edit') ? 'Ubah' : 'Simpan');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });
    
    $('modal').modal('show');
});   

$('modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
    url = form.attr('action'),
    method = $('input[name=_method]').val() == undefined

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');
    
    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response){
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            swal({
                type : 'success',
                title : 'Sukses !',
                text : 'Data berhasil disimpan !'
            });
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' +
                        value + '</strong></span>');
                });
            }
        }
    })
});                        