<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div>
    <h5>Detail Product</h5>
    <table class="table table-bordered" style="width: 50%;">
        <tr>
            <td>ID</td>
            <td>
                <?= $product->id?>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>
                <?= $product->nama?>
            </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>
                <?= $product->harga?>
            </td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>
                <?= $product->stok?>
            </td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <?= $product->kategori?>
            </td>
        </tr>
    </table>

</div>
<?= $this->endSection(); ?>