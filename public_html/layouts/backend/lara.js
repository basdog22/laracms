$(document).ready(function () {
    $(document).on('click', '.modal-link', function (e) {
        e.preventDefault();
        $("#laraModal .modal-body").load($(this).attr('href'));
        $("#laraModal").modal();
        return false;
    });

    $('#laraModal').on('show.bs.modal', function () {
        var modalBody = $(this).find('.modal-body');
        var modalDialog = $(this).find('.modal-dialog');

        $(this).find('.modal-dialog').css('width', 700);
    });


    $('#laraModal').on('hidden.bs.modal', function () {
        $('#laraModal .modal-body').html('');
    });

    $(document).on('click','.delbtn',function(e){

        var a = window.confirm('Delete?');
        if(a){
            return true;
        }
        e.preventDefault();
        return false;
    });
});

function FileUploadAddons(){
    $('#bootstrapped-fine-uploader').fineUploader({
        template: 'qq-template-bootstrap',
        classes: {
            success: 'alert alert-success',
            fail: 'alert alert-error'
        },
        thumbnails: {
            placeholders: {
                waitingPath: "assets/waiting-generic.png",
                notAvailablePath: "assets/not_available-generic.png"
            }
        },
        request: {
            endpoint: '/uploads/handleaddons'
        },
        validation: {
            allowedExtensions: ['zip']
        }
    });
}

function FileUploadThemes(){
    $('#bootstrapped-fine-uploader').fineUploader({
        template: 'qq-template-bootstrap',
        classes: {
            success: 'alert alert-success',
            fail: 'alert alert-error'
        },
        thumbnails: {
            placeholders: {
                waitingPath: "assets/waiting-generic.png",
                notAvailablePath: "assets/not_available-generic.png"
            }
        },
        request: {
            endpoint: '/uploads/handlethemes'
        },
        validation: {
            allowedExtensions: ['zip']
        }
    });
}

function LoadFineUploader(callback){
    if (!$.fn.fineuploader){
        $.getScript('/layouts/backend/plugins/fineuploader/jquery.fineuploader-5.0.1.min.js', callback);
    }
    else {
        if (callback && typeof(callback) === "function") {
            callback();
        }
    }
}

function SetMinBlockHeight(elem){
    elem.css('min-height', window.innerHeight - 50)
}