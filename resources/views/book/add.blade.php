@extends('layouts.app')

@section('content')

<div id='addbook' class="col-12 col-lg-10 text-center pt-4 pb-4 pb-lg-0 "  >
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
        <h4 class="col-12 p-0 ml-4 text-left font-weight-bolder ">Add Book </h4>
        <form class="p-0 m-0 d-lg-flex " @submit.prevent='addbook' enctype="multipart/form-data">
            <input v-for='token' value= "{{csrf_token()}}" name="_token" type="hidden">
            
            <div class=" col-4 col-lg-3 m-auto mt-lg-3 " >
                <label class=" text-left col-12 p-0" for="Picture">Picture :</label>
                <div class="image-upload uk-placeholder m-0 p-5 uk-text-center">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle text-dark"> <i class=" mdi mdi-image " ></i> Drop book picture here or</span>
                    <div uk-form-custom>
                        <input :class="{'form-control':true, 'is-invalid':errors.has('picture')}" v-on:change="onFileChange" required name="picture" type="file" accept="image/*">
                        <span class="uk-link">selecting one</span>
                    </div>
                </div>
                
                <progress id="progressbarimage" class="uk-progress"value="0" max="100" hidden></progress>
                

                
            </div>
            <div class=" col-lg-9  text-lg-left mt-3 mb-5 mb-lg-0" >

                <div class="form-group has-error" >
                    <label class="" for="title"> Title :</label>
                    <input type="text" name="title" v-validate="'required|min:3|max:30'" v-model='newBook.title' :class="{'form-control':true, 'is-invalid':errors.has('title') }" >
                    <small class=" text-danger text-small  " v-show="errors.has('title')" >@{{errors.first('title')}}</small>
                </div>
                


                <div class=" has-error form-group " >
                    <label class="" for="author"> Author :</label>
                    <input type="text" name="author" v-validate="'required|min:3|max:35'" v-model='newBook.author' :class="{'form-control':true, 'is-invalid':errors.has('author')}" required>
                    <small class=" text-danger text-small  " v-show="errors.has('author')" >@{{errors.first('author')}}</small>
                
                </div>

                <div class=" form-group " >
                    <label class="" for="Description"> Description :</label>
                    <textarea :class="{'form-control':true, 'is-invalid':errors.has('description')}" v-validate="'required|min:210'" v-model='newBook.description' name="description" required ></textarea>
                    <small class=" text-danger text-small  " v-show="errors.has('description')" >@{{errors.first('description')}}</small>
                </div>

                <div class=" form-group " >
                    <label class="" for="pdf"> PDF :</label>
                    <div class="pdf-upload uk-placeholder uk-text-center mt-0">
                        <span uk-icon="icon: cloud-upload"></span>
                        <span class="uk-text-middle text-dark"> <i class=" mdi mdi-file-pdf-box " ></i> Drop PDF file here or</span>
                        <div uk-form-custom>
                            <input :class="{'form-control':true, 'is-invalid':errors.has('pdf')}" v-on:change="onFileChange1" v-validate="'required'" name="pdf" accept="application/pdf" required type="file">
                            <span class="uk-link">selecting one</span>
                        </div>
                    </div>
                    
                    <progress id="progressbarpdf" class="uk-progress"  value="0" max="100" hidden></progress>
                    <small class=" text-danger text-small  " v-show="errors.has('pdf')" >@{{errors.first('pdf')}}</small>

                
                </div>

                <div class=" form-group " >
                    <label class="" for="Genre"> Genre :</label>
                    <multiselect name='genre'
                        v-model="newBook.genre" 
                        :options="genres" 
                        :multiple="true" 
                        track-by="id" 
                        name='genre'
                        :custom-label="customLabel" 
                        placeholder="Select Genre"
                        v-validate="'required'"
                        :class="{'is-invalid':errors.has('genre')}"
                        >
                    </multiselect>
                    <small class=" text-danger v-size--small  " v-show="errors.has('genre')" >@{{errors.first('genre')}}</small>
                </div>
            

                <div v-if='!waiting' class=" form-group">
                    <button :disabled="errors.any()" class="text-white uk-button login-button " type="submit">save</button>
                </div>
                
            </div>
            
        </form>

        <div v-if='waiting' uk-spinner="ratio: 3"></div>
        
        <div v-if="success" class='uk-alert-success text-center' uk-alert>
            <p>Your Book has been published .</p> 
        </div>
        
        <div v-if="warning" class='uk-alert-warning text-center' uk-alert>
            <p>Warning , Inknown probleme .</p> 
        </div>
    </div>
    <!--  -->
    <hr >
    <!-- My Books -->
    <div v-if='mybooks' class=" col-12  float-left d-flex">
        <div class=" col-12 p-0 m-0 mt-2 pb-5 mb-5">
            <h4 class=" font-weight-bolder col-12 text-left float-left mb-3 " >My Books</h4>
        
            <div class="col-12 p-0 m-0 float-left ">
                <div v-for='book in mybooks' class="col-12 col-lg-3 float-left p-0 m-0 mb-3 pr-1" style="height: 150px;">
                    <!--book-->
                
                    <div class="col-12 d-flex p-0 pt-lg-1 text-left mb-0 mb-lg-2" >
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
                        
                        <!--Details for smartphone version -->
                        <div  class='col-8 pr-0 mt-3 uk-hidden@m'>
                            <h5 class='m-0 mt-4 font-weight-bolder' >
                            @{{ book.title }}
                            </h5>
                            <h6 class="m-0 text-black-50 " >
                            @{{  book.author  }}
                            </h6>
                    
                            <ul class=" list-unstyled mt-3 d-flex " >
                                <li class=" col-4 text-white text-center p-0 " style="background: #82d19d; padding: 0 5px ; border-radius: 10px;">
                                <i class=" mdi mdi-download " style="color: white;" ></i>
                                @{{  book.download  }} 
                                </li>
                                <li  class=" col-4  text-center  ml-auto mr-auto ">
                                    <i class=" mdi mdi-star " style="color: gold;" ></i>
                                    @{{  book.review  }} 
                                </li>
                                <li class="col-4 text-center mr-auto">
                                    <i class="mdi mdi-eye-outline" style="color: aqua;" ></i> @{{  book.read  }} 
                                </li>
                            </ul>

                            
                        </div>
                        <!---->
                
                    </div>
                        
                </div>
                <!---->
            </div>
        </div>
    </div>
    <!---->

