<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pesanan</title>
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
    <h3>List Pesanan</h3>
    <a href="/order/add"><button>Add Pesanan</button></a>
    <hr>

    <div style="display: flex; flex-wrap: wrap;">
      <?php foreach($pesanan as $row): ?>
          <div style="border: 1px solid black; padding: 10px; width: 250px; margin: 15px;">
            <p style="font-weight: bold;">Pesanan  <?= $row->id; ?></p>
            <p><?= $row->total;?></p>
            <p><?= $row->status;?></p>
            <ol type="1" style="margin: 0; padding-left: 20px;">
              <?php foreach($row->produk as $produkList): ?>
                <li><?= $produkList->nama; ?></li>
              <?php endforeach; ?>
            </ol>

            <hr />
            <a href="" style="margin: 5px;">Detail</a>
            <a href="/order/update_status/<?= $row->id; ?>" style="margin: 5px;">Update Status</a>
            <a href="/order/delete/<?= $row->id; ?>" style="margin: 5px;">Delete</a>
          </div>
      <?php endforeach; ?>
    </div>


</body>
</html>