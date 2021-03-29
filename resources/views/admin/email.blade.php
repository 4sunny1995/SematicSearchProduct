@extends('admin.master')

@section('content')
    <div class="card card-primary card-outline" id="sendEmail" v-cloak>
        <div class="card-header">
        <h3 class="card-title">Email</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="form-group">
            <input class="form-control" placeholder="To:" type="email" required v-model="to">
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Subject:" v-model="subject" type="text" required>
        </div>
        <div class="form-group">
            <textarea name="" class="form-control"id="" cols="30" rows="10" v-model="content"></textarea>
        </div>
        <div class="form-group">
            <div class="float-right">
                <button class="btn btn-primary mb-3" @click="sendEmail()">Send</button>
                <button class="btn btn-default mb-3" @click="clear()">Cancel</button>
            </div>
            
        </div>
    </div>
@endsection
@section('vuejs')
    <script src="{{mix('js/vuejs/email/c-email.js')}}"></script>
    <script src="{{mix('js/vuejs/email/s-email.js')}}"></script>
@endsection