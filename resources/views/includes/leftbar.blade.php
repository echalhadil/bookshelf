<div class="col-2 mt-3 text-center uk-visible@m ">
    
    <!--auth -->
    <div  class="col-12">
        @guest
        <a v-if='!auth' class="mt-3" href="{{route('auth')}}">
            <button class="btn text-white col-12 mt-3 login-button">Login</button>
        </a>
        <a v-if='!auth' class="mt-3" href="{{route('register')}}">
            <button class="btn bg-white col-12 mt-3 signup-button" >Sign Up</button>
        </a>
        
        @endguest

        @auth
        <div v-if='auth' class='mt-3 ' >
            @if(Auth::user()->picture == '')
                <img src="{{asset('img/profile/marc.jpg')}}" class="profile-picture">
            @else
                <img src="{{Auth::user()->picture}}" class="profile-picture">
            @endif

            <h5 class="mt-1">{{ Auth::user()->firstname }} {{  Auth::user()->lastname }}</h5>
        <form  class="p-0 m-0" method="POST" action="{{ route('logout') }}">
            @csrf 
                <button id='logout'  class="btn bg-white col-12 mt-2 signup-button" >Logout</button>
            </form> 
        </div>
        @endauth

    </div>
    <!---->

    <h6 class="text-black-50 text-left ml-4 font-weight-bolder ">
        DISCOVER
    </h6>
    <?php $title = $title ?? $book->title ?? ''; ?>
    <ul class=" col-12 list-unstyled mt-3 p-0 text-sm-left ">
        <li class="mt-3">
            <a class="p-0 m-0 text-decoration-none" href="/">
                <button class="btn @if($title  == 'Home') bg-light @else bg-white @endif  col-12 font-weight-bolder text-left left-button"  >
                    <i class="mdi  ml-2 mr-3 float-left @if($title  == 'Home') primary-Color mdi-home @else mdi-home-outline @endif "></i>Home 
                </button>
            </a>  
        </li>
        <li  class="mt-3">
            <a class="p-0 m-0 text-decoration-none" href="/allbooks">
                <button class="btn @if($title   == 'books' || $title =='') bg-light @else bg-white @endif  col-12 font-weight-bolder text-left left-button"  >
                    <i class="mdi  ml-2 mr-3 float-left @if($title  == 'books' || $title =='') primary-Color mdi-compass @else mdi-compass-outline @endif "></i>Explore
                </button>
            </a>
        </li>
        <li  class="mt-3"> 
            <a class="p-0 m-0 text-decoration-none" href="/profile">
                <button class="btn @if($title  == 'Profile') bg-light @else bg-white @endif  col-12 font-weight-bolder text-left left-button"  >
                    <i class="mdi  ml-2 mr-3 float-left  @if($title  == 'Profile') primary-Color  mdi-account @else  mdi-account-outline @endif "></i> Profile
                </button>
            </a>
        </li>
    </ul>
    @auth
    <h6 class="text-black-50 text-left ml-4 font-weight-bolder ">LIBRARY</h6>
    <ul class=" col-12 list-unstyled text-left mt-3 p-0 ">
        <li class="mt-3">
            <a class="p-0 m-0 text-decoration-none" href="/posts">
                <button class=" @if($title     == 'Add' || $title  == 'My Books') bg-light @else bg-white @endif btn col-12 font-weight-bolder text-left left-button"  >
                    <i class="mdi  ml-2 mr-3 float-left @if($title  == 'Add' || $title  == 'My Books') primary-Color mdi-book @else mdi-book-outline @endif "></i>your books 
                </button> 
            </a>
        </li>
        <li  class="mt-3">
            <a class="p-0 m-0 text-decoration-none" href="/favorite">
                <button class="@if($title     == 'favorite') bg-light @else bg-white @endif btn col-12 font-weight-bolder text-left left-button"  >
                    <i class="mdi  ml-2 mr-3 float-left  @if($title  == 'favorite') mdi-heart red @else mdi-heart-outline @endif "></i>Favorits
                </button>
            </a>
        </li>
                
    </ul>
    @endauth
    <div id='auth' class='col-2 fixed-bottom float-left mb-4'>
        @if (Auth::check())
        <a href='/addbook'  > 
        @else
        <a href='auth'>
        @endif
            <button class="btn bg-primary text-white col-9 ml-4 mt-3 left-button" >
                    <i class="mdi mdi-plus-circle ml-2 float-left"></i> Add Book
            </button>
          
        </a>
        
    </div>

    
    
</div>

