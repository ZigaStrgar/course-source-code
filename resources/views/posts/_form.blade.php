<div class='form-group'>
    {!! Form::label('title', 'Naslov članka') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('content', 'Vsebina članka') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('description', 'Kratek opis/povzetek članka') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>