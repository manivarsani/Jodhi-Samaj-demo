<!-- Familyname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('familyname', 'Family Name:') !!}
    {!! Form::select('familyname',$member, null, ['class' => 'form-control custom-select']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('function', 'Function:') !!}<br>
    {!! Form::select('function',$function, null, ['class' => 'form-control custom-select']) !!}
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

<div class="form-group col-sm-6">
    {!! Form::label('toals', 'Toals:') !!}
    <br>
    {!! Form::label('dish', 'dish:') !!}
    {!! Form::number('dish', null) !!}<br>
    {!! Form::label('boull', 'boull:') !!}
    {!! Form::number('boull', null) !!}<br>
    {!! Form::label('glass', 'glass:') !!}
    {!! Form::number('glass', null) !!}<br>
    {!! Form::label('spun', 'spun:') !!}
    {!! Form::number('spun', null) !!}

</div>

@push('page_scripts')
<script type="text/javascript">
    $(['#startingdate', '#endingdate']).datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })
</script>
@endpush