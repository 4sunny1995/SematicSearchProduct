@if(session('success'))
        <div class="form-group">
            <span class="text-success">{!! session('success') !!}</span>
        </div>
@endif

@if(session('error'))
        <div class="form-group">
            <span class="text-danger">{!! session('error') !!}</span>
        </div>
@endif  