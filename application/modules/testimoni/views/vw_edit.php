<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
    </div>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" id="form-edit" enctype="multipart/form-data" method="POST">
                                <input type="hidden" name="uuid" id="uuid" value="<?= $data['uuid'] ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nama</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Nama" id="first-name-icon" name="name" required value="<?= $data['name'] ?>">
                                                            <div class="form-control-icon">
                                                                <i data-feather="user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Title</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Gelar" id="first-name-icon" name="title" required value="<?= $data['title'] ?>">
                                                            <div class="form-control-icon">
                                                                <i data-feather="feather"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Deskripsi</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description"><?= $data['description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Foto</label>
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
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="true" id="defaultCheck1" name="default_images">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Default images
                                                        </label>
                                                    </div>
                                                    <img src="<?= ASSETS_URL ?>uploads/testimoni/<?= $data['images'] ?>" alt="" width="70px" class="img-bordered mb-2">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Rating</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" min="1" max="10" placeholder="Rating" id="first-name-icon" name="rating" value="<?= $data['rating'] ?>" required>
                                                            <div class="form-control-icon">
                                                                <i data-feather="feather"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            url: '<?= base_url() ?>testimoni/submit_edit',
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