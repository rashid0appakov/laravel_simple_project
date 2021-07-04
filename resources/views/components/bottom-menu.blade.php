@foreach($categories as $category)
<div class="footer-top_list">
    <span class="footer-top_list_title">{{$category->name}}</span>
    @foreach($category->dusts as $item)
    <a href="{{route('dusts.show', [$category->slug, $item->slug])}}" class="footer-top_link">{{$item->name}}</a>
    @endforeach
</div>
@endforeach
<div class="footer-top_list">
    <span class="footer-top_list_title">Услуги</span> 
    <a href="#" class="footer-top_link">Отчеты</a>
    <a href="#" class="footer-top_link">Проекты</a>
    <a href="#" class="footer-top_link">Паспортизация</a>
    <a href="#" class="footer-top_link">Прочее</a>
</div>