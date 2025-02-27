<?= $this->extend('layouts/public_layout') ?>

<?= $this->section('title') ?>
Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
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
    <form action="/product/create" method="post" style="display: grid; gap: 5px">
    <?php else: ?>
      <form action="/product/update" method="post" style="display: grid; gap: 5px">
      <?php endif; ?>

      <?php if ($type == "Create"): ?>
      <?php else: ?>
        <input
          type="text"
          id="id"
          name="id"
          hidden
          value="<?= $product->product_id ?>"
          autofocus />
      <?php endif; ?>

      <label>Nama</label>
      <input
        type="text"
        id="name"
        value="<?= $product->name  ?>"
        name="name" />
      <label>Description</label>

      <textarea type="text" id="description" name="description" rows="5"><?= $product->description  ?></textarea>

      <label>Price</label>
      <input
        type="number"
        id="price"
        value="<?= $product->price  ?>"
        name="price" />

      <label>Stock</label>
      <input
        type="number"
        id="stock"
        value="<?= $product->stock  ?>"
        name="stock" />

      <label>Category</label>
      <input
        type="number"
        id="category_id"
        value="1"
        name="category_id" />
      <!-- 
      <select name="category_id" id="category_id">
        <option value="" hidden>--Please choose an option--</option>
        <?php foreach ($categories as $row): ?>
          <option value="<?= $row->name ?>" hidden><?= $row->name ?></option>
        <?php endforeach; ?>
      </select>

        -->


      <button type="submit" class="btn btn-primary mt-3">Save</button>
      </form>
</div>
<?= $this->endSection() ?>