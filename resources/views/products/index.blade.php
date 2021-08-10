<table>
    <thead>
        <th>
            <tr>ID</tr>
            <tr>Name</tr>
            <tr>Price</tr>
            <tr>Profit</tr>
            <tr>Supplier</tr>
            <tr>Action</tr>
        </th>
    </thead>
    <tbody>
        @foreach($products as $product)
            <td>
                <tr>{{ $product['id'] }}</tr>
                <tr>{{ $product['name'] }}</tr>
                <tr>{{ $product['price'] }}</tr>
                <tr>{{ $product['profit'] }}</tr>
                <tr>{{ $product['supplier_name'] }}</tr>
                <tr>
                    <button
                        class="btn btn-sm btn-warning btn-edit"
                        data-id="{{ $product['id'] }}"
                        data-name="{{ $product['name'] }}"
                        data-price="{{ $product['price'] }}"
                    >Edit</button>
                </tr>
            </td>
        @endforeach
    </tbody>
</table>

<modal id="edit-product-modal">
    <form method="POST" action="#" id="edit-product-form">
        @csrf
        @method('PATCH')
        <input type="text" id="edit-product-name" name="name" value="">
        <input type="text" id="edit-product-price" name="price" value="">

        <input type="submit" value="Update">
    </form>
</modal>

<script>
    $('.btn-edit').click(function() {
        $('#edit-product-form').attr('action', '{{ route('products.update', '') }}/' + $(self).data('id'))

        $('#edit-product-name').val($(self).data('name'))
        $('#edit-product-price').val($(self).data('price'))
    })
</script>
