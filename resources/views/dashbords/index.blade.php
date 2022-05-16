@extends('layouts.app')

@section('content')

<section class="content">
    <section class="content-header">
        <div class="container-fluid">

        </div>
    </section>

    <div class="content px-3">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>{{$member}}</h3>

                        <h4>Members</h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('members.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{$booking}}</h3>

                        <h4>Booking</h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-star" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('bookSocities.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>

</section>

@endsection