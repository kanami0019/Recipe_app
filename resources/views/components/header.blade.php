<header class="navbar navbar-expand-lg navbar-light bg-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}" >ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">設定</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">お問い合わせ</a>
      </li>
    </ul>
    </div>

</header>