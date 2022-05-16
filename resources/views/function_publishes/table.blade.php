<div class="table-responsive">
    <table class="table" id="functionPublishes-table">
        <thead>
            <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Description</th>
        <th>Starting Date</th>
        <th>Ending Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($functionPublishes as $functionPublish)
            <tr>
                <td>{{ $functionPublish->name }}</td>
            <td>{{ $functionPublish->address }}</td>
            <td>{{ $functionPublish->description }}</td>
            <td>{{ $functionPublish->startingdate }}</td>
            <td>{{ $functionPublish->endingdate }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['functionPublishes.destroy', $functionPublish->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('functionPublishes.show', [$functionPublish->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('functionPublishes.edit', [$functionPublish->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
