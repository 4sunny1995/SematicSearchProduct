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
    <div class="w-100" id="posts">
        <div class="sub">
            <ul class="w-100 list-post">
                <li class="w-100 pb-15 border-bottom" v-for="(post,index) in items">
                    <div class="list-post-item">
                        <div class="w-25 avatar-content text-center">
                            <div class="" v-if="post.avatar">
                                <img v-bind:src="post.avatar.avatar" alt="avatar" class="avatar">
                            </div>
                            <div v-else>
                                <div class="" v-if="post.avatar">
                                    <img v-bind:src="post.avatar.avatar" alt="avatar" class="avatar" v-if="post.vendor.avatar.substring(0,4)=='http'">
                                    <img v-bind:src="imgURL + post.avatar.avatar" alt="avatar" class="avatar" v-else>
                                </div>
                                <div v-else>
                                    <img src="{{asset('img/loading.gif')}}" alt="" width="100%">
                                </div>
                            </div>
                        </div>
                        <div class="w-50" style="padding: 15px">
                            <div class="">
                               @{{post.vendor.name}}
                            </div>
                            <div class=""><strong>@{{post.title}}</strong></div>
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
                    <div v-if="post.liked==false" class="text-center like-post" @click="like(index,1)"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>
                    <div v-else class="text-center like-post" style="background-color: #f59e00"  @click="like(index,0)"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>    
                    <div class="newest-comment border-top" id="commentContent" @click="scrollToBottom()">
                        <div class="cmt-content" >
                            <div v-for="(comment,ind) in post.comments">
                                <div v-if="ind%2==0" style="background-color: #f3f3f3;border:1px solid white;">
                                    <p style="font-weight: bold;display: flex;justify-content: space-between;align-items: center">
                                        <span>
                                            <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="comment.user.avatar.avatar" alt="avatar" v-if="comment.user.avatar!==null">
                                            <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="basicURL+'img/avatar/default.jpg'" alt="localAvatar" v-else>
                                            @{{comment.user.name}}    
                                        </span>
                                        <span style="position: relative">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" @click="setIndexComment(ind,index)" v-if="comment.user.id==currentUser">
                                                X
                                              </button>
                                        </span>
                                    </p>
                                    <p>@{{comment.content}}</p>
                                </div>
                                <div v-else style="background-color: #FFF;border:1px solid #f3f3f3">
                                    <p style="font-weight: bold;display: flex;justify-content: space-between;align-items: center">
                                        <span>
                                            <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="comment.user.avatar.avatar" alt="avatar" v-if="comment.user.avatar">
                                            <img style="border-radius:50%;width: 25px;height: 25px;object-fit: cover; " v-bind:src="basicURL+'img/avatar/default.jpg'" alt="localAvatar" v-else>
                                            @{{comment.user.name}}    
                                        </span>
                                        <span style="position: relative">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" @click="setIndexComment(ind,index)" v-if="comment.user.id==currentUser">
                                                X
                                              </button>
                                        </span>
                                    </p>
                                    <p>@{{comment.content}}</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="comment row">
                        <div class="col-md-8">
                            <input type="text" name="" id="" class="form-control m-0" v-model="comment">
                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" class="form-control btncomment" @click="sendComment(index)">comment</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you destroy this?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" @click="destroyComment()" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
@section('vuejs')
<script src="{{mix('js/vuejs/mainpage/c-mainpage.js')}}"></script>
<script src="{{mix('js/vuejs/mainpage/s-mainpage.js')}}"></script>
@endsection