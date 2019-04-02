@extends('master')
@section('title', 'View a ticket')
@section('content')
<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        <div class="content">
            <h2 class="header">{!! $ticket->title !!}</h2>
            <p> <strong>Status</strong>: {!! $ticket->status ? 'Pending': 'Answered' !!}</p>
            <p> <strong>Content</strong>: {!! $ticket->content !!} </p>
        </div>
        <!-- <a href="{!! action('TicketController@edit', $ticket->slug) !!}" class="btn btn-info">Edit</a>
        <a href="#" class="btn btn-info">Delete</a> -->
        <a href="{!! action('TicketController@edit', $ticket->slug) !!}" class="btn btn-info pull-left"
            style="margin-right: 5px;">Edit</a>
        <form method="post" action="{!! action('TicketController@destroy', $ticket->slug) !!}" class="pull-left">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="well well bs-component">
        <form class="form-horizontal" method="post" action="{!! action('CommentController@newComment') !!}">
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="post_id" value="{!! $ticket->id !!}">
            <fieldset>
                <legend>Reply</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2" style="margin-left: 0%;">
                        <a type="reset" class="btn btn-default" href="{!! action('TicketController@cancelCreate') !!}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection