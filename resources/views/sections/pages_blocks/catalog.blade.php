<div class="ps-catalog-top">
    <div class="row">
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <div class="ps-block--menu-categories" data-mh="catalog-top">
                <div class="ps-block__header">
                    <h3>Категории</h3>
                </div>
                <div class="ps-block__content">
                    <ul class="ps-list--menu-cateogories">
                        @foreach($Categories as $Category)
                            <?
                                $k=false;
                                if(isset($Category['child_categories']) && $Category['child_categories'] && count($Category['child_categories'])){$k=true;}
                            ?>
                            @if($k)
                                <li class="menu-item-has-children">
                            @else
                                <li>
                            @endif
                                <a href="/catalog/{{$Category['uri']}}">{{$Category['title']}}</a>
                                    @if($k)
                                        <ul class="sub-menu">
                                            <?
//                                            dd($Category['child_categories'] );
                                            ?>
                                            @foreach($Category['child_categories'] as $child)
                                                <li><a href="/catalog/{{$child['uri']}}">{{$child['title']}}</a></li>
                                            @endforeach
                                        </ul>

                                    @endif
                            </li>
                        @endforeach
{{--                        <li class="menu-item-has-children"><a href="/shop-default.html">Clothing &amp; Apparel</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="/shop-default.html">Womens</a></li>--}}
{{--                                <li><a href="/shop-default.html">Mens</a></li>--}}
{{--                                <li><a href="/shop-default.html">Bags</a></li>--}}
{{--                                <li><a href="/shop-default.html">Sunglasses</a></li>--}}
{{--                                <li><a href="/shop-default.html">Accessories</a></li>--}}
{{--                                <li><a href="/shop-default.html">Kid's Fashion</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item-has-children"><a href="/shop-default.html">Garden &amp; Kitchen</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="/shop-default.html">Cookware</a></li>--}}
{{--                                <li><a href="/shop-default.html">Decoration</a></li>--}}
{{--                                <li><a href="/shop-default.html">Furniture</a></li>--}}
{{--                                <li><a href="/shop-default.html">Garden Tools</a></li>--}}
{{--                                <li><a href="/shop-default.html">Home Improvement</a></li>--}}
{{--                                <li><a href="/shop-default.html">Powers And Hand Tools</a></li>--}}
{{--                                <li><a href="/shop-default.html">Utensil &amp; Gadget</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item-has-children"><a href="/shop-default.html">Consumer Electrics</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="/shop-default.html">Air Conditioners</a></li>--}}
{{--                                <li><a href="/shop-default.html">Audios &amp; Theaters</a></li>--}}
{{--                                <li><a href="/shop-default.html">Car Electronics</a></li>--}}
{{--                                <li><a href="/shop-default.html">Office Electronics</a></li>--}}
{{--                                <li><a href="/shop-default.html">TV Televisions</a></li>--}}
{{--                                <li><a href="/shop-default.html">Washing Machines</a></li>--}}
{{--                                <li><a href="/shop-default.html">Refrigerators</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item-has-children"><a href="/shop-default.html">Computers &amp; Technologies</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="/shop-default.html">Desktop PC</a></li>--}}
{{--                                <li><a href="/shop-default.html">Laptop</a></li>--}}
{{--                                <li><a href="/shop-default.html">Smartphones</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item-has-children"><a href="/shop-default.html">Jewelry &amp; Watches</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="/shop-default.html">Gemstone Jewelry</a></li>--}}
{{--                                <li><a href="/shop-default.html">Men's Watches</a></li>--}}
{{--                                <li><a href="/shop-default.html">Women's Watches</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item-has-children"><a href="/shop-default.html">Phones &amp; Accessories</a>--}}
{{--                            <ul class="sub-menu">--}}
{{--                                <li><a href="/shop-default.html">Iphone 8</a></li>--}}
{{--                                <li><a href="/shop-default.html">Iphone X</a></li>--}}
{{--                                <li><a href="/shop-default.html">Sam Sung Note 8</a></li>--}}
{{--                                <li><a href="/shop-default.html">Sam Sung S8</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <div class="ps-block--categories-grid" data-mh="catalog-top">
				@if(isset($this_item) && $this_item['description'])
					<div class="row" style="width:100%;padding-left: 20px;">
						{!! $this_item['description'] !!}
					</div>
				@endif
                @if(isset($this_item['child_categories']) && count($this_item['child_categories']))
                    @foreach($this_item['child_categories'] as $category)
                        <div class="ps-block--category-2" data-mh="categories">
                            <div class="ps-block__thumbnail">
                                <img src="/{{$category['image']}}" alt="">
                            </div>
                            <div class="ps-block__content">
                                <h4>{{$category['title']}}</h4>
                                {!! $category['description'] !!}
                                <a href="/catalog/{{$category['uri']}}">Смотреть</a>
                            </div>
                        </div>

                        <?
//                            dd($category);
                        ?>

                        @if(isset($category['child_products']) && count($category['child_products']))
                            @foreach($category['child_products'] as $product)
                                <div class="ps-block--category-2" data-mh="categories">
                                    <div class="ps-block__thumbnail">
                                        <img src="/{{$product['image']}}" alt="">
                                    </div>
                                    <div class="ps-block__content">
                                        <h4>{{$product['title']}}</h4>
                                        {!! $product['description'] !!}
                                        <a href="/catalog/{{$product['uri']}}">Смотреть</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    @endforeach
                @endif
                @if(isset($this_item['child_products']) && count($this_item['child_products']))
                    @foreach($this_item['child_products'] as $product)
                        <div class="ps-block--category-2" data-mh="categories">
                            <div class="ps-block__thumbnail">
                                <img src="/{{$product['image']}}" alt="">
                            </div>
                            <div class="ps-block__content">
                                <h4>{{$product['title']}}</h4>
                                {!! $product['description'] !!}
                                <a href="/catalog/{{$product['uri']}}">Смотреть</a>
                            </div>
                        </div>
                    @endforeach
                @endif

{{--                <div class="ps-block--category-2" data-mh="categories">--}}
{{--                    <div class="ps-block__thumbnail"><img src="/img/categories/shop/1.jpg" alt=""></div>--}}
{{--                    <div class="ps-block__content">--}}
{{--                        <h4>Clothing &amp; Apparel</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="/shop-default.html">Accessories</a></li>--}}
{{--                            <li><a href="/shop-default.html">Bags</a></li>--}}
{{--                            <li><a href="/shop-default.html">Kid's Fashion</a></li>--}}
{{--                            <li><a href="/shop-default.html">Mens</a></li>--}}
{{--                            <li><a href="/shop-default.html">Shoes</a></li>--}}
{{--                        </ul><a href="/shop-categories.html#">Shop All</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="ps-block--category-2" data-mh="categories">--}}
{{--                    <div class="ps-block__thumbnail"><img src="/img/categories/shop/2.jpg" alt=""></div>--}}
{{--                    <div class="ps-block__content">--}}
{{--                        <h4>Garden &amp; Kitchen</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="/shop-default.html">Cookware</a></li>--}}
{{--                            <li><a href="/shop-default.html">Decoration</a></li>--}}
{{--                            <li><a href="/shop-default.html">Furniture</a></li>--}}
{{--                            <li><a href="/shop-default.html">Garden Tools</a></li>--}}
{{--                            <li><a href="/shop-default.html">Home Improvement</a></li>--}}
{{--                        </ul><a href="/shop-categories.html#">Shop All</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="ps-block--category-2" data-mh="categories">--}}
{{--                    <div class="ps-block__thumbnail"><img src="/img/categories/shop/3.jpg" alt=""></div>--}}
{{--                    <div class="ps-block__content">--}}
{{--                        <h4>Consumer Electrics</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="/shop-default.html">Air Conditioners</a></li>--}}
{{--                            <li><a href="/shop-default.html">Audios &amp; Theaters</a></li>--}}
{{--                            <li><a href="/shop-default.html">Car Electronics</a></li>--}}
{{--                            <li><a href="/shop-default.html">Office Electronics</a></li>--}}
{{--                            <li><a href="/shop-default.html">Refrigerations</a></li>--}}
{{--                        </ul><a href="/shop-categories.html#">Shop All</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="ps-block--category-2" data-mh="categories">--}}
{{--                    <div class="ps-block__thumbnail"><img src="/img/categories/shop/4.jpg" alt=""></div>--}}
{{--                    <div class="ps-block__content">--}}
{{--                        <h4>Health &amp; Beauty</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="/shop-default.html">Equipments</a></li>--}}
{{--                            <li><a href="/shop-default.html">Hair Care</a></li>--}}
{{--                            <li><a href="/shop-default.html">Perfumer</a></li>--}}
{{--                            <li><a href="/shop-default.html">Skin Care</a></li>--}}
{{--                        </ul><a href="/shop-categories.html#">Shop All</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="ps-block--category-2" data-mh="categories">--}}
{{--                    <div class="ps-block__thumbnail"><img src="/img/categories/shop/5.jpg" alt=""></div>--}}
{{--                    <div class="ps-block__content">--}}
{{--                        <h4>Computers &amp; Technologies</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="/shop-default.html">Desktop PC</a></li>--}}
{{--                            <li><a href="/shop-default.html">Laptop</a></li>--}}
{{--                            <li><a href="/shop-default.html">Smartphones</a></li>--}}
{{--                        </ul><a href="/shop-categories.html#">Shop All</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="ps-block--category-2" data-mh="categories">--}}
{{--                    <div class="ps-block__thumbnail"><img src="/img/categories/shop/6.jpg" alt=""></div>--}}
{{--                    <div class="ps-block__content">--}}
{{--                        <h4>Jewelry &amp; Watches</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="/shop-default.html">Gemstones Jewelry</a></li>--}}
{{--                            <li><a href="/shop-default.html">Men's Watches</a></li>--}}
{{--                            <li><a href="/shop-default.html">Women's Watches</a></li>--}}
{{--                        </ul><a href="/shop-categories.html#">Shop All</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
