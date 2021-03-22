@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/timeline.css')}}">
    <link rel="stylesheet" href="{{asset('css/owlcarousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
    <style>
        .description-item img{
            width: 100% !important;
            max-height: 495px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')

    
    <div class="w-100" id="menu-tabs">
        <ul class="sun-tab">
            <li class="sun-tab-item text-uppercase text-center"><a href="#">news</a></li>
            <li class="sun-tab-item text-uppercase text-center"><a href="#">hots</a></li>
            <li class="sun-tab-item text-uppercase text-center"><a href="#">wish list</a></li>
            <li class="sun-tab-item text-uppercase text-center"><a href="#">follow</a></li>
        </ul>
    </div>
<div class="w-100" id="slide-index">
    <div class="page-content page-container" id="page-content">
        <div class="row container-fluid">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <div class="owl-carousel">
                            <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204140/banner_12.jpg" alt="image" /> </div>
                            <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204172/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204663/park-4174278_640.jpg" alt="image" /> </div>
                            <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204172/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557204663/park-4174278_640.jpg" alt="image" /> </div>
                            <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                            <div class="item"> <img src="http://www.urbanui.com/fily/template/images/carousel/banner_2.jpg" alt="image" /> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mainpage" v-cloak>
    <div class="w-100" id="posts" v-for = "(item,index) in items">
        <div class="sub">
            <ul class="w-100 list-post">
                <li class="w-100 pb-15 border-bottom" v-for="(post,i) in items">
                    <div class="list-post-item">
                        <div class="w-25 avatar-content text-center">
                            <div class="" v-if="item.vendor.fbavatar">
                                <img v-bind:src="item.vendor.fbavatar" alt="avatar" class="avatar">
                            </div>
                            <div v-else>
                                <div class="" v-if="item.vendor.avatar">
                                    <img v-bind:src="item.vendor.avatar" alt="avatar" class="avatar" v-if="item.vendor.avatar.substring(0,4)=='http'">
                                    <img v-bind:src="imgURL + item.vendor.avatar" alt="avatar" class="avatar" v-else>
                                </div>
                                <div v-else>
                                    <img src="{{asset('img/loading.gif')}}" alt="" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="w-50">
                            <div class="">
                               @{{item.vendor.name}}
                            </div>
                            <div class=""><h4>@{{post.title}}</h4></div>
                            <div>@{{post.created_at}}</div>
                        </div>
                        <div class="w-25 arr">
                            <img src="./img/arrow-25-16.png" alt="icon" class="img-ar">
                        </div>
                    </div>
                    <div class="description-item img" style="position: relative">
                        <textarea class="form-control" style="width: 100%;border: none" name="" id="" cols="30" rows="5" disabled>@{{post.content}}</textarea>
                        <div style="width: 100%;position: absolute;z-index: 100;height: 100%;top: 0"></div>
                    </div>
                    <div class="img">
                        <img v-bind:src="basicURL+post.image" width="100%" alt="post image" style="border-radius: 10px">
                    </div>
                    {{-- <div class="w-100 text-center">
                        <p v-if="!post.liked"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
                        <p v-else><i class="fa fa-thumbs-up" aria-hidden="true"></i></p>
                    </div> --}}
                    <div class="newest-comment border-top">
                        <div v-if="post.liked==false" class="text-center like-post" @click="like(index,1)"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>
                        <div v-else class="text-center like-post" style="background-color: #f59e00"  @click="like(index,0)"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>    
                        <div class="cmt-content">
                            <div v-for="(comment,ind) in post.comments">
                                <div v-if="ind%2==0" style="background-color: #f3f3f3">
                                    <p style="font-weight: bold">
                                        <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="comment.user.fbavatar" alt="fbavatar" v-if="comment.user.fbavatar">
                                        <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="imgURL+comment.user.avatar" alt="localAvatar" v-else>
                                        @{{comment.user.name}}</p>
                                    <p>@{{comment.content}}</p>
                                </div>
                                <div v-else style="background-color: #FFF">
                                    <p style="font-weight: bold">
                                        <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="comment.user.fbavatar" alt="fbavatar" v-if="comment.user.fbavatar">
                                        <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="imgURL+comment.user.avatar" alt="localAvatar" v-else>
                                        @{{comment.user.name}}</p>
                                    <p>@{{comment.content}}</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="comment row">
                        <div class="col-md-8">
                            <input type="text" name="" id="" class="form-control p-0 m-0" v-model="comment">
                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" class="form-control btncomment" @click="sendComment(index,i)">comment</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>
@endsection
@section('vuejs')
<script src="{{mix('js/vuejs/mainpage/c-mainpage.js')}}"></script>
<script src="{{mix('js/vuejs/mainpage/s-mainpage.js')}}"></script>
@endsection