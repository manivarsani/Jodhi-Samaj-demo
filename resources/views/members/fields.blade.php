<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', 'First Name:') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', 'Last Name:') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Village Field -->
<div class="form-group col-sm-6">
    {!! Form::label('village', 'Village:') !!}
    {!! Form::text('village', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobileno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobileno', 'Mobile Number:') !!}
    {!! Form::number('mobileno', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<!-- <div class="clearfix"></div> -->






<!-- $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +'][firstname]" placeholder="Enter firstname" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][lastname]" placeholder="Enter lastname" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][village]" placeholder="Enter village" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +'][mobileno]" placeholder="Enter mobileno" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +'][image]" placeholder="Enter image" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>' -->
