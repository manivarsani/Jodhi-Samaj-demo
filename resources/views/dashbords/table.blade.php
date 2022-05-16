<div class="table-responsive">
    <table class="table" id="dashbords-table">
        <thead>
            <tr>
                <div class="col-lg-3 col-6">
                    <br>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Member</h3>
                            <img src="Sample_User.png" style="height: 30px; width: 30px;">
                            <!-- <p img src="Sample_User.png">User</p> -->
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                            <span>{{}}</span>
                        </div>
                        <a href="members" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- <th colspan="3">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($dashbords as $dashbord)
            <tr>

                <td width="120">
                    {!! Form::open(['route' => ['dashbords.destroy', $dashbord->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dashbords.show', [$dashbord->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('dashbords.edit', [$dashbord->id]) }}" class='btn btn-default btn-xs'>
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