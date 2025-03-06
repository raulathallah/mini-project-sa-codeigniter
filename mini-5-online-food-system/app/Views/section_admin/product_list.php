<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('admin_title') ?>
Product List
<?= $this->endSection() ?>

<?= $this->section('admin_content') ?>
<div class="card">
  <div class="card-header">
    Product List
  </div>
  <div class="card-body">
    <div class="mb-2">
      <a href="/admin/product/on_create"><button class="btn btn-primary ">Add Product</button></a>
    </div>
    <form action="<?= $baseUrl ?>" method="get" class="form-inline">
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="input-group mr-2">
            <input type="text" class="form-control" name="search"
              value="<?= $params->search ?>" placeholder="Search...">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit">Search</button>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <div class="input-group ml-2">
            <select name="perPage" class="form-control" onchange="this.form.submit()">
              <option value="5" <?= ($params->perPage == 5) ? 'selected' : '' ?>>
                5 per halaman
              </option>
              <option value="10" <?= ($params->perPage == 10) ? 'selected' : '' ?>>
                10 per halaman
              </option>
              <option value="20" <?= ($params->perPage == 20) ? 'selected' : '' ?>>
                20 per halaman
              </option>
            </select>
          </div>
        </div>
        <div class="col-md-1">
          <a href="<?= $params->getResetUrl($baseUrl) ?>" class="btn btn-secondary ml-2">
            Reset
          </a>
        </div>



        <input type="hidden" name="sort" value="<?= $params->sort; ?>">
        <input type="hidden" name="order" value="<?= $params->order; ?>">

    </form>
  </div>
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <th scope="col">ID</th>
      <th scope="col"><a class="text-decoration-none text-white" href="<?= $params->getSortUrl('products.name', $baseUrl) ?>">
          Name <?= $params->isSortedBy('products.name') ? ($params->getSortDirection() == 'asc' ?
                  '↑' : '↓') : '↕' ?>
        </a></th>
      <th scope="col">Description</th>
      <th scope="col"><a class="text-decoration-none text-white" href="<?= $params->getSortUrl('price', $baseUrl) ?>">
          Price <?= $params->isSortedBy('price') ? ($params->getSortDirection() == 'asc' ?
                  '↑' : '↓') : '↕' ?>
        </a></th>
      <th scope="col">Category</th>
      <th scope="col">Product Status</th>
      <th scope="col">isNew Status</th>
      <th scope="col">isSale Status</th>
      <th scope="col">Action</th>
    </thead>
    <tbody>
      <?php foreach ($products as $row): ?>

        <tr class="align-middle">
          <td scope="row"><?= $row->id; ?></td>
          <td><?= $row->productName; ?></td>
          <td><?= $row->description; ?></td>
          <td><?= $row->getFormattedPrice(); ?></td>
          <td><?= $row->categoryName; ?></td>
          <td><?= $row->status; ?></td>
          <td>
            <?php if ($row->is_new == 't'): ?>
              <span class="badge rounded-pill bg-secondary">TRUE</span>
            <?php else: ?>
              <span class="badge rounded-pill bg-dark">FALSE</span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($row->is_sale == 't'): ?>
              <span class="badge rounded-pill bg-secondary">TRUE</span>
            <?php else: ?>
              <span class="badge rounded-pill bg-dark">FALSE</span>
            <?php endif; ?>
          </td>
          <td class="d-flex gap-2">
            <a href="/admin/product/detail/<?= $row->id; ?>" class="btn btn-outline-dark btn-sm">Detail</a>
            <a href="/admin/product/on_update/<?= $row->id; ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <form action="/admin/product/delete/<?= $row->id; ?>" method="get">
              <button class="btn btn-outline-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>