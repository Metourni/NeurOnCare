/**
 * Created by Noureddine on 16/06/2017.
 */

$(function () {
    'use strict';

    /*
     var first_name = $('#first_name');
     var last_name = $('#last_name');
     var email = $('#email');
     var mobil = $('#mobil');
     var address = $('#address');
     var home_phone = $('#home_phone');
     */
    var change = false;

    $('.form-control').on('change', function () {
        $('#btn-save-user').prop('disabled', false);
    });


    $('#btn-save-user').on('click', function () {
        var form = $('.form-user');
        $.ajax({
            type: "POST",
            url: "/hopital/doctor/ajaxUpdateProfile",
            data: (form).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('#btn-save-user').html('wait...');
            },
            success: function (json) {

                if (json.repense == "OK") {
                    $('#btn-save-user').html('save');
                    $('#btn-save-user').prop('disabled', false);
                } else {
                    $('#btn-save-user').html('try again');
                    $('#btn-save-user').prop('disabled', true);
                }

                alert(json.repense);
            },
            error: function () {
                alert("error");
                $('#btn-save-user').html('save');
                $('#btn-save-user').prop('disabled', true);
            }

        });
    });

});