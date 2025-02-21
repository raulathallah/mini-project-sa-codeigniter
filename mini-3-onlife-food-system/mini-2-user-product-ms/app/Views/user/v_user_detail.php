<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div>
    <h5>Detail User  <span class="fs-6 fw-light">(<?= $type ?>)</span></h5>
   
    <table class="table table-bordered" style="width: 50%;">
        <tr>
            <td>ID</td>
            <td>
                <?= $user->id?>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>
                <?= $user->nama?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <?= $user->email?>
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>
                <?= $user->role?>
            </td>
        </tr>
    </table>


    
</div>
<?= $this->endSection(); ?>