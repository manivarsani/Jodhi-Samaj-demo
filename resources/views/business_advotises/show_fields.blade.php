<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $businessAdvotise->image }}</p>
</div>

<!-- Video Field -->
<div class="col-sm-12">
    {!! Form::label('video', 'Video:') !!}
    <p>{{ $businessAdvotise->video }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $businessAdvotise->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $businessAdvotise->updated_at }}</p>
</div>

