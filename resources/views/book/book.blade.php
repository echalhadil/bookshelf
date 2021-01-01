@extends('layouts.app')

@section('content')

    <section id='book'  class="p-0 col-10 m-0">
        <div class="d-flex col-12">
            
            <div class="col-12 text-center pt-4 pb-4 pb-0 colored-background "  >
                <div class="col-10 d-flex text-white m-auto font-weight-bold uk-hidden@m" >
                    <a href="../">
                        <p class=" mr-auto text-white " style="font-size: larger;" >
                        <i class="mdi mdi-arrow-left" ></i>
                        </p>
                    </a>
                    <p class=" ml-auto " style="font-size: larger;">
                        <i class="mdi mdi-dots-horizontal" >
                        </i>
                    </p>

                </div>
                <!--  Picture description  -->
                <div class="col-12 d-flex">

                    <div class=" col-3 m-0 " >
                    <img  class="col-12 p-0 m-0 w-100 shadow" :src="'http://localhost:8000/'+book.picture" style="border-radius: 10px;height: 360px;">
                        <div class=" mt-2 uk-visible@m ">
                            <a :href="'http://localhost:8000/read/'+book.id" class=" alert-link " >
                                <button class="btn btn-primary col-2 p-1 " style="border-radius:50%;" >
                                    <i class="mdi  mdi-eye" ></i> 
                                </button>
                             </a>
                            <a :href="'http://localhost:8000/'+book.pdf" role='button' @click='download'  > 
                                <button class="btn btn-success col-2 p-1 " style="border-radius:50%;" >
                                     <i class="mdi  mdi-download" ></i>
                                </button>
                            </a>  
                        </div>
                    </div>

                    <div class=" col-9 text-white text-left mt-3 mb-5 mb-0" >
                        <h3 class="font-weight-bolder col-11 mb-0 float-left p-0" > @{{ book.title }}</h3>
                        <i role="button" @click="save" :class="{'mdi col-1 float-left save':true,'mdi-heart':saved ,'mdi-heart-outline':!saved}" ></i>
                        <h5 class="mt-1 text-black-50 mb-1 col-12 p-0 float-left " > @{{ book.author }} </h5>
                        <p  class=" col-4 p-0 mt-0 text-center d-flex uk-visible@m ">
                            <i 
                            v-for="star in maxStars" 
                            :class="star <= book.review ? 'mdi mdi-star star' : 'mdi mdi-star-outline star'"
                            >
                            </i> 
                            
                            <i class="text-dark text-sm-left ml-1 ">(@{{ book.review }})</i>
                              
                        </p>
                        
                        

                        <ul class=" list-unstyled m-0 p-0 col-12 uk-visible@m" >

                            <li class=" col-4 p-0 text-center d-flex text-dark" >
                                <i class="mdi mdi-download mr-1 primary-Color"  ></i> 
                                 @{{book.download}} Downloads 
                            </li>
                        
                            <li class="col-4 p-0 text-center d-flex text-dark">

                                <i class=" mdi mdi-eye-outline mr-1 primary-Color"></i>
                                @{{book.read }} Reads
                                
                            </li>
                        </ul>

                        <h5 class="uk-visible@m m-0 p-0 col-12 mt-3">
                            @{{book.description}}
                        </h5>

                        <div class="col-12 d-flex p-0 uk-visible@m">
                            <!--Genres-->
                            <ul  class=" list-unstyled p-0 mt-2 col-8 d-flex  " >
                            <!--Genres-->

                                <li v-for="genre in genres" class=" col-4  text-center p-0 ml-1   genre" >
                                    <h6 class="p-0 m-1">@{{ genre.name }} </h6> 
                                </li>
                        
                            </ul>
                            <!---->

                            <!-- Rate this  -->
                            <div class="col-4 p-0 mt-2 d-flex">
                                <ul class="col-12 p-0 d-flex list-unstyled ">
                                  <li @click="rate(star)" v-for="star in maxStars" :class="{ 'active': star <= stars,'p-1 m-0 col-1':true }" :key="star.stars">
                                  <i :class="star <= stars ? 'mdi mdi-star star' : 'mdi mdi-star-outline star'"></i> 
                                  </li>
                                  <li class="col-2" ></li>
                                <button v-if='stars' @click="review" class="btn btn-xs btn-light col-4 p-0 btn-disabled nv-disabled star ">Submit</button>
                                </ul>
                            </div>
                           	
                            <!---->
                        </div>
                        
                    </div>

                </div>
                <!--  -->

                <!--  Related Books  -->
                <hr  style="color:#009688" class=" uk-hr uk-visible@m">
                <div class="col-12 uk-visible@m">
                    <h4 class="text-left " > Related Books </h4>


                    <div  class="col-12 p-0 m-0 float-left ">
                        <div v-for='book in relatedbooks' class=" col-3 float-left p-0 m-0 mb-3 pr-1">
                            <!--book-->
                           
                            <div class="col-12 d-flex p-0 pt-1  mb-0 mb-2" >
                                <div class="col-5 p-0" >
                                    <a v-bind:href="'../book/'+book.id" >
                                        <img  :src="'../'+book.picture" alt="" class=' allbooks-pic '>
                                    </a>
                                </div>
                                
                                <!--Details for disktop version -->
                                <div class="col-7 pr-0 pl-2 mt-2 text-left uk-visible@m ">
                                    <div class="col-12 p-0 m-0" style="color:#ff6352; font-size: 12px;">
                                        <i 
                                        v-for="star in maxStars" 
                                        :class="star <= book.review ? 'mdi mdi-star star' : 'mdi mdi-star-outline star'"
                                        >
                                        </i>
                                        
                                    </div>
                                    <h6 class=" font-weight-bolder m-0" > @{{  book.title  }} </h6>
                                    <h6 class="m-0 primary-Color" > @{{  book.author  }} </h6>                                
                                    <h6 class="m-0 p-0 mt-2">
                                        <i class="mdi mdi-eye primary-Color" ></i> @{{  book.read  }}
                                    </h6>
                    
                                    <h6 class="m-0 p-0">
                                        <i class=" mdi mdi-download primary-Color"></i> @{{  book.download  }} 
                                    </h6>
                                </div>
                                <!---->
                            
                            </div>
                                
                        </div>
                        <!---->
                    </div>



                </div>

                <!-- -->



                <div  class="col-12 uk-hidden@m text-white">
                    <ul class=" list-unstyled  col-12 d-flex " >
                        <li class=" col-4  text-center ml-auto " >

                            <i class="mdi mdi-download " style="color: #82d19d;" ></i>@{{ book.download }}
                            <h6 class=" text-sm-center mt-1 text-white-50">
                                Downloads 
                            </h6>

                        </li>
                        
                        <li  class=" col-4  text-center  ml-auto mr-auto ">

                            <i class=" mdi mdi-star " style="color: orange;" ></i> @{{ book.rating }}
                            <h6 class=" text-sm-center mt-1 text-white-50">
                                Average Rating
                            </h6>

                        </li>

                        <li class="col-4 text-center mr-auto">

                            <i class=" mdi mdi-eye-outline " style="color: aqua;"></i> @{{ book.read }} 
                            <h6  class=" text-sm-center mt-1 text-white-50">
                                Total Readers 
                            </h6>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    <!--picture + title + Author + rating-->
      
