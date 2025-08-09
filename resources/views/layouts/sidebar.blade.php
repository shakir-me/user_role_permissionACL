           <header class="main-header navbar">
                <div class="col-search">
                   
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                       
                       
                        
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{asset('backend/assets/imgs/people/avatar-2.png')}}" alt="User" /></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            
                                <div class="dropdown-divider"></div>

                                
                                <a class="dropdown-item text-danger" href="#" onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="material-icons md-exit_to_app"></i>Logout
</a>
<form id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
    @csrf
</form>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>