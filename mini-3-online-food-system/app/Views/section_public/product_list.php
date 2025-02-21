<?= $this->extend('layouts/public_layout') ?>

<?= $this->section('title') ?>
Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
  <?= $content ?? '' ?>
</div>
<?= $this->endSection() ?>