<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('girlsname', 'Girls Name:') !!}
    {!! Form::text('girlsname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('boysname', 'Boys Name:') !!}
    {!! Form::text('boysname', null, ['class' => 'form-control']) !!}
</div>

<!-- Startingdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('startingdate', 'Starting Date:') !!}
    {!! Form::text('startingdate', null, ['class' => 'form-control','id'=>'startingdate']) !!}
</div>

<!-- Endingdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endingdate', 'Ending Date:') !!}
    {!! Form::text('endingdate', null, ['class' => 'form-control','id'=>'endingdate']) !!}
</div>

<!-- Timing Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timing', 'Timing:') !!}
    {!! Form::text('timing', null, ['class' => 'form-control','id'=>'timing']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#timing').datetimepicker({
            format: 'HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush



@push('page_scripts')
    <script type="text/javascript">
        $(['#startingdate','#endingdate']).datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

