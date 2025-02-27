<div>
  <h4 class="mb-4">Product List</h4>
  <a href="/product/on_create"><button>Add Product</button></a>
  <hr>
  <div class="d-flex flex-wrap gap-3">
    {products}
    <div class="card" style="width: 26rem;">
      <div class="card-body">
        <h5 class="card-title">{productName}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Rp. {price}</h6>
        <span class="badge bg-secondary my-2">{categoryName}</span>
        <!-- STOCK -->
        <h6 class="mb-2">Stock : {stock}</h6>
        <p class="mb-2" style="text-align: justify;">{description}</p>
      </div>
      <form action="/product/delete/{id}" method="get" class="px-2 py-1">
        <button class="btn btn-danger fs-6">Delete</button>
      </form>
    </div>
    {/products}
  </div>
</div>