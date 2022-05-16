<!-- Firstname Field -->
<div class="col-sm-12">
    {!! Form::label('firstname', 'Firstname:') !!}
    <p>{{ $member->firstname }}</p>
</div>

<!-- Lastname Field -->
<div class="col-sm-12">
    {!! Form::label('lastname', 'Lastname:') !!}
    <p>{{ $member->lastname }}</p>
</div>

<!-- Village Field -->
<div class="col-sm-12">
    {!! Form::label('village', 'Village:') !!}
    <p>{{ $member->village }}</p>
</div>

<!-- Mobileno Field -->
<div class="col-sm-12">
    {!! Form::label('mobileno', 'Mobileno:') !!}
    <p>{{ $member->mobileno }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $member->image }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $member->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $member->updated_at }}</p>
</div>

