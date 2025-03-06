<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="<?= base_url('assets/js/pristine.js') ?>"></script>

  <title><?= $this->renderSection('title') ?></title>

</head>

<body class="d-flex flex-column h-100">
  <!-- Header -->
  <header class="">
    <?= $this->include('partials/header') ?>
  </header>

  <!-- Main Content -->
  <div class="h-100 p-3">
    <?= $this->renderSection('content') ?>
  </div>
  <!-- Footer -->
  <?= $this->include('partials/footer') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <?= $this->renderSection('scripts') ?>

</body>

</html>