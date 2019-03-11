<nav class="navbar">
                <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                  <a class="navbar-brand" href="{{ route('jobs.latest') }}"><div class="blockblue"></div>JOBIFY</a>
                </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('jobs.all') }}">@lang('messages.jobs')</a>
        </li>
        @if(!Auth::guard('joobseeker')->check() && !Auth::guard('company')->check())
          <li>
            <a href="{{ route('signin') }}">@lang('messages.login')</a>
          </li>
          <li>
            <a href="{{ route('signup') }}" class="signup">@lang('messages.signup')</a>
          </li>
        @endif
        @auth('joobseeker')
        <li class="dropdown">
          <a href="" class="dropdown-toggle signup" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::guard('joobseeker')->user()->first_name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('user.profile') }}">@lang('messages.profile')</a></li>
            <li><a href="{{ route('user.applications') }}">@lang('messages.applications')</a></li>
            <li><a href="{{ route('user.logout') }}">@lang('messages.logout')</a></li>
          </ul>
        </li>
        @endauth
        @auth('company')
        <li>
          <a href="{{ route('company.job') }}">@lang('messages.postJob')</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle signup" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::guard('company')->user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="{{ route('company.profile') }}">@lang('messages.profile')</a></li>
            <li><a href="{{ route('company.applications') }}">@lang('messages.applications')</a></li>
            <li><a href="{{ route('company.logout') }}">@lang('messages.logout')</a></li>
          </ul>
        </li>
        @endauth
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
