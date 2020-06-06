@extends('layouts.app')

@section('content')

<div class="container">



    <h1>Add New Post</h1>



    @if(Session::has('success'))

        <div class="alert alert-success">

            {{ Session::get('success') }}

            @php

                Session::forget('success');

            @endphp

        </div>

    @endif



    <form method="POST" action="/post" enctype="multipart/form-data" >



        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Caption:</label>
                <textarea class="form-control" name="text" id="text" rows="3" placeholder="Whats on your mind?"></textarea>

                @if ($errors->has('text'))

                    <span class="text-danger">{{ $errors->first('text') }}</span>

                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($errors->has('image'))

                    <span class="text-danger">{{ $errors->first('image') }}</span>

                @endif
            </div>
        </div>
        <div class="form-group">

            <button class="btn btn-success btn-submit btn-lg">Post</button>

        </div>

    </form>

</div>
@endsection
