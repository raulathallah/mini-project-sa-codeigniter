<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('admin_title') ?>
User List
<?= $this->endSection() ?>

<?= $this->section('admin_content') ?>
<div>
  <h4 class="mb-4">User List</h4>
  <?= $table ?? '' ?>
</div>
<?= $this->endSection() ?>