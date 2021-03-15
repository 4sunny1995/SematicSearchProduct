<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card-body">
       {{--  {{dd($data)}}  --}}
        <div class="form-group">
            <input class="form-control" placeholder="Subject:" value="{{$data['subject']}}" type="text" required="">
        </div>
        <div class="form-group">
            <textarea name="" class="form-control" id="" value="{{$data['content']}}" cols="30" rows="10" v-model="content">{{$data['content']}}</textarea>
        </div>
        
    </div>
</body>
</html>