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
                <div class="col-12">
                    <h5 class="col-12" > @{{book.title}} - @{{book.author}} </h5>
                    
                {{-- <embed :src="book.pdf" type="Application/pdf"> --}}
                    <object :data="'http://localhost:8000/'+book.pdf" type="">
                        <embed  type="application/pdf" 
                        :src="'http://localhost:8000/'+book.pdf" >
                    </object>
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

    
    <script >

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
                    .get('../getbook/{{$book->id}}')
                    .then(response => {console.log(response); this.book=response.data })
                    .catch(error => {console.log(error)})
                }
                ,
                
                getRelatedBooks:function()
                {
                    axios
                    .get('../relatedbooks/{{$book->id}}')
                    .then(response => {console.log(response) ; this.relatedbooks=response.data })
                    .catch(error => {console.log(error)})
                },
                getGenres:function()
                {
                    axios
                    .get('../bookGenre/{{$book->id}}')
                    .then(response => {console.log(response) ; this.genres=response.data })
                    .catch(error => {console.log(error)})
                },
               
            },
            mounted:function() {
                this.getBook();
                this.getRelatedBooks();
                this.getGenres();

            },
        });

    </script>
@endsection