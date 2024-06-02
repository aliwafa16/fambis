<script src="<?= ASSETS_URL ?>ckeditor/ckeditor.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <form id="form-websettings" enctype="multipart/form-data">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Web Settings</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" value="<?= $websettings['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="akronim">Akronim</label>
                                <input type="text" class="form-control" id="akronim" aria-describedby="emailHelp" name="akronim" value="<?= $websettings['akronim'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="link_youtube">Link youtube</label>
                                <input type="text" class="form-control" id="link_youtube" aria-describedby="emailHelp" name="link_youtube" value="<?= $websettings['link_youtube'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banner_hero">Banner</label>
                                <input type="file" class="form-control" id="banner_hero" aria-describedby="emailHelp" name="banner_hero">
                            </div>
                            <img src="<?= base_url('assets/uploads/web_settings/banner/') . $websettings['banner_hero'] ?>" alt="" style="background-color:#EEEEEE; border:1px solid" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control" id="logo" aria-describedby="emailHelp" name="logo">
                            </div>
                            <img src="<?= base_url('assets/uploads/web_settings/logo/') . $websettings['logo'] ?>" alt="" style="background-color:#EEEEEE; border:1px solid" class="img-fluid">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deksripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi"><?= $websettings['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="4" name="alamat"><?= $websettings['alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $websettings['email'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="no_hp">No Hp/Telp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $websettings['no_hp'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $websettings['instagram'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $websettings['facebook'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $websettings['twitter'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="linkedin">Linked in</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= $websettings['linkedin'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deskripsi_footer">Deksripsi Footer</label>
                                <textarea class="form-control" id="deskripsi_footer" rows="4" name="deskripsi_footer"><?= $websettings['deskripsi_footer'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title_cta">Judul CTA</label>
                                <textarea class="form-control" id="title_cta" rows="4" name="title_cta"><?= $websettings['title_cta'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deskripsi_cta">Deskripsi CTA</label>
                                <textarea class="form-control" id="deskripsi_cta" rows="4" name="deskripsi_cta"><?= $websettings['deskripsi_cta'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="img_why">Img Why Choose Us</label>
                                <input type="file" class="form-control" id="img_why" aria-describedby="emailHelp" name="img_why">
                            </div>
                            <img src="<?= base_url('assets/uploads/web_settings/why/') . $websettings['img_why'] ?>" alt="" style="background-color:#EEEEEE; border:1px solid" class="img-fluid">
                        </div>
                    </div>
                    <div class="row">
                        <button class="text-center btn btn-success col-2 mx-auto" type="submit">update</button>
                    </div>
                </div>

        </section>
    </form>
</div>
<script>
    $("#form-websettings").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData($('#form-websettings')[0])
        $.ajax({
            url: '<?= base_url() ?>websettings/update',
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