<div class="table-responsive">
    <table class="table" id="marraigeAnnounces-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Startingdate</th>
        <th>Endingdate</th>
        <th>Timing</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($marraigeAnnounces as $marraigeAnnounce)
            <tr>
                <td>{{ $marraigeAnnounce->name }}</td>
            <td>{{ $marraigeAnnounce->startingdate }}</td>
            <td>{{ $marraigeAnnounce->endingdate }}</td>
            <td>{{ $marraigeAnnounce->timing }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['marraigeAnnounces.destroy', $marraigeAnnounce->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('marraigeAnnounces.show', [$marraigeAnnounce->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('marraigeAnnounces.edit', [$marraigeAnnounce->id]) }}" class='btn btn-default btn-xs'>
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
