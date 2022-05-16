<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Program Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>
@push('page_scripts')
    <script type="text/javascript">
        $(['#date']).datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
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

<!-- Date Field -->


