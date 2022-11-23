<!-- Accept Modal Start Here-->
<div id="cropModal" class="modal" role="dialog">
    <div class="modal-dialog modal_style">
        <button type="button" class="btn btn-default close closeCropModal" data-dismiss="modal">x</button>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image" style="width:250px; margin-top:20px"></div>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">
                <button class="btn_s crop_image">Crop Image</button>
            </div>
        </div>
    </div>
</div>

<link href="<?php echo e(asset('assets/css/croppie.css')); ?>" rel="stylesheet" />
<script src="<?php echo e(asset('assets/js/croppie.js')); ?>"></script>

<style>
    .croppie-container {
        width: 100% !important;
        height: 100%;
    }
</style>
<script>
    $(document).ready(function() {

        let viewportWidth = 300;
        let viewportHeight = 300;
        let boundaryWidth = 300;
        let boundaryHeight = 300;

        $image_crop = $('#image').croppie({
            enableExif: true,
            viewport: {
                width: viewportWidth,
                height: viewportHeight,
                type: 'circle' //circle  square
            },
            boundary: {
                width: boundaryWidth,
                height: boundaryHeight
            }
        });

        $('#upload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                    console.log('jsn herer');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#cropModal').modal('show');
        });



        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                
               // alert(response);
            //    var data = btoa(response);
            //    console.log(data, "hello")
                $('#cropModal').modal('hide');
                $('#uploaded img').attr('src', response);
                $('#upload-img').attr('value', response);


            })
        });


        $('.closeCropModal').click(function(event) {
            $('#cropModal').modal('hide');
        });


    });
</script><?php /**PATH /var/www/html/projects/Amandeep Projects/working project/cleaner/cleaner/resources/views/layouts/common/cropper.blade.php ENDPATH**/ ?>