<!---->


        <div  class="col-10 pt-3 m-auto uk-hidden@m " >
            <!-- Description  -->
            <div  class="pl-3 description" >
                <h6>
                    Description
                </h6>
                <p >
                @{{ book.description }}
                </p>
            
                
            </div>
            <!---->
            <!--Genres-->
            <ul  class=" list-unstyled mt-2 d-flex " >

                <li v-for="genre in genres" class=" col-3  text-center p-0 ml-auto mr-auto  genre" >
                    <h6 class="p-0 m-1">@{{ genre.genre_id }} </h6> 
                </li>
                
            </ul>
            <!---->

        </div>
    </section>

    <!--Option-->
    <section class="col-10 pt-3 ml-auto mr-auto mb-5 pb-5 uk-hidden@m" >
        <hr style="color:#009688">
        <div class=" pl-3 m-auto">
        <button class="btn btn-primary col-5 mr-auto" > Read now </button>
        <a href="Read.html" role="_blank" ><button class="btn btn-success col-2 ml-auto" > <i class="mdi  mdi-download" ></i></button></a>
            
        </div>
    </section>
    <script async>

        new Vue({
            el:'#book',
            data:{
                book:'',
                relatedbooks:[],
                genres:'',
                grade:3,
                maxStars:5,
                hasCounter:true,
                stars: this.grade,    
                saved:'',            
            },
            methods: 
            {
                getBook:function()
                {
                    axios
                    .get('../getbook/{{$id}}')
                    .then(response => {console.log(response); this.book=response.data })
                    .catch(error => {console.log(error)})
                }
                ,
                issaved: function()
                {
                    axios.get('/issaved/{{$id}}')
                    .then(response => {console.log(response); this.saved=response.data })
                    .catch(error => {console.log(error);})
                }
                ,
                save: function()
                {
                    this.saved = !this.saved;
                    axios.get('/save/{{$id}}')
                    .then(response => {console.log(response); })
                    .catch(error => {console.log(error);})
                }
                ,
                getRelatedBooks:function()
                {
                    axios
                    .get('../relatedbooks/{{$id}}')
                    .then(response => {console.log(response) ; this.relatedbooks=response.data })
                    .catch(error => {console.log(error)})
                },
                getGenres:function()
                {
                    axios
                    .get('../bookGenre/{{$id}}')
                    .then(response => {console.log(response) ; this.genres=response.data })
                    .catch(error => {console.log(error)})
                },
                rate:function(star) {
                    if (typeof star === 'number' && star <= this.maxStars && star >= 0) {
                        this.stars = this.stars === star ? star - 1 : star
                    }
                },
                review:function(){
    
                    console.log(this.stars);
                    axios.post('../Review',{ 'book_id':{{$id}},'stars':this.stars},{headers: {'X-XSRF-TOKEN':window.Laravel.csrfToken}
                    })
                    .then(response => {
                        console.log(response.data) ;
                        this.book.review=response.data;
                    })
                    .catch(error=>{console.log(error)})
 
                },
                download:function(){
                    axios.get('../download/{{$id}}')
                    .then(
                        response => {console.log(response);this.book.download =+response.data; }
                    )
                    .catch(error => {console.log(error)})

                }
            },
            mounted:function() {
                this.getBook();
                this.getRelatedBooks();
                this.getGenres();
                this.rate();
                this.issaved();

            },
        });

    </script>
@endsection