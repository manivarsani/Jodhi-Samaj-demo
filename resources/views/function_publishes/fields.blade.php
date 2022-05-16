<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
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


@push('page_scripts')
    <script type="text/javascript">
        $(['#startingdate','#endingdate']).datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
