<?= $this->extend('layouts/public_layout') ?>

<?= $this->section('title') ?>
User Profile
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div>
  <?= $content ?? '' ?>
</div>
<?= $this->endSection() ?>