</div>
<script async>
   
    
    Vue.use(VeeValidate);
    new Vue({
         el:'#addbook',
         components: {
            Multiselect: window.VueMultiselect.default,
        },     
        data:{
            newBook:{
                title:'',
                author:'',
                description:'',
                picture:'',
                pdf:'',
                genre:'',
            },
            mybooks:'',
            genres:[],
            success:false,
            waiting:false,
            warning:false,
            maxStars:5,
        },
        methods: {
            allgenres:function() {
                axios.get(window.Laravel.url+'/genres')
                .then(response =>{console.log('genres : ',response); this.genres=response.data;})
                .catch(error =>{console.log(error)})
            },
            getmybooks :function () {
                axios.get(window.Laravel.url+'/mybooks')
                        .then( response => { this.mybooks = response.data; console.log('mybooks success :',response) } )
                        .catch( error => {  console.log('error : ',error) } )
            },  
            onFileChange(e){
                console.log(e.target.files[0]);
                this.newBook.picture = e.target.files[0];
            },
            onFileChange1(e){
                console.log(e.target.files[0]);
                this.newBook.pdf = e.target.files[0];
            },
            addbook:function() {

                var formData = new FormData();
                formData.set('title', this.newBook.title);
                formData.set('author', this.newBook.author);
                formData.set('description', this.newBook.description);
                formData.set('genre', this.newBook.genre);
                formData.append('picture', this.newBook.picture);
                formData.append('pdf', this.newBook.pdf);
               
                this.waiting = true; 
                axios.post(window.Laravel.url+'/add',formData , 
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-XSRF-TOKEN':window.Laravel.csrfToken
                    }
                })
                    .then(response =>
                    { console.log(response);
                        this.errors.clear();
                        this.mybooks.push(response.data);
                        this.newBook={
                                title:'',
                                author:'',
                                description:'',
                                picture:'',
                                pdf:'',
                                genre:'',
                        }
                        this.waiting = false;
                        this.success = true; 
                        

                    })
                    .catch(error =>{
                        console.log(error);
                        this.waiting = false
                        this.warning =true;
                    })
            },
            customLabel :function(genres) {
                return `${genres.name}`
            }

        },
        mounted:function(){
            this.allgenres();
            this.getmybooks();
            
        }
    });

</script>


@endsection