/**
 * Created by Noureddine on 16/06/2017.
 */

$(function () {
    'use strict';



    $('#btn-save-user').on('click',function () {
        var form = $('.form-user');
        $.ajax({
            type:"POST",
            url:"/hopital/doctor/ajax",
            data:(form).serialize(),
            dataType:"json",
            beforeSend:function () {
                $('#btn-save-user').html('wait...');
            },
            success:function (json) {
                $('#btn-save-user').html('save');
                alert(json.repense);
            },
            error:function () {
                alert("error");
                $('#btn-save-user').html('save');
            }

        });
    });

});