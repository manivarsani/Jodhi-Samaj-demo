<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $marraigeAnnounce->name }}</p>
</div>

<!-- Startingdate Field -->
<div class="col-sm-12">
    {!! Form::label('startingdate', 'Startingdate:') !!}
    <p>{{ $marraigeAnnounce->startingdate }}</p>
</div>

<!-- Endingdate Field -->
<div class="col-sm-12">
    {!! Form::label('endingdate', 'Endingdate:') !!}
    <p>{{ $marraigeAnnounce->endingdate }}</p>
</div>

<!-- Timing Field -->
<div class="col-sm-12">
    {!! Form::label('timing', 'Timing:') !!}
    <p>{{ $marraigeAnnounce->timing }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $marraigeAnnounce->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $marraigeAnnounce->updated_at }}</p>
</div>

