<div class="table-responsive">
    <table class="table" id="meetingScheduls-table">
        <thead>
            <tr>
                <th>Meeting Agenda</th>
                <th>Date</th>
                <th>Timing</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meetingScheduls as $meetingSchedul)
            <tr>
                <td>{{ $meetingSchedul->meetingagenda }}</td>
                <td>{{ $meetingSchedul->date }}</td>
                <td>{{ $meetingSchedul->timing }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['meetingScheduls.destroy', $meetingSchedul->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('meetingScheduls.show', [$meetingSchedul->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('meetingScheduls.edit', [$meetingSchedul->id]) }}" class='btn btn-default btn-xs'>
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