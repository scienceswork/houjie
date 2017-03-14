{{--获得所有分类--}}
@if($categories->count())
    @foreach($categories as $category)
        <a class="badge"
           href="{{ route('web.community.category', $category->id) }}" style="margin: 0 10px 10px 0;">{{ $category->title }}</a>
    @endforeach
@else
    管理员太懒了，还没有创建分类~
@endif