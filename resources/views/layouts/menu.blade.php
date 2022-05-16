<li class="nav-item">
    <a href="{{ route('dashbords.index') }}"
       class="nav-link {{ Request::is('dashbords*') ? 'active' : '' }}">
        <p>Dashbords</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('functionAdds.index') }}"
       class="nav-link {{ Request::is('functionAdds*') ? 'active' : '' }}">
        <p>Function Adds</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('members.index') }}"
       class="nav-link {{ Request::is('members*') ? 'active' : '' }}">
        <p>Members</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('bookSocities.index') }}"
       class="nav-link {{ Request::is('bookSocities*') ? 'active' : '' }}">
        <p>Book Socities</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('annancePrograms.index') }}"
       class="nav-link {{ Request::is('annancePrograms*') ? 'active' : '' }}">
        <p>Annance Programs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('meetingScheduls.index') }}"
       class="nav-link {{ Request::is('meetingScheduls*') ? 'active' : '' }}">
        <p>Meeting Scheduls</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('marraigeAnnounces.index') }}"
       class="nav-link {{ Request::is('marraigeAnnounces*') ? 'active' : '' }}">
        <p>Marraige Announces</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('businessAdvotises.index') }}"
       class="nav-link {{ Request::is('businessAdvotises*') ? 'active' : '' }}">
        <p>Business Advotises</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('functionPublishes.index') }}"
       class="nav-link {{ Request::is('functionPublishes*') ? 'active' : '' }}">
        <p>Function Publishes</p>
    </a>
</li>





