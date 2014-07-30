<ul>
@foreach(Config::get('cms.blockdata.larapages') as $page)
<li><a href="#">{{$page->title}}</a> </li>
@endforeach;
</ul>