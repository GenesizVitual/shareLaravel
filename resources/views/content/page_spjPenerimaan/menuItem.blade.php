<menu id="content-menu" class="inner-menu" role="menu">
    <div class="nano">
        <div class="nano-content">

            <div class="inner-menu-toggle-inside">
                <a href="#" class="inner-menu-collapse">
                    <i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Menu
                </a>

                <a href="#" class="inner-menu-expand" data-open="inner-menu">
                    Show Menu <i class="fa fa-chevron-down"></i>
                </a>
            </div>

            <div class="inner-menu-content">
                <a href="{{ url('goodsreceipt/create') }}" class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
                    <i class="fa fa-envelope mr-xs"></i>
                    Buat SPJ
                </a>

                <ul class="list-unstyled mt-xl pt-md">
                    <li>
                        <p class="menu-item">No SPJ anda</p>
                    </li>

                     @if(count($listSpj) > 0)
                        @foreach($listSpj as $data)
                    <li>
                        <a href="mailbox-folder.html" class="menu-item">{{ $data->number_spj }}</a>
                    </li>
                        @endforeach
                         @else
                        <li>
                            SPJ Belum terisi
                        </li>
                    @endif
                </ul>
                <hr class="separator" />

            </div>
        </div>
    </div>
</menu>