<div>

  <h4 class="mb-4">Product List</h4>
  <div class="d-flex flex-wrap gap-5">
    {products}
    <div class="card" style="width: 26rem;">
      <div class="card-body">
        <h5 class="card-title">{name}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Rp. {price}</h6>
        <!-- STOCK -->
        <h6 class="mb-2">Stock : {stock}</h6>
        <!-- DISCOUNT ON SALE -->
        <p class="mb-2" style="text-align: justify;">{description}</p>
      </div>
      <div class="card-body">
        <p class="fw-bold">Categories</p>
        <ul>
          {categories}
          <li>{categoryName}</li>
          {/categories}
        </ul>
      </div>
    </div>
    {/products}
  </div>


</div>