<li class="nav-item">
    <a href="{{ route('dashbords.index') }}" class="nav-link {{ Request::is('dashbords*') ? 'active' : '' }}">
        <p>Dashbords</p>
    </a>
</li>

<li class="nav-item {{ Request::is('members*','functionAdds*') ? 'menu-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="fas fa-angle-left right"></i>
        <p>Master</p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('members.index') }}" class="nav-link {{ Request::is('members*') ? 'active' : '' }}">
                <p>Members</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('functionAdds.index') }}" class="nav-link {{ Request::is('functionAdds*') ? 'active' : '' }}">
                <p>Programm</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ Request::is('bookSocities*') ? 'menu-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="fas fa-angle-left right"></i>
        <p>Booking</p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('bookSocities.index') }}" class="nav-link {{ Request::is('bookSocities*') ? 'active' : '' }}">
                <p>Book Socity</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ Request::is('annancePrograms*','meetingScheduls*','marraigeAnnounces*','businessAdvotises*','functionPublishes*') ? 'menu-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="fas fa-angle-left right"></i>
        <p>Annancements</p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('annancePrograms.index') }}" class="nav-link {{ Request::is('annancePrograms*') ? 'active' : '' }}">
                <p>Annancements</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('meetingScheduls.index') }}" class="nav-link {{ Request::is('meetingScheduls*') ? 'active' : '' }}">
                <p>Meeting Scheduls</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('marraigeAnnounces.index') }}" class="nav-link {{ Request::is('marraigeAnnounces*') ? 'active' : '' }}">
                <p>Marraige Announces</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('businessAdvotises.index') }}" class="nav-link {{ Request::is('businessAdvotises*') ? 'active' : '' }}">
                <p>Business Advotises</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('functionPublishes.index') }}" class="nav-link {{ Request::is('functionPublishes*') ? 'active' : '' }}">
                <p>Function Publishes</p>
            </a>
        </li>
    </ul>
</li>