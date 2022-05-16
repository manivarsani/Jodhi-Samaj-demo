@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Member</h1>
                    <!-- <a class="btn btn-primary float-right" id="dynamic-ar">
                        Add New
                    </a> -->
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'members.store', 'files' => true]) !!}

            <div class="card-body" id="dynamicAddRemove">

                <div class="row">
                    @include('members.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('members.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
<!-- 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function() {
        ++i;
        // $("#dynamicAddRemove").append('<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
        // $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +'][name]" placeholder="Enter name" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][address]" placeholder="Enter address" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][subject]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +'][mobile_no]" placeholder="Enter mobile_no" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'       
        // $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +'][name]" placeholder="Enter name" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][address]" placeholder="Enter address" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][subject]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +'][mobile_no]" placeholder="Enter mobile_no" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        // $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +'][firstname]" placeholder="Enter firstname" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][lastname]" placeholder="Enter lastname" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][village]" placeholder="Enter village" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +'][mobileno]" placeholder="Enter mobileno" class="form-control" /></td><td><input type="file" name="addMoreInputFields[' + i +'][image]" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +'][firstname]" placeholder="Enter firstname" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][lastname]" placeholder="Enter lastname" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +'][village]" placeholder="Enter village" class="form-control" /></td><td><input type="number" name="addMoreInputFields[' + i +'][mobileno]" placeholder="Enter mobileno" class="form-control" /></td><td><input type="file" name="addMoreInputFields[' + i +'][image]" placeholder="Enter image" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'

        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
    });
</script> -->

@endsection
