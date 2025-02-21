<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div>
    <h5>API</h5>
    <hr>
    <div class="d-flex flex-wrap gap-2">
      <div class="card" style="width: 25%;">
        <div class="card-body">
          <h5 class="card-title">Users</h5>
          <table class="table">
            <tr>
              <td>User All</td>
              <td>
                <a class="btn btn-outline-primary btn-sm" href="<?= url_to('user_all_api'); ?>" role="button">View</a>
              </td>
            </tr>
            <tr>
              <form action="<?= url_to('user_detail_api'); ?>" method="get">
                <td class="d-flex gap-2">
                    <span>User By ID</span>
                    <input type="text" id="detail_id" name="detail_id"/>
                </td>
                <td>
                    <button type="submit" class="btn btn-outline-primary btn-sm">View</button>
                </td>
              </form>
            </tr>
          </table>
        </div>
      </div>

      <div class="card" style="width: 25%;">
        <div class="card-body">
          <h5 class="card-title">Products</h5>
          <table class="table">
            <tr>
              <td>Product All</td>
              <td>
                <a class="btn btn-outline-primary btn-sm" href="<?= url_to('product_all_api'); ?>" role="button">View</a>
              </td>
              </tr>
            <tr>
              <form action="<?= url_to('product_detail_api'); ?>" method="get">
                <td class="d-flex gap-2">
                    <span>Product By ID</span>
                    <input type="text" id="detail_id" name="detail_id"/>
                </td>
                <td>
                    <button type="submit" class="btn btn-outline-primary btn-sm">View</button>
                </td>
              </form>
            </tr>
          </table>
        </div>
      </div>


    
    </div>


</div>
<?= $this->endSection(); ?>