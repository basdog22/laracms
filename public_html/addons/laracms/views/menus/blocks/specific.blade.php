<ul>
    @foreach($data->menuitems as $item)
    <li><a {{$item->link_attr}} target="{{ $item->link_target }}" style="{{ $item->link_css }}" class="{{ $item->link_class }}" href="{{ $item->url }}">{{$item->link_text}}</a> </li>
    @endforeach
</ul>
