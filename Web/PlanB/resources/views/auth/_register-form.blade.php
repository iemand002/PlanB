{!! csrf_field() !!}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="name">Voornaam</label>

    <div class="col-md-6">
        {!! Form::text('name',null,['class'=>'form-control','id'=>'name']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="surname">Familienaam</label>

    <div class="col-md-6">
        {!! Form::text('surname',null,['class'=>"form-control",'id'=>'surname']) !!}

        @if ($errors->has('surname'))
            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="email">E-Mail Adres</label>

    <div class="col-md-6">
        {!! Form::email('email',null,['class'=>'form-control','id'=>'email']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="password">Wachtwoord</label>

    <div class="col-md-6">
        {!! Form::password('password',['class'=>'form-controll','id'=>'password']) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="password_confirmation">Herhaal wachtwoord</label>

    <div class="col-md-6">
        {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'password_confirmation']) !!}
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
        @endif
    </div>
</div>
@if(Auth::check()&&Auth::user()->admin)
    {{-- Als admin is ingelogd kan deze nieuwe admins toewijzen --}}
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                {!! Form::checkbox('admin',null,null,['id'=>'admin']) !!}
                <label for="admin">Maak admin </label>
            </div>
        </div>
    </div>
@endif

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i> {{$submitbuttonText}}
        </button>
        @if(Auth::check()&&Auth::user()->admin)
            <a href="{{route('admin.user.index')}}" class="btn btn-default">
                Annuleer
            </a>
        @endif
    </div>
</div>
