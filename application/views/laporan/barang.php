<h1>List Semua Barang</h1>

<table class="table table_datatable">
    <thead>
        <tr>
            <th scope="col">No</th>

            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal</th>

            <th scope="col">Harga Awal</th>
            <th scope="col">Deskripsi Barang</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($barang as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->nama_barang ?></td>
                <td><?= $data->tgl ?></td>
                <td><?= $data->harga_awal ?></td>
                <td><?= $data->deskripsi_barang ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>