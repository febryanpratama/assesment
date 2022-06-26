@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Product Management</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="text-right pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Create Product</button>
                {{-- <a class="btn btn-success text-right float-right" href="{{ route('products.create') }}"> Create Product</a> --}}
            </div>
        </div>
    </div>
  
  
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
  
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Description Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->product_sku }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $key+1 }}" data-whatever="@fat">Edit</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $key+1 }}" data-whatever="@fat">Delete</button>
                </td>
                <div class="modal fade" id="hapus{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('products.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <p>Are You Sure For Delete this item {{ $item->product_name }} ?</p>
                            {{-- <div class="modal-body">
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('products.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')

                            <div class="form-group">
                                <label f class="col-form-label">Product ID</label>
                                <input type="text" placeholder="Product ID ex 873988802" value="{{ $item->product_sku }}" name="product_sku" class="form-control @error('product_sku')
                                    is-invalid
                                @enderror" >
                                @error('product_sku')
                                    <div class="text-muted text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label f class="col-form-label">Product Name</label>
                                <input type="text" name="product_name" value="{{ $item->product_name }}" class="form-control @error('product_name')
                                    is-invalid
                                @enderror" >
                                @error('product_name')
                                    <div class="text-muted text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Description</label>
                                <textarea class="form-control @error('description')
                                    is-invalid
                                @enderror" name="description" id="message-text">{{ $item->description }}</textarea>
                                @error('description')
                                    <div class="text-muted text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label  class="col-form-label">Qty</label>
                                <input type="text" name="qty" value="{{ $item->qty }}" class="form-control @error('product_name')
                                    is-invalid
                                @enderror" >
                                @error('qty')
                                    <div class="text-muted alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Price</label>
                                <input type="text" placeholder="ex 50000" value="{{ $item->price }}" name="price" class="form-control @error('price')
                                    is-invalid
                                @enderror" >
                                @error('price')
                                    <div class="text-muted text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('products.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label f class="col-form-label">Product ID</label>
            <input type="text" placeholder="Product ID ex 873988802" name="product_sku" class="form-control @error('product_sku')
                is-invalid
            @enderror" >
            @error('product_sku')
                <div class="text-muted text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label f class="col-form-label">Product Name</label>
            <input type="text" placeholder="Product Name" name="product_name" class="form-control @error('product_name')
                is-invalid
            @enderror" >
            @error('product_name')
                <div class="text-muted text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label class="col-form-label">Description</label>
            <textarea class="form-control @error('description')
                is-invalid
            @enderror" name="description" id="message-text"></textarea>
            @error('description')
                <div class="text-muted text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="col-form-label">Price</label>
            <input type="text" placeholder="ex 50000" name="price" class="form-control @error('price')
                is-invalid
            @enderror" >
            @error('price')
                <div class="text-muted text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label  class="col-form-label">Qty</label>
            <input type="text" name="qty" placeholder="ex 10" class="form-control @error('product_name')
                is-invalid
            @enderror" >
            @error('qty')
                <div class="text-muted alert alert-danger text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endsection