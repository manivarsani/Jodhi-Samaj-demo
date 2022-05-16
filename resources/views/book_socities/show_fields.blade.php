<!-- Familyname Field -->
<div class="col-sm-12">
    {!! Form::label('familyname', 'Family Name:') !!}
    <p>{{ $bookSocity->familyname }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('function', 'Function:') !!}
    <p>{{ $bookSocity->function }}</p>
</div>

<!-- Startingdate Field -->
<div class="col-sm-12">
    {!! Form::label('startingdate', 'Starting Date:') !!}
    <p>{{ $bookSocity->startingdate }}</p>
</div>

<!-- Endingdate Field -->
<div class="col-sm-12">
    {!! Form::label('endingdate', 'Ending Date:') !!}
    <p>{{ $bookSocity->endingdate }}</p>
</div>

<!-- Totaldaybook Field -->
<div class="col-sm-12">
    {!! Form::label('totaldaybook', 'Totaldaybook:') !!}
    <p>{{ $bookSocity->totaldaybook }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('dish', 'Dish:') !!}
    <p>{{ $bookSocity->dish }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('boull', 'Boull:') !!}
    <p>{{ $bookSocity->boull }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('glass', 'Glass:') !!}
    <p>{{ $bookSocity->glass }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('spun', 'Spun:') !!}
    <p>{{ $bookSocity->spun }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $bookSocity->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $bookSocity->updated_at }}</p>
</div>

