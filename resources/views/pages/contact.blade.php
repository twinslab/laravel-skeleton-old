@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>{!! Lang::get('pages/contact.page_title') !!}</h1>

            {!! Form::open(['action' => 'PagesController@postContact']) !!}

                <div class="form-group {!! !$errors->contactForm->first('name') ?: 'has-error' !!}">
                    {!! Form::label('name', Lang::get('pages/contact.form.labels.name'), ['class' => 'control-label']) !!}
                    <span class="required">*</span>
                    {!! $errors->contactForm->first('name', '<span class="text-muted pull-right">:message</span>') !!}
                    {!! Form::text('name', null, ['required', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group {!! !$errors->contactForm->first('email') ?: 'has-error' !!}">
                    {!! Form::label('email', Lang::get('pages/contact.form.labels.email'), ['class' => 'control-label']) !!}
                    <span class="required">*</span>
                    {!! $errors->contactForm->first('email', '<span class="text-muted pull-right">:message</span>') !!}
                    {!! Form::email('email', null, ['required', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group {!! !$errors->contactForm->first('message') ?: 'has-error' !!}">
                    {!! Form::label('message', Lang::get('pages/contact.form.labels.message'), ['class' => 'control-label']) !!}
                    <span class="required">*</span>
                    {!! $errors->contactForm->first('message', '<span class="text-muted pull-right">:message</span>') !!}
                    {!! Form::textarea('message', null, ['required', 'class' => 'form-control']) !!}
                </div>

                {!! Form::submit(Lang::get('pages/contact.form.labels.submit'), ['class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
