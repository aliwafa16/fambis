<script src="<?= ASSETS_URL ?>ckeditor/ckeditor.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <form action="" id="form-about" enctype="multipart/form-data">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Management About</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" placeholder="Nama website" id="first-name-icon" name="images">
                                <small class="text-danger">.gif, .png, .jpg</small>
                                <img src="<?= base_url('assets/uploads/images/') . $data['images'] ?>" alt="" class="img-fluid mt-2">

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" id="body" rows="6" name="body">
                                    <?= $data['body'] ?>
                                </textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
        </section>
    </form>
</div>
<script>
    CKEDITOR.replace('body', {
        height: '400px',
        filebrowserUploadUrl: '<?php echo base_url("management_about/upload_about"); ?>',
        // extraPlugins: 'easyimage',
        extraAllowedContent: 'img[class]',
        on: {
            instanceReady: function() {
                this.dataProcessor.htmlFilter.addRules({
                    elements: {
                        img: function(el) {
                            if (!el.attributes.class)
                                el.attributes.class = 'img-fluid';
                        }
                    }
                });
            },
            loaded: function() {
                ajaxRequest();
            },
        } // Tentukan URL untuk meng-upload gambar
    });

    function ajaxRequest() {
        $("#form-about").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData($('#form-about')[0])
            $.ajax({
                url: '<?= base_url() ?>management_about/submit_add',
                method: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                data: formData,
                success: function(results) {
                    if (results.code != 200) {
                        errors(results.message)
                    } else {
                        success(results.message)
                        // $('.modal').modal('hide')
                    }
                }
            })
        });
    }
</script>