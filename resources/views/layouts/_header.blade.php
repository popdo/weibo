<nav class="navbar shadow-sm mb-5">
    <div class="nav-box">
        <a class="nav-logo mr-5 text-primary" href="{{ route('home') }}" title="Weibo App" style="font-size:36px">
            <span class="iconfont">&#xe615;</span>
        </a>
        <!-- .nav添加 .nav-sm 既为自适应模式 -->
        
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">首页</a></li>
            <li class="nav-item">
              <a class="nav-link" href="http://">
                <span class="icon text-danger"><svg class="svg-inline--fa fa-heart fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg></span>
                <span>发现</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://">
                    <span class="icon text-success"><svg class="svg-inline--fa fa-play-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="play-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z"></path></svg></span>
                    <span>视频</span>
                </a>
            </li>
        </ul>

        <ul class="nav nav-right">
            @if (Auth::check())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                  <span class="icon text-warning">
                      <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                  </span>
                  <span>用户列表</span>
                </a>
              </li>
              <li class="nav-item has-dropdown not-arrow border-left">
                  <a class="nav-link user-card is-sm" href="{{ route('users.show', Auth::user()) }}">
                      <span class="u-face"><img src="{{ Auth::user()->gravatar(100) }}" width="36" height="36" class="o"></span>
                      <div class="u-info">
                          <span class="level">管理员</span>
                          <span class="name">{{ Auth::user()->name }}</span>
                      </div>
                      <!-- <span class="sr-only1">(current)</span> -->
                  </a>
                <ul class="snav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.show', Auth::user()) }}">个人中心</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.edit',Auth::user()) }}">编辑资料</a>
                  </li>
                  <li class="nav-item">
                      <form class="nav-link is-full" action="{{ route('logout') }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn is-sm is-full" type="submit" name="button">退出</button>
                        </form>
                  </li>
                </ul>
              </li>
            @else
              <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">帮助</a></li>
              <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">登录</a></li>
              <li class="nav-item" ><a class="nav-link" href="{{ route('signup') }}">注册</a></li>
            @endif
          </ul>
    </div>
</nav>
