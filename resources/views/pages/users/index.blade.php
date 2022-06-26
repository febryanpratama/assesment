
@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-6 margin-tb">
          <div class="pull-left">
              <h2>Users Management</h2>
          </div>
      </div>
      <div class="col-lg-6">
        <div class="pull-right float-right">
              <a class="btn btn-primary" href="{{ route('users.create') }}"> Create New User</a>
          </div>
      </div>
  </div>
  
  
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  
  
  <table class="table table-bordered">
    <tr>
      <th>No</th>
     <th>Name</th>
     <th>Email</th>
     <th>Roles</th>
     <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $user)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
          @foreach($user->getRoleNames() as $v=>$item)
            {{ $item }}
          @endforeach
      </td>
      <td>
        <div class="d-flex">
          <a class="btn btn-info mr-2" href="{{ route('users.show',$user->id) }}">Show</a>
          <a class="btn btn-primary mr-2" href="{{ route('users.edit',$user->id) }}">Edit</a>
          <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mr-2"> Delete</button>
          </form>
        </div>
          {{-- <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}"> Delete</a> --}}
      </td>
    </tr>
   @endforeach
  </table>
</div>
@endsection 