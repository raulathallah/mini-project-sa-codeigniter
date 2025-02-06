<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produk</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <h3>Add Order Form</h3>
    <button type="button" id="moreProduk">+ Tambah Produk</button>

    <form id="form-order"  action="/order/save_add" method="post" style="display: grid;width: fit-content; gap: 5px;">
        <div class="div-order">
          
        </div>
        <button type="submit">Save</button>
    </form>


    <script>
        $(document).on('click', '#moreProduk', function(e){
            e.preventDefault();
            $('.div-order').append(`<div style="padding:10px;">
                <label>Produk</label> 
                <select name="produk[]" id="produk">
                    <option value="" hidden>--- Select Product ---</option>
                    <?php foreach($produk as $row): ?>
                    <option value=<?= $row->id; ?>><?= $row->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>`);
        });
    </script>
   
</body>


</html>