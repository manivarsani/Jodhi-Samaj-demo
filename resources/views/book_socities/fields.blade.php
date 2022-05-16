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
    {!! Form::label('toals', 'Tools:') !!}
    <br>
    {!! Form::label('dish', 'Dish:') !!}
    {!! Form::number('dish', null, ['class' => 'form-control custom-select']) !!}<br>
    {!! Form::label('boull', 'Boull:') !!}
    {!! Form::number('boull', null, ['class' => 'form-control custom-select']) !!}<br>
    {!! Form::label('glass', 'Glass:') !!}
    {!! Form::number('glass', null, ['class' => 'form-control custom-select']) !!}<br>
    {!! Form::label('spun', 'Spun:') !!}
    {!! Form::number('spun', null, ['class' => 'form-control custom-select']) !!}

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