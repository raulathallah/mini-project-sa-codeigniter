<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('admin_title') ?>
User List
<?= $this->endSection() ?>

<?= $this->section('admin_content') ?>
<div>
  <h4 class="mb-4">User List</h4>
  <a href="/admin/user/on_create"><button class="btn btn-primary btn-sm my-2">Add User</button></a>
  <table class="table table-striped table-hover">
    <thead>
      <tr class="">
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Last Login</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($users as $row): ?>
        <tr class="align-middle">
          <td scope="row"><?= $row->user_id; ?></td>
          <td scope="row"><?= $row->full_name; ?></td>
          <td scope="row"><?= $row->username; ?></td>
          <td scope="row"><?= $row->email; ?></td>
          <td scope="row"><?= $row->role; ?></td>
          <td scope="row"><?= $row->status; ?></td>
          <td scope="row"><?= $row->last_login; ?></td>
          <td class="d-flex gap-2">
            <a href="/user-profile/<?= $row->user_id; ?>" class="btn btn-outline-dark btn-sm">Detail</a>
            <a href="/admin/user/on_update/<?= $row->user_id; ?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <form action="/admin/user/delete/<?= $row->user_id; ?>" method="get">
              <button class="btn btn-outline-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>