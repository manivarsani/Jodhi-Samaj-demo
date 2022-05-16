<!-- Meetingagenda Field -->
<div class="col-sm-12">
    {!! Form::label('meetingagenda', 'Meetingagenda:') !!}
    <p>{{ $meetingSchedul->meetingagenda }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $meetingSchedul->date }}</p>
</div>

<!-- Timing Field -->
<div class="col-sm-12">
    {!! Form::label('timing', 'Timing:') !!}
    <p>{{ $meetingSchedul->timing }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $meetingSchedul->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $meetingSchedul->updated_at }}</p>
</div>

