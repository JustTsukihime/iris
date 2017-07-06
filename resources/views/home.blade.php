@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Jauna slaida pievienošana</div>
                <div class="panel-body">
                    {{ Form::open(['action' => 'InfoScreenSlideController@store', 'class' => 'form-horizontal', 'files' => true]) }}
                    {{ Form::hidden('info_screen_id', '1') }}
                    {{ Form::hidden('info_screen_slide_show_id', '1') }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Slaida nosaukums', ['class' => 'col-md-4 control-label']) }}

                        <div class="col-md-6">
                            {{ Form::text('name', null, ['class' => 'form-control']) }}

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('content', 'Slaida bilde', ['class' => 'col-md-4 control-label']) }}

                        <div class="col-md-6">
                            {{ Form::file('content', null, ['class' => 'form-control']) }}

                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Slaidi</div>
                <div class="panel-body">
                    @foreach($slides as $slide)
                        <div class="col-xs-12">
                            <img src="{{ Storage::url($slide->url) }}" class="col-xs-5">
                            <span class="col-xs-7">{{ $slide->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
