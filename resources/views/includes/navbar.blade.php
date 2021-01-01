<nav class=" nav navbar col-12 d-flex navigate " >

    <div class=" container navbar-brand col-2 mr-0 p-0 " >
        <a class="container navbar-brand col-9 mr-0 p-0" href="/" >
            <img class='col-6' src=" {{ asset('img/logo.png') }} " alt="" srcset="">
        </a> 
    </div>

    <div class="col-4 mr-auto  text-sm-left ">
        <form action="{{route('search')}}" method="post" class="uk-search col-8">
            @csrf
            <span class=" uk-search-icon-flip text-white" uk-search-icon></span>
            <input class="uk-search-input text-white bg-transparent border-0  col-12" type="search" placeholder="Search books by name.." name="word" type="text">
        </form>
    </div>

    <div class='col-4 text right'>
        <span class="glyphicon glyphicon-menu" ></span>
    </div>
    
</nav>
