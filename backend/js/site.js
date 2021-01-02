$(function(){
    'use strict';
    $('#upload-file').change(ev=>{
        $(ev.target).closest('form').trigger('submit');
    })
});