<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Barang Lelang</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($this->session->flashdata('message')) { ?>
                                <div class="alert alert-success alert-dismissible mt-3 fade show text-light" role="alert">
                                    <?= $this->session->flashdata('message') ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php  } ?>
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger alert-dismissible mt-3 fade show text-light" role="alert">
                                    <ul>
                                        <li><?= $this->session->flashdata('error') ?></li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php  } ?>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_barang">nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama barang" value="<?= $barang->nama_barang ?>">
                                    <div class="badge text-danger"><?= form_error('nama_barang') ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="inputGroupFile01">Gambar barang</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="gambar_barang">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih gambar</label>
                                        <div class="badge text-danger"><?= form_error('gambar_barang') ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga_awal">Harga Awal</label>
                                    <input type="number" class="form-control" id="harga_awal" name="harga_awal" placeholder="Harga barang" value="<?= $barang->harga_awal ?>">
                                    <div class="badge text-danger"><?= form_error('harga_awal') ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_barang">deskripsi barang</label>
                                    <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" placeholder="deskripsi barang" cols="30" rows="10"><?= $barang->deskripsi_barang ?></textarea>
                                    <div class="badge text-danger"><?= form_error('deskripsi_barang') ?></div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <center>
                        <img src="<?= base_url() ?>public/assets/dashboard/docs/assets/img/upload/<?= $barang->gambar_barang ?>" alt="Image Admin" class="img-fluid image" style="border-radius:10px;">
                    </center>
                </div>
            </div>
        </div>
    </div>