<div class="my-3">
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
@if ($errors->all())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> 
@endif
</div>