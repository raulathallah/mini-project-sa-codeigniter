<?= $this->extend('layouts/public_layout') ?>

<?= $this->section('title') ?>
User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-block">
  <h3><?= $type ?> User Form</h3>

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
    <form action="/admin/user/create" method="post" style="display: grid; gap: 5px">
    <?php else: ?>
      <form action="/admin/user/update" method="post" style="display: grid; gap: 5px">
      <?php endif; ?>

      <?php if ($type == "Create"): ?>
      <?php else: ?>
        <input
          type="text"
          id="user_id"
          name="user_id"
          hidden
          value="<?= $user->user_id ?>"
          autofocus />
      <?php endif; ?>
      <div class="">
        <div class="row">
          <div class="col">
            <div class="mb-2">
              <label for="name" class="form-label">Username</label>
              <input
                type="text"
                id="username"
                class="form-control"
                value="<?= $user->username  ?>"
                name="username">
            </div>
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                id="password"
                class="form-control"
                value="<?= $user->password  ?>"
                name="password">
            </div>
            <div class="mb-2">
              <label for="full_name" class="form-label">Full Name</label>
              <input
                type="text"
                id="full_name"
                class="form-control"
                value="<?= $user->full_name  ?>"
                name="full_name">
            </div>
            <div class="mb-2">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                id="email"
                class="form-control"
                value="<?= $user->email  ?>"
                name="email">
            </div>
            <div class="mb-2">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" name="role" id="role">
                <?php foreach (['admin', 'member'] as $row): ?>
                  <option value="<?= $row ?>"><?= $row ?></option>
                <?php endforeach; ?>
              </select>
            </div>
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
            </div>
          </div>
        <?php endif; ?>
      </div>


      <button type=" submit" class="btn btn-primary mt-3">Save</button>
      </form>
</div>
<?= $this->endSection() ?>