<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{asset('softemp/images/temp/panel/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Auth::user()->username }}</span>
    </a>
    <ul class="dropdown-menu">
        {{-- User image --}}
        <li class="user-header">
            <img src="{{asset('softemp/images/temp/panel/img/user2-160x160.jpg')}}" class="img-circle"
                 alt="User Image">

            <p>
                {{ Auth::user()->physical->name }} - Web Developer
                <small>Member since Nov. 2012</small>
            </p>
        </li>
        {{-- Menu Body --}}
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            {{-- /.row --}}
        </li>
        {{-- Menu Footer --}}
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-default btn-flat" href="{{ route('panel.auth.logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Sair') }}
                </a>

                <form id="logout-form" action="{{ route('panel.auth.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</li>