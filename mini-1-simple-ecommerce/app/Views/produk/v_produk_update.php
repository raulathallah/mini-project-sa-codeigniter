<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produk</title>
</head>
<body>
    <h3>Update Produk Form</h3>

    <form action="/produk/save_update/<?= $produk->id; ?>" method="post" style="display: grid;width: fit-content; gap: 5px">
        <label>ID</label> 
        <input 
            type="number"
            id="id"
            name="id"
            value="<?= $produk->id ?>"
        />
        <label>Nama</label>
        <input 
            type="text"
            id="nama"
            name="nama"
            value="<?= $produk->nama ?>"
            autofocus
        />
        <label>Harga</label>
        <input 
            type="number"
            id="harga"
            name="harga"
            value="<?= $produk->harga ?>"
        />
        <label>Kategori</label>
        <input 
            type="text"
            id="kategori"
            name="kategori"
            value="<?= $produk->kategori ?>"
        />
        <button type="submit">Save</button>
    </form>
</body>
</html>