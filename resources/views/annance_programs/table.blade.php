<div class="table-responsive">
    <table class="table" id="annancePrograms-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Timing</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($annancePrograms as $annanceProgram)
            <tr>
                <td>{{ $annanceProgram->name }}</td>
                <td>{{ $annanceProgram->description }}</td>
                <td>{{ $annanceProgram->date }}</td>
                <td>{{ $annanceProgram->timing }}</td>
               
                <td width="120">
                    {!! Form::open(['route' => ['annancePrograms.destroy', $annanceProgram->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('annancePrograms.show', [$annanceProgram->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('annancePrograms.edit', [$annanceProgram->id]) }}" class='btn btn-default btn-xs'>
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