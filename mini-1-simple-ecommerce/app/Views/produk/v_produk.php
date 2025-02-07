<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produk</title>
    <style>
      table,tr,td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 12px;
      }
    </style>
</head>
<body>
    <a href="/" style="padding: 10px;">Produk</a>
    <a href="/order" style="padding: 10px;">Order</a>
    <h3>List Produk</h3>
    <a href="/produk/add"><button>Add Produk</button></a>
    <hr>
    <table>
      <thead>
        <td>ID</td>
        <td>Nama</td>
        <td>Harga</td>
        <td>Kategori</td>
        <td>Stok</td>
        <td>Action</td>
      </thead>
    <?php foreach($produk as $row): ?>
      <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->nama;?></td>
        <td><?= $row->harga;?></td>
        <td><?= $row->kategori;?></td>
        <td style="display: flex; border: none; ">
          <form action="/produk/kurang/<?= $row->id; ?>" method="post">
            <span><button type="submit">-</button></span>
          </form>
          <span style="margin: 0px 15px;"><?= $row->stok;?></span>
          <form action="/produk/tambah/<?= $row->id; ?>" method="post">
            <span><button type="submit">+</button></span>
          </form>
        </td>
        <td>
          <a href="/produk/detail/<?= $row->id;?>">Detail</a>
          <a href="/produk/edit/<?= $row->id;?>">Edit</a>
          <a href="/produk/delete/<?= $row->id;?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>