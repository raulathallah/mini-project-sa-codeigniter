<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produk</title>
</head>
<body>
    <h3>Add Produk Form</h3>

    <form action="/produk/save_add" method="post" style="display: grid;width: fit-content; gap: 5px">
        <label>ID</label> 
        <input 
            type="number"
            id="id"
            name="id"
            autofocus
        />
        <label>Nama</label>
        <input 
            type="text"
            id="nama"
            name="nama"
        />
        <label>Harga</label>
        <input 
            type="number"
            id="harga"
            name="harga"
        />
        <label>Stok</label>
        <input 
            type="number"
            id="stok"
            name="stok"
        />
        <label>Kategori</label>
        <input 
            type="text"
            id="kategori"
            name="kategori"
        />
        <button type="submit">Save</button>
    </form>
</body>
</html>