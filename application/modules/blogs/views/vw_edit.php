<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
                                <input type="hidden" name="uuid" value="<?= $data['uuid'] ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="category_id" name="category_id">
                                                            <?php foreach ($category as $key) : ?>
                                                                <option value="<?= $key['id'] ?>" <?= ($key['id'] == $data['category_id']) ? 'selected' : '' ?>><?= $key['category'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Authors</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="choices form-select" id="author_id" name="author_id">
                                                            <?php foreach ($authors as $key) : ?>
                                                                <option value="<?= $key['id'] ?>" <?= ($key['id'] == $data['author_id']) ? 'selected' : '' ?>><?= $key['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tags</label>
                                                </div>
                                                <?php $array = json_decode($data['tags'],true) ?>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <select class="choices form-select multiple-remove" multiple="multiple" name="tags[]">
                                                                <?php foreach ($tags as $key) : ?>
                                                                    <?php foreach ($array as $keyy => $value) :?>
                                                                        <option value="<?= $key['tags'] ?>" <?= ($key['tags'] == $value) ? 'selected' : '' ?>><?= $key['tags'] ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
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
                                                <img src="<?= base_url('assets/uploads/banner_blogs/') . $data['banner'] ?>" alt="" width="250px" class="mb-2">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="form-control" id="exampleFormControlSelect1" name="is_active">
                                                            <option value="0" <?= ($data['is_active']) ? 'selected' : '' ?>>Draft</option>
                                                            <option value="1" <?= ($data['is_active']) ? 'selected' : '' ?>>Published</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="title" id="first-name-icon" name="title" required value="<?= $data['title'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="body" rows="6" name="description">
                                                    <?= $data['body'] ?>
                                                </textarea>
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
    CKEDITOR.replace('body', {
        height: '800px',
        filebrowserUploadUrl: '<?php echo base_url("blogs/upload_blogs"); ?>',
        on: {
            loaded: function() {
                ajaxRequest();
            }
        } // Tentukan URL untuk meng-upload gambar
    });


    function ajaxRequest() {
        $("#form-edit").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData($('#form-edit')[0])
            $.ajax({
                url: '<?= base_url() ?>blogs/submit_edit',
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