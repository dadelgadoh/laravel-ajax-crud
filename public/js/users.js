jQuery(document).ready(function () {
    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        $('#formModalLabel').text("Crear Usuario");
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });
    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            nombre: jQuery('#nombre').val(),
            usuario: jQuery('#usuario').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var usuario_id = jQuery('#usuario_id').val();
        var ajaxurl = 'usuario';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var user = '<tr id="usuario' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.usuario + '</td>';
                if (state == "add") {
                    jQuery('#usuario-list').append(user);
                } else {
                    jQuery("#usuario" + usuario_id).replaceWith(user);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide');
                location.reload(true);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

});



// edit
$(document).on('click', '.edit-modal', function() {
    $('#formModalLabel').text(" Editar Usuario");
    var id = $(this).data('id');
    var nombre = $(this).attr('data-name');
    var usuario = $(this).attr('data-user');
    $('#nombre').val(nombre);
    $('#usuario').val(usuario);
    $('#formModal').modal('show');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
//     e.preventDefault();
//     var formData = {
//         nombre: jQuery('#nombre').val(),
//         usuario: jQuery('#usuario').val(),
//     };
//     var state = jQuery('#btn-save').val();
//     var type = "POST";
//     var usuario_id = jQuery('#usuario_id').val();
//     var ajaxurl = 'usuario';
//     $.ajax({
//         type: type,
//         url: ajaxurl,
//         data: formData,
//         dataType: 'json',
//         success: function (data) {
//             var user = '<tr id="usuario' + data.id + '"><td>' + data.id + '</td><td>' + data.nombre + '</td><td>' + data.usuario + '</td>';
//             if (state == "add") {
//                 jQuery('#usuario-list').append(user);
//             } else {
//                 jQuery("#usuario" + usuario_id).replaceWith(user);
//             }
//             jQuery('#myForm').trigger("reset");
//             jQuery('#formModal').modal('hide');
//             location.reload(true);
//         },
//         error: function (data) {
//             console.log(data);
//         }
//     });
});

$(document).on('click', '.delete-modal', function() {
// $('.delete-modal').on('click', '.delete', function() {
    var id = $(this).data('id');
    alert("Se va a borrar!: "+id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "usuario/"+id,
        type: 'DELETE',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id
        },
        success: function(data) {
            alert("Se borro!");
            location.reload(true);
            // $('.item' + $('.did').text()).remove();
        }
    });
});