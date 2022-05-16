<div class="table-responsive">
    <table class="table" id="bookSocities-table">
        <thead>
            <tr>
                <th>Familyname</th>
                <th>funtion</th>
                <!-- <th>marraige</th>
                <th>Sagai</th>
                <th>samajProgram</th>
                <th>katha</th> -->
                <th>StartingDate</th>
                <th>EndingDate</th>
                <th>TotalDayBook</th>
                <th>Dish</th>
                <th>Boull</th>
                <th>Glass</th>
                <th>spun</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bookSocities as $bookSocity)
            <tr>
                <td>{{ $bookSocity->familyname }}</td>
                <td>{{ $bookSocity->function }}</td>
                <!-- <td>{{ $bookSocity->marraige }}</td>
                <td>{{ $bookSocity->sagai }}</td>
                <td>{{ $bookSocity->samajprogram }}</td>
                <td>{{ $bookSocity->katha }}</td> -->
                <td>{{ $bookSocity->startingdate }}</td>
                <td>{{ $bookSocity->endingdate }}</td>
                <td>{{ $bookSocity->totaldaybook }}</td>
                <td>{{ $bookSocity->dish }}</td>
                <td>{{ $bookSocity->boull }}</td>
                <td>{{ $bookSocity->glass }}</td>
                <td>{{ $bookSocity->spun }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bookSocities.destroy', $bookSocity->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bookSocities.show', [$bookSocity->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bookSocities.edit', [$bookSocity->id]) }}" class='btn btn-default btn-xs'>
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
