@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Rediģēt infoekrānu</div>
                    <div class="panel-body">
                        {{ Form::open(['action' => 'InfoScreenController@store', 'class' => 'form-horizontal']) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Info ekrāna nosaukums', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('name', $infoscreen->name, ['class' => 'form-control']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            {{ Form::label('address', 'Infoekrāna adrese', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                <div class="form-control-static">{{ route('infoscreen.index').'/'.$infoscreen->url }}</div>

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
                    <div class="panel-heading">Slaidšovi <a href="{{ route('slideshow.create', $infoscreen->url) }}" class="btn btn-primary">Pievienot</a></div>
                    <div class="panel-body">
                        @foreach($slideshows as $ss)
                            <div class="col-xs-12">
                                <span class="col-xs-6">{{ $ss->name }}</span>
                                <a class="btn btn-primary" href="{{ route('slideshow.show', ['infoscreen' => $infoscreen, 'slideshow' => $ss->id]) }}">Skatīt</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
