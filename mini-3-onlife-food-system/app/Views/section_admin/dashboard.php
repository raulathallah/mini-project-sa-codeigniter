<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
  <?= $content ?? '' ?>
</div>
<?= $this->endSection() ?>