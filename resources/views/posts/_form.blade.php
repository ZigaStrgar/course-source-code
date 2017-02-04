<div class='form-group'>
    {!! Form::label('title', 'Naslov članka') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class='form-group'>
    {!! Form::label('content', 'Vsebina članka') !!}
    <?php if(isset($post)) { ?>
    <textarea name="content" id="content">{!! htmlentities($post->content) !!}</textarea>
    <?php } else { ?>
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    <?php } ?>
</div>
<div class='form-group'>
    {!! Form::label('description', 'Kratek opis/povzetek članka') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_list', 'Kategorije članka') !!}
    {!! Form::select('category_list[]', $categories, null, ['multiple', 'class' => 'form-control categories-select']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!}
</div>

@section('css')
    <link rel="stylesheet" href="/css/select2.min.css" type="text/css"/>
@endsection

@section('scripts')
    <script src="/js/select2.js"></script>
    <script>
        $(".categories-select").select2({
            tags: true
        })
    </script>
    @include('includes.tinymce')
@endsection