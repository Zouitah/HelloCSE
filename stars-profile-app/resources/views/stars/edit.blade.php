@extends('layout')
   
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Star</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('star.update',$star->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
         <div class="row mb-3">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Firstname:</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Firstame" value="{{$star->firstname}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Lastname:</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="{{$star->lastname}}">
                </div>
            </div>
         </div>
         <div class="row my-2">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Description:</label>
                    <textarea class="form-control" name="description" placeholder="Description" maxlength="5000" rows="10">{{$star->description}}</textarea>
                </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Image actuelle:</label>
                    <img src="{{ asset('/storage/images/'.$star->image) }}"><br>
                    <label class="mt-2">Image:</label>
                    <input type="file" name="image" value="{{ $star->image }}">
                </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
       
    </form>
@endsection