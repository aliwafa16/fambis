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
                            <form class="form form-horizontal" id="form-tambah" enctype="multipart/form-data" method="POST">
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
                                                            <input type="text" class="form-control" placeholder="Nama" id="first-name-icon" name="name" required>
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
                                                            <input type="text" class="form-control" placeholder="Gelar" id="first-name-icon" name="title" required>
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
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description"></textarea>
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Instagram</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">https://www.instagram.com/</span>
                                                        <input type="text" class="form-control" placeholder="familiybusiness" aria-label="Username" aria-describedby="basic-addon1" name="instagram">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Facebook</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">https://www.facebook.com/</span>
                                                        <input type="text" class="form-control" placeholder="familiybusiness" aria-label="Username" aria-describedby="basic-addon1" name="facebook">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Linkedin</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">https://www.linkedin.com/</span>
                                                        <input type="text" class="form-control" placeholder="familiybusiness" aria-label="Username" aria-describedby="basic-addon1" name="linkedin">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>X</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">https://twitter.com/</span>
                                                        <input type="text" class="form-control" placeholder="familiybusiness" aria-label="Username" aria-describedby="basic-addon1" name="twitter">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Website</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="https://www.familybusiness.com/" id="first-name-icon" name="website" required>
                                                            <div class="form-control-icon">
                                                                <i data-feather="globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end ">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
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
    $("#form-tambah").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData($('#form-tambah')[0])
        $.ajax({
            url: '<?= base_url() ?>teams/submit_add',
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