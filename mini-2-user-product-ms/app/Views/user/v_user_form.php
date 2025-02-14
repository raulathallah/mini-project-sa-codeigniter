<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div>
    <h5><?= $type ?> User Form</h5>
    
    <?php if($type === 'Create'): ?>
        <form action="<?= url_to('user_create'); ?>" method="post" style="display: grid;width: fit-content; gap: 5px">
    <?php else: ?>
        <form action="<?= url_to('user_update', $user->id); ?>" method="post" style="display: grid;width: fit-content; gap: 5px">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="POST">
    <?php endif; ?>
        <input 
            class="form-control my-1" 
            type="text" 
            placeholder="Nama" 
            id="nama" 
            name="nama"
            value="<?= $user->nama ?>"
            autofocus
        >
        <input 
            class="form-control my-1" 
            type="email" 
            placeholder="Email" 
            id="email" 
            name="email"
            value="<?= $user->email ?>"
            autofocus
        >
        <input 
            class="form-control my-1" 
            type="text" 
            placeholder="Role" 
            id="role" 
            name="role"
            value="<?= $user->role ?>"
            autofocus
        >

        

        <button type="submit" class="btn btn-primary btn-sm my-2">Save</button>
    </form>
</div>
<?= $this->endSection(); ?>


