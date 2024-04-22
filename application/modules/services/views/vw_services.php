<div class="main-content container-fluid">
    <div class="page-title">
        <h3><?= $title ?></h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Services/tambah') ?>" class="btn btn-primary mb-2">Tambah</a>
                        <a href="<?= base_url('Category_blogs/tambah') ?>" class="btn btn-warning mb-2">Export</a>
                        <a href="<?= base_url('Category_blogs/tambah') ?>" class="btn btn-info mb-2">Import</a>
                        <div class="table-responsive">
                            <table class='table table-striped' id="table-data">
                                <thead>
                                    <tr>
                                        <th>Services</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#table-data').DataTable({
            ajax: '<?= base_url('services/load') ?>',
            processing: true,
            // scrollX: true,
            // serverSide: true,
            columns: [{
                    data: 'services'
                },
                {
                    data: 'description',
                    className: 'text-wrap'
                },
                {
                    data: 'img',
                    render: function(data, type, full, meta) {
                        return `<img src="<?= base_url('assets/uploads/') ?>services_images/${data}" alt="" width="100px">`
                    }
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
                    data: 'created_at'
                }, {
                    data: 'updated_at'
                },
                {
                    data: 'uuid',
                    render: function(data, type, full, meta) {
                        return `<div>
                                <button class="btn btn-sm btn-danger" type="button" onclick="hapus('${data}')">Hapus</button>
                                <a href="<?= base_url() ?>services/edit/${data}" class="btn btn-sm btn-info">Edit</a>
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
                    url: '<?= base_url() ?>/services/hapus/',
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
            url: '<?= base_url() ?>services/updated_published/' + uuid,
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
            url: '<?= base_url() ?>services/updated_drafted/' + uuid,
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