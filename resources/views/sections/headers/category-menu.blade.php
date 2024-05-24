@foreach($Categories as $Category)
    <li>
        <a href="/catalog/{{$Category['uri']}}">
            <i class="icon-star"></i>
            {{$Category['title']}}
        </a>
    </li>
@endforeach
