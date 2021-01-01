@extends('layouts.app')

@section('content')
    <!--Center-->
    <div id="app" class="col-12 col-lg-10 pr-0 mr-0">
        
        <div class="col-12  pt-2 d-flex mb-3">
            <h4 class="col-10 p-0 m-0 font-weight-bolder ">Recent Books </h4>
            <ul class="col-2 p-0 m-0 uk-visible@m  d-flex list-unstyled" >
                <li> <button class="btn btn-sm mr-1 font-weight-bolder slide-button"><</button> </li>
                <li> <button class="btn btn-sm  ml-1 font-weight-bolder slide-button">></button> </li>
            </ul>
        </div>

        <!--Recent Books-->
        <div class="col-12 d-flex mb-5 ">
            
            <!--book-->
            <div v-for='book in recentbooks' class="col-5 mr-2 mr-lg-3 text-white p-0 p-lg-auto book-background book-background " >

                <div class="col-12 d-flex p-0 p-0 m-0 pt-lg-1 mb-lg-2  " >
                    <div class="col-lg-5 col-md-12 p-0 p-lg-1 " >
                        <a v-bind:href="'book/'+book.id" >
                            <img class="w-100 h-sm-100 shadow-lg  m-0 m-lg-2 w-100 recent-book " :src="book.picture">
                        </a>
                    </div>
                    
                    <div class='col-lg-7 col-md-0 pr-0 uk-visible@m'>

                        <div class="col-12 p-0 mt-5 mb-2 recent-stars">
                            <i 
                                v-for="star in maxStars" 
                                :class="star <= book.review ? 'mdi mdi-star ' : 'mdi mdi-star-outline '"
                            >
                            </i>
                            
                        </div>
                        <h3  class="  mt-1 mb-0 text-white font-weight-bolder"> @{{  book.title  }} </h3>
                        <p class="m-0 text-white-50" > @{{  book.author  }} </p>
                        
                        <ul class="list-unstyled d-flex col-12 pl-0" >
                            <li class='col-6 p-0 mr-1' > 
                                <button class="btn bg-white w-100 p-1 recent-button">
                                    <i class="mdi mdi-eye primary-Color" ></i> @{{  book.read  }}
                                </button> 
                            </li>
                            <li  class='col-6 p-0'>
                                <button class="btn bg-white w-100 p-1 recent-button" >
                                    <i class="mdi mdi-download primary-Color" ></i> @{{  book.download  }}
                                </button> 
                            </li>
                        </ul>

                    </div>
                    
                </div>
            </div>
            <!---->

        </div>
        <!---->
        
        <div class="col-12  d-flex">

            <!-- All Books -->
            <div  class="col-12 p-0 m-0 float-left d-flex">
                <div class=" col-12 col-lg-9 p-0 m-0 mt-2 pb-5 mb-5">
                    <h4 class=" font-weight-bolder col-8  float-left mb-3 " >All Books</h4>
                    <a class="  uk-text-small float-right text-right mb-3 col-3 " href="/allbooks"> View More </a>

                    <div class="col-12 p-0 m-0 float-left ">
                        <div v-for='book in books' class="col-12 col-lg-4 float-left p-0 m-0 mb-3 pr-1" style="height: 150px;">
                            <!--book-->
                        
                            <div class="col-12 d-flex p-0 pt-lg-1  mb-0 mb-lg-2" >
                                <div class="col-4 col-lg-5 p-0" >
                                    <a v-bind:href="'book/'+book.id" >
                                        <img  :src="book.picture" class="allbooks-pic">
                                    </a>
                                </div>
                                
                                <!--Details for disktop version -->
                                <div class="col-8 col-lg-7 pr-0 pl-2 mt-2 uk-visible@m ">
                                    <div class="col-12 p-0 m-0" style="color:#ff6352; font-size: 12px;">
                                        <i 
                                        v-for="star in maxStars" 
                                        :class="star <= book.review ? 'mdi mdi-star star' : 'mdi mdi-star-outline star'"
                                        >
                                        </i>  
                                    </div>
                                    <h6 class=" font-weight-bolder m-0" > @{{  book.title  }} </h6>
                                    <h6 class="m-0 primary-Color"> @{{  book.author  }} </h6>                                
                                    <h6 class="m-0 p-0 mt-2">
                                        <i class="mdi mdi-eye primary-Color"  ></i> @{{ book.read  }}
                                    </h6>
                    
                                    <h6 class="m-0 p-0">
                                        <i class=" mdi mdi-download primary-Color " ></i> @{{ book.download  }} 
                                    </h6>
                                </div>
                                <!---->
                                
                            </div>
                                
                        </div>
                        <!---->
                    </div>
            </div>
            <!---->

            <!--Genres-->
            <div  class=" col-0 col-lg-3 mt-2 mb-5 pr-0 uk-visible@m ">
                <h5 class=" font-weight-bolder mb-4" >Genres</h4>
                    <div class="col-12" style="background: #f4f6f8; border-radius: 20px;">
                        <ul class="list-unstyled p-0 m-0 pt-3 pb-3" >

                            <li v-for='genre in genres' class="col-12 p-0 m-0 mb-1 ">
                                <a class='d-flex text-decoration-none p-0 m-0' href="">    
                                    <div class="col-2 p-0 m-0 mt-1">
                                        {{-- <img class="w-100 shadow-sm " style="border-radius: 5px;" src="img/book7.jpg" alt="" srcset=""> --}}
                                    </div>
                                    <div class="col-9 p-1">
                                        <p class="mb-0 text-dark " style="font-size: 12px;">@{{  genre.name  }}</p>
                                        <p class="mt-0" style="font-size: 10px; color:#2196F3;"> @{{genre.number}} </p>
                                        
                                    </div>
                                    <div class="m-auto">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-12 p-0 m-0 mb-1 ">
                                <button><p class="mb-0 text-dark text-center" style="font-size: 12px;" >View More</p>
                            </li >
                            
                            
                        </ul>
                    </div>
                    
            </div>
            <!---->

        </div>

    </div>
    <!---->

<script async>

     //to get  Data
     new Vue(
            {
                el:'#app',
                data:{
                    recentbooks:[],
                    books:[],
                    genres:'',
                    maxStars:5,
                    next_page_url:'',
                },
                methods: {
                    getRecents : function (){
                        axios.get('/recent')
                        .then(response => {
                            this.recentbooks = response.data
                            console.log('Recent success :',response)
                        } )
                        .catch(error =>{
                            console.log('error : ',error)
                        } )
                    },
                    getAll : function (){
                        axios.get('/all')
                        .then( response => { this.books = response.data; console.log('All success :',response) } )
                        .catch( error => {  console.log('error : ',error) } )
                    },
                    getGenres : function(){
                        axios.get('/genres')
                        .then( response => {
                            this.genres = response.data ;
                            console.log('Genres success :',response);
                        } )
                        .catch( error => { console.log('error : ',error) } )
                    },
                    
                },    
                mounted : function() {
                    this.getRecents();
                    this.getAll();
                    this.getGenres();      
                }
            }
    );
        
</script>

@endsection

