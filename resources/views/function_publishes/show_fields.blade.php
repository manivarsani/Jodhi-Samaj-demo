<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $functionPublish->name }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $functionPublish->address }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $functionPublish->description }}</p>
</div>
<!-- Startingdate Field -->
<div class="col-sm-12">
    {!! Form::label('startingdate', 'Starting Date:') !!}
    <p>{{ $functionPublish->startingdate }}</p>
</div>

<!-- Endingdate Field -->
<div class="col-sm-12">
    {!! Form::label('endingdate', 'Ending Date:') !!}
    <p>{{ $functionPublish->endingdate }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $functionPublish->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $functionPublish->updated_at }}</p>
</div>

