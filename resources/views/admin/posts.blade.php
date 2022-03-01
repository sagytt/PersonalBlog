@extends('layouts.admin')

@section('title') Admin Posts @endsection

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                Admin Posts
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Updated At</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td class="text-nowrap"><a href="{{route('singlePost', $post->id)}}"> {{$post->title}}</a></td>
                                <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                                <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
                                <td>{{$post->comments->count()}}</td>
                                <td>
                                    <a href="{{route('adminPostEdit', $post->id)}}"><button class="btn-warning"><i class="icon icon-pencil"></i></button> </a>
                                    <form style="display: none" method="POST" id="deletePost-{{$post->id}}" action="{{route('adminDeletePost', $post->id)}}">@csrf</form>
                                    <button type="button" class="btn-danger" data-toggle="modal" data-target="#deletePostModal-{{ $post->id }}"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="modal" id="deletePostModal-{{ $post->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">You are about to delete {{ $post->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it.</button>
                            <form method="POST" id="deletePost-{{$post->id}}" action="{{route('adminDeletePost', $post->id)}}">@csrf
                        <button type="submit" class="btn btn-primary">Yes, delete it.</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection