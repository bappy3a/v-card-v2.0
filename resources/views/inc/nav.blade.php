<li class="menu-title">Navigation</li>
<li>
    <a href="{{ route('home') }}"  class="{{ Request::is('home') ? 'active' : '' }}">
        <i class="ion-md-speedometer"></i>  Dashboard
    </a>
</li>
<li>
    <a href="{{ route('card.index') }}"  class="{{ Request::is('card*')  ? 'active' : ''}}">
        <i class="ion-md-card"></i>  All Business Card List
    </a>
</li>
<li>
    <a href="{{ route('profile') }}"  class="{{ Request::is('profile*') ? 'active' : '' }}">
        <i class="ion ion-ios-contact"></i>  Profile
    </a>
</li>