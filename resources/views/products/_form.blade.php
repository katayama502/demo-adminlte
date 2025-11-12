<div class="mb-3">
  <label class="form-label">SKU</label>
  <input name="sku" class="form-control" value="{{ old('sku', $product->sku) }}" required>
</div>
<div class="mb-3">
  <label class="form-label">商品名</label>
  <input name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
</div>
<div class="mb-3">
  <label class="form-label">販売価格</label>
  <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
</div>
<div class="mb-3">
  <label class="form-label">原価</label>
  <input type="number" step="0.01" name="cost" class="form-control" value="{{ old('cost', $product->cost) }}" required>
</div>
<div class="mb-3">
  <label class="form-label">在庫数</label>
  <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
</div>
<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
         {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
  <label for="is_active" class="form-check-label">販売中（有効）</label>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  </div>
@endif
