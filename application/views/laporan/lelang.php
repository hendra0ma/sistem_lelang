<h1>Semua Data Lelang</h1>

<table class="table table_datatable">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal lelang</th>
            <th scope="col">Harga Awal</th>
            <th scope="col">Harga Akhir</th>
            <th scope="col">Username Pelelang</th>
            <th scope="col">Nama Petugas</th>
            <th scope="col">status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($lelang as $data) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data->nama_barang ?></td>
                <td><?= $data->tgl_lelang ?></td>
                <td><?= $data->harga_awal ?></td>
                <td><?= $data->harga_akhir ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->nama_petugas ?></td>
                <td><?= $data->status ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>