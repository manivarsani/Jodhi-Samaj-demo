<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $annanceProgram->name }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $annanceProgram->description }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $annanceProgram->date }}</p>
</div>
<!-- Timing Field -->
<div class="col-sm-12">
    {!! Form::label('timing', 'Timing:') !!}
    <p>{{ $annanceProgram->timing }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $annanceProgram->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $annanceProgram->updated_at }}</p>
</div>

