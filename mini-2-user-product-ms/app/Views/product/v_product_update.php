<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
</head>
<body>
    <h3>Update Product Form</h3>

    <form action="/products/update/<?= $product->id; ?>" method="post" style="display: grid;width: fit-content; gap: 5px">
        <label>Nama</label>
        <input 
            type="text"
            id="nama"
            name="nama"
            value="<?= $product->nama ?>"
            autofocus
        />
        <label>Harga</label>
        <input 
            type="number"
            id="harga"
            name="harga"
            value="<?= $product->harga ?>"
        />
        <label>Kategori</label>
        <input 
            type="text"
            id="kategori"
            name="kategori"
            value="<?= $product->kategori ?>"
        />
        <button type="submit">Save</button>
    </form>
</body>
</html>