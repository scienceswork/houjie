{{--获得所有分类--}}
@if($categories)
    @foreach($categories as $category)
        <a class="badge"
           href="{{ route('web.news.category', $category->slug) }}">{{ $category->title }}</a>
    @endforeach
@else
    管理员太懒了，还没有创建分类~
@endif