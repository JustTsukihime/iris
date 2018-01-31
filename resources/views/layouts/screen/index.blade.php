@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pievienot infoekrānu</div>
                    <div class="panel-body">
                        {{ Form::open(['action' => 'ScreenController@store', 'class' => 'form-horizontal']) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Info ekrāna nosaukums', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            {{ Form::label('address', 'Info ekrāna adrese', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">{{ route('screen.index') }}/</span>
                                    {{ Form::text('url', null, ['class' => 'form-control']) }}
                                </div>

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('url') }}</strong>
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
                    <div class="panel-heading">Info ekrāni</div>
                    <div class="panel-body">
                        @foreach($screens as $screen)
                            <div class="col-xs-12">
                                <span class="col-xs-6">{{ $screen->name }}</span>
                                <a class="btn btn-primary" href="{{ route('screen.edit', $screen->url) }}">Rediģēt</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
