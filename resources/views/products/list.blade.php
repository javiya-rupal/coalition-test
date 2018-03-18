<div class="container">
  <h2>Products</h2>

  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Product Name</th>
      <th>Quantity In Stock</th>
      <th>Price Per Item</th>
      <th>Datetime Submitted</th>
      <th>Total value Number</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
      <tr>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->quantity_in_stock }}</td>
        <td>{{ $product->product_price }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->total_value_number }}</td>
      </tr>
    @endforeach
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><b>Total: </b> {{ $total_sum }}</td>
    </tr>
    </tbody>
  </table>
</div>