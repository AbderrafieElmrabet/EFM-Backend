<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">List of Products</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#productModal">
            Add Product
        </button>
        <div class="container mt-5">
            <table class="table table-bordered" id="productTable">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr id="product-{{ $product->id }}">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add new product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">price</label>
                            <textarea class="form-control" id="price" name="price" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <button type="submit" class="btn btn-success">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $("#productForm").submit(function(e) {
                e.preventDefault();
                let formData = {
                    _token: $("input[name=_token]").val()
                    , name: $("#name").val()
                    , price: $("#price").val()
                    , stock: $("#stock").val()
                };

                $.ajax({
                    type: "POST"
                    , url: "{{ route('produit.store') }}"
                    , data: formData
                    , success: function(response) {
                        $("#productModal").modal("hide");
                        $("#productForm")[0].reset();

                        const createdAt = new Date(response.created_at);

                        const formattedDate = createdAt.toLocaleString();

                        $("#productTable tbody").append(`
                        <tr id="product-${response.id}">
                            <td>${response.name}</td>
                            <td class="text-truncate" style="max-width: 300px;">${response.price}</td>
                            <td>${response.stock}</td>
                        </tr>
                    `);
                    }
                    , error: function(xhr) {
                        alert("Error: " + xhr.responseJSON.message);
                    }
                });
            });
        });

    </script>
</body>
</html>
