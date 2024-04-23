<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <a href="<?= base_url('blogs/tambah') ?>" class="btn btn-primary mb-2">Tambah</a>
                <!-- <a href="<?= base_url('blogs/tambah') ?>" class="btn btn-warning mb-2">Export</a>
                <a href="<?= base_url('blogs/tambah') ?>" class="btn btn-info mb-2">Import</a> -->
                <div class="table-responsive">
                    <table class='table table-striped' id="table-data">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Date Published</th>
                                <th>Banner</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        $('#table-data').DataTable({
            ajax: '<?= base_url('blogs/load') ?>',
            processing: true,
            // scrollX: true,
            // serverSide: true,
            columns: [{
                    data: 'category'
                },
                {
                    data: 'title'
                },
                {
                    data: 'post_date'
                },
                {
                    data: 'banner',
                    render: function(data, type, full, meta) {
                        return `<img src="<?= ASSETS_URL ?>uploads/banner_blogs/${data}" alt="" srcset="" width="50px">`
                    }
                },
                {
                    data: 'name'
                },
                {
                    data: 'is_active',
                    render: function(data, type, full, meta) {
                        let html = '';
                        if (data == 1) {
                            html = `<button class="btn btn-sm btn-success" onclick="published('${full.uuid}')">Published</button>`
                        } else {
                            html = `<button class="btn btn-sm btn-danger" onclick="drafted('${full.uuid}')">Draft</button>`
                        }
                        return html;
                    }
                },
                {
                    data: 'uuid',
                    render: function(data, type, full, meta) {
                        return `<div>
                                <button class="btn btn-sm btn-danger" type="button" onclick="hapus('${data}')">Hapus</button>
                                <a href="<?= base_url() ?>blogs/edit/${data}" class="btn btn-sm btn-info">Edit</a>
                                </div>`;
                    }
                }
            ]
        });
    });

    function hapus(uuid) {

        cuteAlert({
            type: 'question',
            title: 'Yakin ingin menghapus data ?',
            message: '',
            confirmText: 'Hapus',
            cancelText: 'Batal'
        }).then((e) => {
            if (e == "confirm") {
                $.ajax({
                    url: '<?= base_url() ?>/blogs/hapus/',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        uuid
                    },
                    success: function(results) {
                        if (results.code != 200) {
                            errors(results.message)
                        } else {
                            success(results.message)
                            // $('.modal').modal('hide')
                        }
                    }

                })
            } else {
                console.log('gak jadi hapus')
            }
        })

    }

    function published(uuid) {
        $.ajax({
            url: '<?= base_url() ?>blogs/updated_published/' + uuid,
            method: 'POST',
            dataType: 'JSON',
            success: function(results) {
                if (results.code != 200) {
                    errors(results.message)
                } else {
                    success(results.message)
                    // $('.modal').modal('hide')
                }
            }
        })
    }

    function drafted(uuid) {
        $.ajax({
            url: '<?= base_url() ?>blogs/updated_drafted/' + uuid,
            method: 'POST',
            dataType: 'JSON',
            success: function(results) {
                if (results.code != 200) {
                    errors(results.message)
                } else {
                    success(results.message)
                    // $('.modal').modal('hide')
                }
            }
        })
    }
</script>