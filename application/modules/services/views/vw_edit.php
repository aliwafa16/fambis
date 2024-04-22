<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
    </div>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" id="form-edit" enctype="multipart/form-data" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Services</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <input type="hidden" name="uuid" id="uuid" value="<?= $data['uuid'] ?>">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Category Blog" id="first-name-icon" name="services" required value="<?= $data['services'] ?>">
                                                    <div class="form-control-icon">
                                                        <i data-feather="grid"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Banner</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="file" class="form-control" placeholder="Foto profile" id="first-name-icon" name="images">
                                                    <div class="form-control-icon">
                                                        <i data-feather="image"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="<?= base_url('assets/uploads/') ?>services_images/<?= $data['img'] ?>" alt="" width="100px" class="mb-2">
                                        <div class="form-group">
                                            <textarea class="form-control" id="body" rows="4" name="description" placeholder="deskripsi"><?= $data['description'] ?></textarea>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $("#form-edit").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData($('#form-edit')[0])
        $.ajax({
            url: '<?= base_url() ?>services/submit_edit',
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
</script>