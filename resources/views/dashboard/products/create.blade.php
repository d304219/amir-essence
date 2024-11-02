@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Create New Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Form Fields on the Left -->
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" min="0" step="0.01">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" min="0">
                    </div>

                    <div class="form-group">
                        <label for="volume">Volume (ml)</label>
                        <input type="number" name="volume" class="form-control" id="volume" min="0">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <textarea name="ingredients" class="form-control" id="ingredients"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <!-- Populate this with categories dynamically -->
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Image Upload and Preview on the Right -->
                <div class="col-md-4">
                    <div class="form-group d-flex flex-column">
                        <label for="img_file">Product Image</label>
                        <input type="file" name="img_file" class="form-control-file" id="img_file">
                    </div>
                    
                    <!-- Placeholder Image Preview -->
                    <div class="image-preview mt-3">
                        <p>Image Preview:</p>
                        <img id="img_preview" src="#" alt="Preview" class="img-fluid" style="display: none; max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="mt-4 btn btn-primary" type="submit" value="Save Product">
            </div>
        </form>
    </div>

    <!-- JavaScript to Preview Image Before Uploading -->
    <script>
        document.getElementById('img_file').onchange = function (event) {
            const [file] = event.target.files;
            if (file) {
                const imgPreview = document.getElementById('img_preview');
                imgPreview.src = URL.createObjectURL(file);
                imgPreview.style.display = 'block';
            }
        };
    </script>
@endsection
