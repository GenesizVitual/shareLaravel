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
                <a href="{{ url('tbk/'.$spj->id.'/create') }}" class="btn btn-block btn-warning btn-md pt-sm pb-sm text-md">
                    <i class="fa fa-envelope mr-xs"></i>
                    Buat TBK
                </a>

                <ul class="list-unstyled mt-xl pt-md">
                    <li>
                        <p class="menu-item">No SPJ anda</p>
                    </li>

                    @foreach($tbkList as $data)
                    <li>
                        <a href="mailbox-folder.html" class="menu-item">{{ $data->number_tbk }}</a>
                    </li>
                    @endforeach

                </ul>
                <hr class="separator" />

            </div>
        </div>
    </div>
</menu>