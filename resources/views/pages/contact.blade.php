@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>{!! Lang::get('pages/contact.page_title') !!}</h1>

            {!! Form::open(['action' => 'PagesController@postContact']) !!}

                <div class="form-group {!! !$errors->first('name') ?: 'has-error' !!}">
                    <span class="required">*</span>
                    {!! Form::label('name', Lang::get('pages/contact.form.labels.name'), ['class' => 'control-label']) !!}
                    {!! $errors->first('name', '<span class="text-muted">:message</span>') !!}
                    {!! Form::text('name', null, ['required', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group {!! !$errors->first('email') ?: 'has-error' !!}">
                    <span class="required">*</span>
                    {!! Form::label('email', Lang::get('pages/contact.form.labels.email'), ['class' => 'control-label']) !!}
                    {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}
                    {!! Form::email('email', null, ['required', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group {!! !$errors->first('message') ?: 'has-error' !!}">
                    <span class="required">*</span>
                    {!! Form::label('message', Lang::get('pages/contact.form.labels.message'), ['class' => 'control-label']) !!}
                    {!! $errors->first('message', '<span class="text-muted">:message</span>') !!}
                    {!! Form::textarea('message', null, ['required', 'class' => 'form-control']) !!}
                </div>

                {!! Form::submit(Lang::get('pages/contact.form.labels.submit'), ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection