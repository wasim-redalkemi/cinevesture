var ImageCropper = function(fileToCrop,previewElem){
    var file = fileToCrop;
    var filename = fileToCrop.name;
    var base64data = null;
    var $modal = $('#ImageCropperModal');
    var image = $('#ImageCropperModal #image')[0];
    var CroppedImgformData = new FormData();
    var cropper;
    var aspectRatio = 1/1;
    var cropboxData = {
        width: 300*2,
        height: 300*2
    }

    var afterCrop = null;
    //var previewElem = thumbnailElem;

    let setAfterCrop = function(callbackFun){
        afterCrop = callbackFun;
    }

    let done = function(url) {
        image.src = url;
        $modal.modal('show');
    };

    let setAspectRatio = function(ratio){
        aspectRatio = ratio
    }

    let setCropBoxSize = function(size){
        cropboxData = size;
    }

    let getCropBoxSize = function(){
        return cropboxData;
    }

    let init = function(){

        bindEvents();

        if (file) {
            var fileType = file["type"];
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                CroppedImgformData.append("document", file)
            } else {
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }

        }
    }

    let dataURLtoFile = function(dataurl, filename) {
        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            bstr = atob(arr[1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);
    
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
    
        return new File([u8arr], filename, {
            type: mime
        });
    }

    let getCropperFile = function(){
        return dataURLtoFile(base64data, filename);
    }

    let bindEvents = function(){
        $modal.off('shown.bs.modal').on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                dragMode: 'move',
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                data:cropboxData,
                aspectRatio: aspectRatio,
                viewMode:1
            });
        }).off('hidden.bs.modal').on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").off("click").on("click",function() {
            canvas = cropper.getCroppedCanvas({
                width: 1800,
                height: 600,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    base64data = reader.result;
                    var file = dataURLtoFile(base64data, filename);
                    if(previewElem)
                        $(previewElem).attr("src",base64data).show();

                    CroppedImgformData.append("document", file);
                    $modal.modal('hide');
                }
            });
            if(afterCrop)
                afterCrop();
        });

        $('#close-cropper').off('click').on('click', function() {
            $modal.modal('hide');
        });
        
        $('#chechbox').off('click').on('click', function() {
            $modal.modal('hide');
        });
        
        $('#crop-cancel').off('click').on('click', function() {
            $modal.modal('hide');
        });
    }

    return {init,getCropperFile,setCropBoxSize,getCropBoxSize,setAfterCrop,setAspectRatio};

}

function validateSize(input) {
    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
    if (fileSize > 10) {
        alert('The document may not be greater than 10 MB');
        $('#documents').val(''); //for clearing with Jquery
    }
}
