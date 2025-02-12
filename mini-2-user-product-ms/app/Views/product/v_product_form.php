<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div>
    <h5><?= $type ?> Product Form</h5>
    
    <?php if($type === 'Create'): ?>
        <form action="/products/create" method="post" style="display: grid;width: fit-content; gap: 5px">
    <?php else: ?>
        <form action="/products/update/<?= $product->id ?>" method="post" style="display: grid;width: fit-content; gap: 5px">
    <?php endif; ?>
        <input 
            class="form-control my-1" 
            type="text" 
            placeholder="Nama" 
            id="nama" 
            name="nama"
            value="<?= $product->nama ?>"
            autofocus
        >
        <input
            class="form-control my-1" 
            type="number" 
            placeholder="Harga" 
            id="harga" 
            value="<?= $product->harga ?>"
            name="harga"
        >

        <?php if($type === 'Create'): ?>
            <input class="form-control my-1" type="number" placeholder="Stok" id="stok" name="stok">
        <?php endif; ?>
    
        <input
            class="form-control my-1" 
            type="text" 
            placeholder="kategori" 
            id="kategori" 
            value="<?= $product->kategori ?>"
            name="kategori"
        >
        <button type="submit" class="btn btn-primary btn-sm my-2">Save</button>
    </form>
</div>
<?= $this->endSection(); ?>


