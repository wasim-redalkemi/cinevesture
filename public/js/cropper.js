    croperImg = document.querySelector('.croperImg'),

    function validateSize(input) {
        const fileSize = input.files[0].size / 1024 / 1024; // in MiB
        if (fileSize > 10) {
            alert('The document may not be greater than 10 MB');
            $('#documents').val(''); //for clearing with Jquery
        }
    }
    let result = document.querySelector('.result'),

    formData = new FormData()
    var base64data = null;
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".imgInp", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                formData.append("document", file)
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
    });

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

    function dataURLtoFile(dataurl, filename) {
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
                var file = dataURLtoFile(base64data, 'profile_img.png');
                $("#previewImg").attr("src",base64data).show();
                formData.append("document", file)

                $modal.modal('hide');
            }
        });
    })

    $('#close-cropper').on('click', function() {
        $modal.modal('hide');
    })
    $('#chechbox').on('click', function() {
        $modal.modal('hide');
    })


    $('#crop-cancel').on('click', function() {
        $modal.modal('hide');
    })
