var ImageCropper = function(){

    var base64data = null;
    var $modal = $('#ImageCropperModal');
    //var image = $('#ImageCropperModal #image');
    var image = $('#ImageCropperModal #image')[0];
    var CroppedImgformData = new FormData();
    var cropper;
    let done = function(url) {
        console.log("in done");
        image.src = url;
        $modal.modal('show');
    };

    let init = function(file){
        bindEvents();
        console.log("in init ");
        var reader;
        var url;

        if (file) {
            var fileType = file["type"];
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                CroppedImgformData.append("document", file)
            } else {
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
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
        return dataURLtoFile(base64data, 'profile_img.png');
    }

    let bindEvents = function(){

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                dragMode: 'move',
                autoCropArea: 0.65,
                restore: false,
                guides: false,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                data:{ //define cropbox size
                width: 285,
                height:  194,
                },
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 285,
                height: 194,
            });
        
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    base64data = reader.result;
                    console.log("base64data = ",base64data);
                    var file = dataURLtoFile(base64data, 'profile_img.png');
                    $("#previewImg").attr("src",base64data).show();
                    CroppedImgformData.append("document", file);
                    $modal.modal('hide');
                }
            });
        });

        $('#close-cropper').on('click', function() {
            $modal.modal('hide');
        });
        
        $('#chechbox').on('click', function() {
            $modal.modal('hide');
        });
        
        $('#crop-cancel').on('click', function() {
            $modal.modal('hide');
        });
    }

    return {init,getCropperFile};
}();

// var $modal = $('#ImageCropperModal');

// var cropImageElem = $('#ImageCropperModal #image');

// var croperImg = document.querySelector('.croperImg');

function validateSize(input) {
    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
    if (fileSize > 10) {
        alert('The document may not be greater than 10 MB');
        $('#documents').val(''); //for clearing with Jquery
    }
}

//let result = document.querySelector('.result');