<aside class="main-sidebar sidebar-dark-primary">
    <a href="{{ route('home') }}" class="brand-link">
        <h4><center>{{ config('app.name') }}</center></h4>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
