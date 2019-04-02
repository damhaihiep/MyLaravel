@extends('master')
@section('title', 'View all tickets')
@section('content')
<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div>
                <span><h2> Tickets </h2></span>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <a href="{!! action('TicketController@create')!!}" class='btn btn-primary'>Create</a>
            </div>
        </div>
        @if ($tickets->isEmpty())
        <p> There is no ticket.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{!! $ticket->id !!} </td>
                    <td>
                        <a href="{!! action('TicketController@show', $ticket->slug) !!}">{!! $ticket->title !!} </a>
                    </td>
                    <td>{!! $ticket->content !!}</td>
                    <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection