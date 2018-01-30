@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Iestatījumi</div>
                    <div class="panel-body">
                        {{ Form::open(['action' => ['ScreenController@update', $screen->url], 'method' => 'put', 'class' => 'form-horizontal']) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Infoekrāna nosaukums', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('name', $screen->name, ['class' => 'form-control']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('active_slide_show') ? ' has-error' : '' }}">
                            {{ Form::label('active_slide_show', 'Aktīvais slaidšovs', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::select('active_slide_show', $slideshows->pluck('name', 'id'), $screen->active_slide_show, ['class' => 'form-control']) }}

                                @if ($errors->has('active_slide_show'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            {{ Form::label('address', 'Infoekrāna adrese', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                <div class="form-control-static">{{ route('screen.index').'/'.$screen->url }}</div>

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {{ Form::submit('Saglabāt', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Slaidšovi <a href="{{ route('slideshow.create', $screen->url) }}" class="btn btn-primary">Pievienot</a></div>
                    <div class="panel-body">
                        @foreach($slideshows as $ss)
                            <div class="col-xs-12">
                                <span class="col-xs-6">{{ $ss->name }}</span>
                                <a class="btn btn-primary" href="{{ route('slideshow.show', ['screen' => $screen, 'slideshow' => $ss->id]) }}">Skatīt</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
