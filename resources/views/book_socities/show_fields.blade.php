<!-- Familyname Field -->
<div class="col-sm-12">
    {!! Form::label('familyname', 'Familyname:') !!}
    <p>{{ $bookSocity->familyname }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('function', 'Function:') !!}
    <p>{{ $bookSocity->function }}</p>
</div>

<!-- Startingdate Field -->
<div class="col-sm-12">
    {!! Form::label('startingdate', 'Startingdate:') !!}
    <p>{{ $bookSocity->startingdate }}</p>
</div>

<!-- Endingdate Field -->
<div class="col-sm-12">
    {!! Form::label('endingdate', 'Endingdate:') !!}
    <p>{{ $bookSocity->endingdate }}</p>
</div>

<!-- Totaldaybook Field -->
<div class="col-sm-12">
    {!! Form::label('totaldaybook', 'Totaldaybook:') !!}
    <p>{{ $bookSocity->totaldaybook }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('dish', 'dish:') !!}
    <p>{{ $bookSocity->dish }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('boull', 'boull:') !!}
    <p>{{ $bookSocity->boull }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('glass', 'glass:') !!}
    <p>{{ $bookSocity->glass }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('spun', 'spun:') !!}
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

