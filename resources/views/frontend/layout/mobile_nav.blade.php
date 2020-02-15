<div id="NavDrawer" class="transition">
    <div class="drawer__header">
        <div class="drawer__close js-drawer-close">
            <button type="button" class="icon-fallback-text">
                <span>Đóng</span><i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <ul class="mobile-menu">

        <li>
            <div class="dropdownlink">
                <a href="{{asset('/')}}">Trang chủ</a>
            </div>
        </li>
        @foreach($categories as $cate)
            <li>
                <div class="dropdownlink">{{$cate->name}}
                    <i class="fa fa-plus icon-plus" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-minus" aria-hidden="true"></i>
                </div>
                <ul class="submenuItems">
                    @foreach($news as $new)
                        @if($new->cate_id == $cate->id)
                            <li><a href="{{route('tin-tuc', [$new->id, $new->slug])}}">{{$new->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
        <li>
            <div class="dropdownlink">
                <a href="#">Liên Hệ</a>
            </div>
        </li>
    </ul>
</div>
<div class="cart-overlay"></div>
