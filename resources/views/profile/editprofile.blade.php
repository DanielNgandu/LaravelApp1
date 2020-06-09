@extends('layouts.app')

@section('content')

    <div class="container">



        <h1>Edit Profile</h1>



        @if(Session::has('success'))

            <div class="alert alert-success">

                {{ Session::get('success') }}

                @php

                    Session::forget('success');

                @endphp

            </div>

        @endif



        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" >



            {{ csrf_field() }}
            {{ method_field('patch') }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Title:</label>
                    <textarea class="form-control" name="title" id="text" rows="3" placeholder="Title"></textarea>

                    @if ($errors->has('title'))

                        <span class="text-danger">{{ $errors->first('title') }}</span>

                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label>Description:</label>
                    <textarea class="form-control" name="description" id="text" rows="3" placeholder="Whats on your mind?"></textarea>

                    @if ($errors->has('description'))

                        <span class="text-danger">{{ $errors->first('description') }}</span>

                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label>Url:</label>
                    <textarea class="form-control" name="url" id="text" rows="3" placeholder="https://yoursite.com"></textarea>

                    @if ($errors->has('url'))

                        <span class="text-danger">{{ $errors->first('url') }}</span>

                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="image">Upload New Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if ($errors->has('image'))

                        <span class="text-danger">{{ $errors->first('image') }}</span>

                    @endif
                </div>
            </div>
            <div class="form-group">

                <button class="btn btn-success btn-submit btn-lg">Save</button>

            </div>

        </form>

    </div>
@endsection
