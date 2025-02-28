<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('admin_title') ?>
Product List
<?= $this->endSection() ?>

<?= $this->section('admin_content') ?>
<div>
  <h4 class="mb-4">Product List</h4>
  <a href="/admin/product/on_create"><button class="btn btn-primary btn-sm my-2">Add Product</button></a>
  <table class="table table-striped table-hover">
    <thead>
      <tr class="">
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Product Status</th>
        <th scope="col">isNew Status</th>
        <th scope="col">isSale Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($products as $row): ?>
        <tr class="align-middle">
          <td scope="row"><?= $row['id']; ?></td>
          <td><?= $row['productName']; ?></td>
          <td><?= $row['description']; ?></td>
          <td><?= $row['categoryName']; ?></td>
          <td><?= $row['status']; ?></td>
          <td>
            <?php if ($row['is_new'] == 't'): ?>
              <span class="badge rounded-pill bg-secondary">TRUE</span>
            <?php else: ?>
              <span class="badge rounded-pill bg-dark">FALSE</span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($row['is_sale'] == 't'): ?>
              <span class="badge rounded-pill bg-secondary">TRUE</span>
            <?php else: ?>
              <span class="badge rounded-pill bg-dark">FALSE</span>
            <?php endif; ?>
          </td>
          <td class="d-flex gap-2">
            <a href="/admin/product/detail/<?= $row['id']; ?>" class="btn btn-outline-dark btn-sm">Detail</a>
            <a href="/admin/product/on_update/<?= $row['id']; ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <form action="/admin/product/delete/<?= $row['id']; ?>" method="get">
              <button class="btn btn-outline-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>