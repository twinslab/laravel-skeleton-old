<?php $messageTypes = ['danger', 'success', 'info', 'warning'] ?>

@foreach($messageTypes as $type)
    @if($errors->flashMessages->first("alert-$type"))
        <div class="alert alert-{!! $type !!} fade in alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! $errors->flashMessages->first("alert-$type") !!}
        </div>
    @endif
@endforeach
