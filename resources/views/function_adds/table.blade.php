<div class="table-responsive">
    <table class="table" id="functionAdds-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($functionAdds as $functionAdd)
            <tr>
                <td>{{ $functionAdd->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['functionAdds.destroy', $functionAdd->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('functionAdds.show', [$functionAdd->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('functionAdds.edit', [$functionAdd->id]) }}" class='btn btn-default btn-xs'>
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
