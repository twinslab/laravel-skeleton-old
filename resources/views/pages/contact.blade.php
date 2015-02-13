@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>{!! Lang::get('pages/contact.page_title') !!}</h1>

            <form action="{!! action('PagesController@postContact') !!}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="name">{{ Lang::get('pages/contact.form.labels.name') }}</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name"/>
                </div>

                <div class="form-group">
                    <label for="email">{{ Lang::get('pages/contact.form.labels.email') }}</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="message">{{ Lang::get('pages/contact.form.labels.message') }}</label>
                    <textarea class="form-control" rows="3" name="message" id="message">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-default">{{ Lang::get('pages/contact.form.labels.submit') }}</button>
            </form>
        </div>
    </div>
@endsection