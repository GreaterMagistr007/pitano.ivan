@if(isset($breadcrumbs) && $breadcrumbs && count($breadcrumbs))
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <?$i=1;?>
                @foreach($breadcrumbs as $item)
                    @if($i != count($breadcrumbs))
                        <li>
                            <a href="{{$item['href']}}">{{$item['title']}}</a>
                        </li>
                    @else
                        <li>{{$item['title']}}</li>
                    @endif
                    <?$i++;?>
                @endforeach
            </ul>
        </div>
    </div>
@endif
