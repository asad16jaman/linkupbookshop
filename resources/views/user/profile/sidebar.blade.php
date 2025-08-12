<ul id="account-panel" class="nav nav-pills flex-column" >
    
    <li class="nav-item">
        <a href="{{ route('user.profile') }}"  class="nav-link font-weight-bold " role="tab" aria-controls="tab-login" aria-expanded="false"><i class="fas fa-user-alt"></i> My Profile({{ Auth::user()->username }})</a>
    </li>
    <li class="nav-item">
        <a href=""  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-shopping-bag"></i>My Orders</a>
    </li>
    <li class="nav-item ">
        <a href="{{ route('user.wish') }}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-heart"></i> Wishlist</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('user.changePassword') }}"  class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"><i class="fas fa-lock"></i> Change Password</a>
    </li>
    <li class="nav-item">
        <!-- <a href="" class="nav-link font-weight-bold" role="tab" aria-controls="tab-register" aria-expanded="false"></a> -->
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link font-weight-bold w-100" style="text-align:left">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
            
        </form>
    </li>
</ul>