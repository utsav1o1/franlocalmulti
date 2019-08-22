<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            @foreach($breadcrumbs as $breadcrumb)
                @if ($breadcrumb == end($breadcrumbs))
                    <li class="active">
                        {!!  ucwords(str_replace('-', ' ', $breadcrumb['name'])) !!}
                    </li>
                @else
                    <li>
                        <a href="{!!  route($breadcrumb['slug']) !!}">{!!  ucwords(str_replace('-', ' ', $breadcrumb['name'])) !!}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>

    <?php //dd($breadcrumbs) ?>

    <div class="menulist ">
        <ul>
            @foreach($menus as $menu)

            <li class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ route($menu['slug'].'.index') }}"
                    class="{!! $menu['class'] !!}" >{!! $menu['heading'] !!}
                </a>
            </li>
            @endforeach
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>