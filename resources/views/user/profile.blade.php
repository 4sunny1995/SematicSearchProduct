@extends('shop.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection
@section('content')
<div class="w-100" id="profile" v-cloak>
    <div class="w-100" v-if="isLoading">
        @include('layouts.lazyloading')
    </div>
    <div class="w-100" v-else>
        <div class="w-100 " id="cover">
            <img src="{{asset('img/aldain-austria-316143-unsplash.jpg')}}" alt="cover" class="img-cover" width="100%">
            <div id="avatar" class="w-100">
                <img v-bind:src="avatar" alt="avatar" class="" v-if="avatar">
                <img v-bind:src="imgURL+'img/avatar/default.jpg'" alt="" v-else>
                    <span class="text-center">@{{name}}</span>
            </div>
        </div>
        <div class="w-100 text-center m-2">
            <h4>My information</h4>
        </div>
        
        <div class="w-100" v-if="isAction==1">
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Phone</label></div>
                <div class="col-md-10"><input type="text" class="form-control" v-model="phone"></div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Address</label></div>
                <div class="col-md-10"><input type="text" class="form-control" v-model="address"></div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Gender</label></div>
                <div class="col-md-10">
                    <select name="" class="form-control" v-model="gender" id="">
                        <option value="0" class="form-control" >Nam</option>
                        <option value="1" class="form-control">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Born</label></div>
                <div class="col-md-10"><input type="date" class="form-control" v-model="dateOfBirth"></div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Description</label></div>
                <div class="col-md-10"><textarea name="" id="" cols="30" rows="5" class="form-control" v-model="description"></textarea></div>
            </div>
            <div class="col-md-12 text-center p-2">
                <button class="btn btn-primary" type="button" @click="updateInformation()">Save</button>
                <button class="btn btn-block" @click="backHistory()">Quay lai</button>
            </div>
        </div>
        <div class="w-100" v-else>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Phone</label></div>
                <div class="col-md-10"><label type="text" class="form-control" >@{{user.information.phone}}</label></div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Address</label></div>
                <div class="col-md-10"><label type="text" class="form-control" >@{{user.information.address}}</label></div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Gender</label></div>
                <div class="col-md-10">
                    <label class="form-check-inline" v-if="user.gender">Nam</label>
                    <label class="form-check-inline" v-if="!user.gender">Nữ</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Born</label></div>
                <div class="col-md-10"><label type="date" class="form-control" >@{{user.information.dateOfBirth}}</label></div>
            </div>
            <div class="row">
                <div class="col-md-2"><label for="" class="p-2 text-center">Description</label></div>
                <div class="col-md-10"><label name="" id="" cols="30" rows="5" class="form-control">@{{user.information.description}}</label></div>
            </div>
            <div class="col-md-12 text-center p-2">
                <button class="btn btn-primary" @click="editProfile()" v-if="user.id==id">Edit</button>
                <button class="btn btn-default" @click="backHistory()">Quay lai</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('vuejs')
    <script src="{{mix('/js/vuejs/user/c-user.js')}}"></script>
    <script src="{{mix('/js/vuejs/user/s-user.js')}}"></script>
@endsection