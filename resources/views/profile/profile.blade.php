@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 align-baseline">
                <img src="/logos/apple-icon.png" class="rounded-circle">
            </div>
            <div class="col-9">
                <div class="row align-baseline">
                    <div class="col-9">
                        <h1>{{$user->name}}</h1>
                        <a href ="edit/{{ $user->id }}">Edit Profile</a>

                    </div>
                    <div class="col-3">
                        <a href="/post/create" class="btn-info btn-lg">Add New Post</a>
                    </div>
                </div>

                <div>
                    <h3>{{ $user->profile->title}}</h3>
                </div>
                <div>
                    <div class="d-flex">
                        <div class="pr-5"><strong>123 </strong>Posts</div>
                        <div class="pr-5"><strong>10000 </strong>Followers</div>
                        <div class="pr-5"><strong>3000 </strong>Following</div>
                    </div>
                    <div class="pt-3 font-weight-bold"><a
                            href="https://{{ $user->profile->url }}/">{{ $user->profile->url }}</a></div>
                    <div><p>{{ $user->profile->description }}</p></div>

                    <div class="row pt-5">

                    @foreach($user->post as $post)
                            <div class="col-4 pr-1 pt-3 rounded-pill align-baseline align-bottom"><a href="/post/edit/{{$post->id}}"><img
                                    src="{{url('/uploads/'.$post->image)}}"
                                    alt="image here" class="w-100"></a>
                            </div>

                    @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
