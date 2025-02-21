<?= $this->extend('layouts/public_layout') ?>

<?= $this->section('title') ?>
<?= $this->renderSection('admin_title') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="d-flex">
    <?= $this->include('partials/sidebar') ?>

    <div class="m-4">
        <?= $this->renderSection('admin_content') ?>
    </div>

</div>
<?= $this->endSection() ?>