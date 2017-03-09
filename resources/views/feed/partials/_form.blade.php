{{--发布说说--}}
<form action="{{ route('web.feed.store') }}" method="post" novalidate="" style="margin-bottom: 10px;">
    {{ csrf_field() }}
    <div class="form-group input-group no-margin">
        <textarea name="content" class="form-control" placeholder="说点什么吧..."></textarea>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-success">发布</button>
        </span>
    </div>
</form>