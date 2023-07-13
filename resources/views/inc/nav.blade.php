 <div class="container">
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
         <div class="container-fluid">
             <a class="navbar-brand" href="#">Navbar</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
                 aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                 <ul class="navbar-nav me-auto">
                     <li class="nav-item">
                         <a class="nav-link" href="#">매입</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">매출</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">기간조회</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             통계
                         </a>
                         <ul class="dropdown-menu dropdown-menu-dark">
                             <li>
                                 <a class="dropdown-item" href="#">Best 제품</a>
                             </li>
                             <li>
                                 <a class="dropdown-item" href="#">월별제품별현황</a>
                             </li>
                             <li>
                                 <a class="dropdown-item" href="#">종류별분포도</a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                             aria-expanded="false">
                             기초정보
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li>
                                 <a class="dropdown-item" href="{{ route('gubun.index') }}">구분</a>
                             </li>
                             <li>
                                 <a class="dropdown-item" href="{{ route('product.index') }}">제품</a>
                             </li>
                             <li>
                                 <a class="dropdown-item" href="{{ route('member.index') }}">사용자</a>
                             </li>
                         </ul>
                     </li>
                 </ul>
                 <a class="btn btn-sm btn-outline-secondary btn-dark" href="#">로그인</a>
             </div>
         </div>
     </nav>
     <br />
