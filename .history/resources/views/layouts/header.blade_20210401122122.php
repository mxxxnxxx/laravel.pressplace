
@section('header')
<header>
    
    <div id="header">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    PressPlace
                </a>

                <div class="text-center">
                    <a href={{ route('serch') }} class="text-center">検索</a>
                </div>
                
                {{--  新規投稿ボタン  --}}
                @auth
                <div class="text-center">
                    <a href={{ route('place.new') }}  >新しいお店</a>
                </div>
                @endauth
                

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{--  ログインしていない時のみ --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        {{--  以下がログインしている時のみ  --}}
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                {{--  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">  --}}
                                    
                                    {{--  マイページへのリンク  --}}
                                    <a class="dropdown-item" href={{ route('user.show',['user' => auth()->user()->id]) }}>
                                        マイページ
                                    </a>

                                    {{--  ログアウトのリンク  --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    
                                    {{--  以下が実際ログアウトさせている記述  --}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                {{--  </div>  --}}
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
@endsection