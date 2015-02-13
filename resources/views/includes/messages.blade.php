<?php $message_types = ['danger', 'success', 'info', 'warning'] ?>

@foreach($message_types as $type)
    @if($message = Session::get('alert-'.$type))
        <div class="alert alert-{{ $type }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"></button>
            {!! $message !!}
        </div>
    @endif
@endforeach

@if($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"></button>
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif