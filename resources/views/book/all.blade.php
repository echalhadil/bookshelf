@extends('layouts.app')

@section('content')
    <!--Center-->
    <div id='books' class="col-12 col-lg-10 pr-0 mt-5 mr-0">
       
        <div class="col-12 d-flex">

            <ul class="d-flex col-3 list-unstyled">  
                <li class="col-3  p-0"><button  @click="according('title')" :class="{ 'btn':true,  'bg-light ':!(according_to =='title') , 'btn-primary':(according_to =='title')}"> <i class="mdi mdi-alpha-a-box-outline "></i> </button></li>
                <li class="col-3  p-0"><button @click="according('review')" :class="{ 'btn':true,  'bg-light ':!(according_to =='review') , 'btn-primary':(according_to =='review')}"> <i class="mdi mdi-star"></i></button> </li>
                <li class="col-3  p-0"><button @click="according('read')" :class="{ 'btn':true,  'bg-light ':!(according_to =='read') , 'btn-primary':(according_to =='read')}"> <i class="mdi mdi-eye"></i> </button></li>
                <li class="col-3 p-0"><button @click="according('download')" :class="{ 'btn':true,  'bg-light ':!(according_to =='download') , 'btn-primary':(according_to =='download')}"> <i class="mdi mdi-download "></i> </button></li>

            </ul>

            <ul class="d-flex col-2 m-0 list-unstyled">  
                <li class="col-5 p-0"><button @click="order_type('asc')" :class="{ 'btn':true,  'bg-light ':!(order =='asc') , 'btn-primary':(order =='asc')}"><i class="mdi mdi-sort-ascending"></i></button> </li>
                <li class="col-5 p-0"><button @click="order_type('desc')" :class="{ 'btn':true,  'bg-light ':!(order =='desc') , 'btn-primary':(order =='desc')}"><i class=" mdi mdi-sort-descending "></i></button></li>
            </ul>

            <ul class="d-flex col-3 mt-1 list-unstyled">
            </ul>

            <ul class="d-flex col-2 m-0 list-unstyled">
            </ul>
            

            <ul class="col-2 p-0 m-0 uk-visible@m  ml-auto mr-2 d-flex list-unstyled" >
                <li class="col-3 p-0"> <button  @click="prev" class="btn btn-sm mr-1 font-weight-bolder slide-button" ><</button> </li>
                <li class="col-4 mt-1 p-0">@{{current_page}} / @{{last_page}}</li>
                <li class="col-3 p-0"> <button  @click="next" class="btn btn-sm  ml-1 font-weight-bolder slide-button">></button> </li>
            </ul>
            

            


        </div>
        <div class="col-12 ">       
                    <!-- All Books -->

                    <h4 class=" font-weight-bolder col-12  float-left mb-3 " >All Books (@{{total}})</h4>
                    <div v-if='waiting'  class="c col-2 mt-5 pt-5 ml-auto mr-auto">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div v-else='waiting' class="col-12 p-0 m-0  ">

                        <div v-for='book in books' class="col-12 col-lg-4 float-left p-0 m-0 mb-3 pr-1">
                            <!--book-->
                        
                            <div class="col-12 d-flex p-0 pt-lg-1  mb-0 mb-lg-2" >
                                <div class="col-4 col-lg-4 p-0" >
                                    <a v-bind:href="'book/'+book.id" >
                                        <img  :src="book.picture" class="allbooks-pic">
                                    </a>
                                </div>
                                
                                <!--Details for disktop version -->
                                <div class="col-8 col-lg-8 pr-0 pl-2 mt-2 uk-visible@m ">
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
    </div>
    <!---->

    
<script>
        // to get all books
        new Vue(
            {
                el:'#books',
                data:{
                    waiting:true,
                    //Data
                    books:[],
                    genres:[],

                    //Rating
                    maxStars:5,

                    //Pagination
                    current_page:'',
                    first_page_url:'',
                    from:'',
                    last_page: '',
                    last_page_url:'',
                    next_page_url:'',
                    path:'',
                    per_page: '',
                    prev_page_url:'',  
                    to:'',
                    total:'',
                    //Order
                    order:'asc',
                    according_to:'title', 
                },
                methods: {

                    order_By:function(data,according_to,order){
                        return _.orderBy(data,according_to,order);
                    },
                    getbooks:function(url){
                        this.waiting = true;
                        axios.get(url)
                        .then( response => {

                            this.books = this.order_By(response.data.data,this.according_to,this.order);
                            this.current_page=response.data.current_page,
                            this.first_page_url=response.data.first_page_url,
                            this.from=response.data.from,
                            this.last_page=response.data.last_page,
                            this.last_page_url=response.data.last_page_url,
                            this.next_page_url=response.data.next_page_url,
                            this.path=response.data.path,
                            this.prev_page_url=response.data.prev_page_url,
                            this.total = response.data.total,

                             console.log('All success :',response);
                             this.waiting = false; 
                            } )
                        .catch( error => {  console.log('error : ',error) } )
                    },
                    next :function (){
                        this.getbooks(this.next_page_url);
                    },
                    prev :function (){
                        this.getbooks(this.prev_page_url)
                    },
                    getGenres : function(){
                        axios.get('/genres')
                        .then( response => { this.genres = response.data; console.log((this.according_to =='title')); console.log('Genres success :',response)  } )
                        .catch( error => { console.log('error : ',error) } )
                    },
                    order_type: function(string){
                        this.order = string;
                        console.log(this.order);

                        this.books = this.order_By(this.books,this.according_to,this.order);
                        
                    },
                    according:function(string)
                    {
                        this.according_to = string;
                        console.log(this.according_to);
                        this.books = this.order_By(this.books,this.according_to,this.order);
                    }
                    
                },    
                mounted:function() {
                    this.getbooks('/books');
                    this.getGenres();
                    
                }
            }
        );
        //
</script>
@endsection