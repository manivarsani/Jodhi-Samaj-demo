<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('video', ['class' => 'custom-file-input']) !!}
            {!! Form::label('video', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
