<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pesanan</title>
</head>
<body>
    <h3>Update Order Status</h3>
    <form id="form-status"  action="/order/save_update_status/<?= $pesanan->id; ?>" method="post" style="display: grid;width: fit-content; gap: 5px;">
          <p>Current Status: <span style="font-weight: bold;"><?= $pesanan->status; ?></span></p>
          <label>Select Status</label>
          <select name="status" id="status">
              <option value="" hidden>--- Select Product ---</option>
              <option value="SEDANG DIPROSES">SEDANG DIPROSES</option>
              <option value="SELESAI">SELESAI</option>
              <option value="BATAL">BATAL</option>
          </select>
        <button type="submit">Save</button>
    </form>
</body>


</html>