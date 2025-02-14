<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div>
    <h5>List User</h5>
    <a href="/admin/users/new"><button type="button" class="btn btn-primary btn-sm">Add User</button></a>
    <hr>
    <table class="table">
      <thead>
        <td>ID</td>
        <td>Nama</td>
        <td>Email</td>
        <td>Role</td>
        <td>Action</td>
      </thead>
    <?php foreach($user as $row): ?>
      <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->nama;?></td>
        <td><?= $row->email; ?></td>
        <td><?= $row->role;?></td>
        <td>
          <div class="d-flex gap-1">
            <a href="<?= url_to('user_detail', $row->id); ?>" class="btn btn-secondary btn-sm" tabindex="-1" role="button" aria-disabled="true">Detail</a>
            <a href="<?= url_to('user_edit', $row->id); ?>" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Edit</a>
            <form action="<?= url_to('user_delete', $row->id); ?>" method="post">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="DELETE">
              <button class="btn btn-danger btn-sm" tabindex="-1">Delete</button>
            </form>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection(); ?>