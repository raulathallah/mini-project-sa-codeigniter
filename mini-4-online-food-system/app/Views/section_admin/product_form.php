<?= $this->extend('layouts/public_layout') ?>

<?= $this->section('title') ?>
Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-block">
  <h3><?= $type ?> Product Form</h3>

  <?php if (session('errors')) : ?>
    <div class="alert alert-danger">
      <ul>
        <?php foreach (session('errors') as $error) : ?>
          <li><?= $error ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>

  <?php if ($type == "Create"): ?>
    <form action="/admin/product/create" method="post" style="display: grid; gap: 5px">
    <?php else: ?>
      <form action="/admin/product/update" method="post" style="display: grid; gap: 5px">
      <?php endif; ?>

      <?php if ($type == "Create"): ?>
      <?php else: ?>
        <input
          type="text"
          id="product_id"
          name="product_id"
          hidden
          value="<?= $product->product_id ?>"
          autofocus />
      <?php endif; ?>
      <div class="">
        <div class="row">
          <div class="col">
            <div class="mb-2">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                id="name"
                class="form-control"
                value="<?= $product->name  ?>"
                name="name">
            </div>
            <div class="mb-2">
              <label for="price" class="form-label">Price</label>
              <input
                type="number"
                id="price"
                class="form-control"
                value="<?= $product->price  ?>"
                name="price">
            </div>

          </div>
          <div class="col">
            <div class="mb-2">
              <label for="stock" class="form-label">Stock</label>
              <input
                type="number"
                id="stock"
                class="form-control"
                value="<?= $product->stock  ?>"
                name="stock">
            </div>
            <div class="mb-2">
              <label for="category_id" class="form-label">Category</label>
              <select class="form-select" name="category_id" id="category_id">
                <option value="" hidden>--Please choose an option--</option>
                <?php foreach ($categories as $row): ?>
                  <option
                    value="<?= $row->category_id; ?>"
                    selected=<?php if ($row->category_id == $product->category_id): ?>
                    true
                    <?php else: ?> false
                    <?php endif ?>>
                    <?= $row->name ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="mb-2">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= $product->description  ?></textarea>
          </div>
        </div>
        <?php if ($type == "Update"): ?>
          <div class="row">
            <div class="col">
              <div class="mb-2">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                  <?php foreach (['active', 'inactive'] as $row): ?>
                    <option value="<?= $row ?>"><?= $row ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-2">
                <label for="status" class="form-label">isSale Status</label>
                <select class="form-select" name="is_sale" id="is_sale" value>
                  <option value="t">TRUE</option>
                  <option value="f">FALSE</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="mb-2">
                <label for="status" class="form-label">isNew Status</label>
                <select class="form-select" name="is_new" id="is_new" value>
                  <option value="t">TRUE</option>
                  <option value="f">FALSE</option>
                </select>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>









      <button type=" submit" class="btn btn-primary mt-3">Save</button>
      </form>
</div>
<?= $this->endSection() ?>