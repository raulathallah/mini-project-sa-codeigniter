<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div>
    <h5>List Product</h5>
    <a href="/products/new"><button type="button" class="btn btn-primary btn-sm">Add Product</button></a>
    <hr>
    <table class="table">
      <thead>
        <td>ID</td>
        <td>Nama</td>
        <td>Harga</td>
        <td>Kategori</td>
        <td>Stok</td>
        <td>Action</td>
      </thead>
    <?php foreach($product as $row): ?>
      <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->nama;?></td>
        <td><?= $row->harga; ?></td>
        <td><?= $row->kategori;?></td>
        <td>
          <div class="d-flex">
            <form action="/products/kurang-stok/<?= $row->id; ?>" method="get">
                <button class="btn btn-primary btn-sm">-</button>
              </form>
              <span style="margin: 0px 15px;"><?= $row->stok;?></span>
              <form action="/products/tambah-stok/<?= $row->id; ?>" method="get">
                <button class="btn btn-primary btn-sm">+</button>
            </form>
          </div>
        </td>
        <td>
          <div class="d-flex gap-1">
            <a href="/products/detail/<?= $row->id;?>" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Detail</a>
            <a href="/products/show/<?= $row->id;?>" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Edit</a>
            <form action="/products/remove/<?= $row->id;?>" method="post">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="DELETE">
              <button class="btn btn-danger btn-sm" tabindex="-1">Delete</button>
            </form>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection(); ?>