<div class="form-group">
    {!! Form::label('name', 'Nome') !!}

    {!! Form::text('name', old('name'),['class'=>'form-control','placeholder'=>'Preencha seu nome']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}

    {!! Form::email('email', old('email'),['class'=>'form-control','placeholder'=>'email@example.com']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Telefone ou celular') !!}

    {!! Form::text('phone', old('phone'),['class'=>'form-control','placeholder'=>'Telefone ou celular']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Senha') !!}

    {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'***********']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Repita a Senha') !!}

    {!! Form::password('password_confirmation',['class'=>'form-control','id'=>'password','placeholder'=>'***********']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Imagem(Opcional)') !!}

    {!! Form::file('image',['id'=>'image']) !!}
</div>
<div class="form-group">
    {!! Form::label('occupation', 'Especifique o cargo') !!}<br>

    <select name="occupation" id="">

        <option value="">Selecione...</option>
        @foreach($occupations as $occupation)
            @if(!empty($edit_user))
                @if($occupation->name == $edit_user->occupation->name)
                    <option value="{{ $occupation->id }}" selected>{{ $occupation->name }}</option>
                @endif
            @endif
            <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('role', 'Especifique a permissão:') !!}<br>

    <select name="role" id="">
        <option value="">Selecione...</option>
        @foreach($roles as $role)
            @if(!empty($edit_user))
                @foreach($role->users as $role_user)
                    @if($role_user->name == $edit_user->name)
                        <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                    @endif
                @endforeach
            @endif
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach

    </select>
</div>