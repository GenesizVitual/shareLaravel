<aside id="sidebar-left" class="sidebar-left">
				
                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-align-left" aria-hidden="true"></i>
                                        <span>Instansi</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="{{ url('profileInstansi') }}">Profil Instansi</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('createAccount') }}">Buat Akun</a>
                                        </li>
                                        <li class="nav-parent">
                                            <a>Pengaturan Awal</a>
                                            <ul class="nav nav-children">
                                                <li>
                                                    <a href="{{ url('fiscalyears') }}">Tahun Anggaran</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('typeOfGoods') }}">Jenis Barang</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('suppliers') }}">Supplier</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('warehouse') }}">Gudang Barang</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{ url('goodsreceipt') }}">Penerimaan Barang</a>
                                        </li>

                                        <li class="nav-parent">
                                            <a>Second Level</a>
                                            <ul class="nav nav-children">
                                                <li class="nav-parent">
                                                    <a>Third Level</a>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a>Third Level Link #1</a>
                                                        </li>
                                                        <li>
                                                            <a>Third Level Link #2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a>Second Level Link #1</a>
                                                </li>
                                                <li>
                                                    <a>Second Level Link #2</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-align-left" aria-hidden="true"></i>
                                        <span>Toko</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a>First Level</a>
                                        </li>
                                        <li class="nav-parent">
                                            <a>Second Level</a>
                                            <ul class="nav nav-children">
                                                <li class="nav-parent">
                                                    <a>Third Level</a>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a>Third Level Link #1</a>
                                                        </li>
                                                        <li>
                                                            <a>Third Level Link #2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a>Second Level Link #1</a>
                                                </li>
                                                <li>
                                                    <a>Second Level Link #2</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
            
                        <hr class="separator" />
            
                        <div class="sidebar-widget widget-tasks">
                            <div class="widget-header">
                                <h6>Projects</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content">
                                <ul class="list-unstyled m-none">
                                    <li><a href="#">Porto HTML5 Template</a></li>
                                    <li><a href="#">Tucson Template</a></li>
                                    <li><a href="#">Porto Admin</a></li>
                                </ul>
                            </div>
                        </div>
            
                        <hr class="separator" />
            
                        <div class="sidebar-widget widget-stats">
                            <div class="widget-header">
                                <h6>Company Stats</h6>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li>
                                        <span class="stats-title">Stat 1</span>
                                        <span class="stats-complete">85%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                                <span class="sr-only">85% Complete</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="stats-title">Stat 2</span>
                                        <span class="stats-complete">70%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                                <span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="stats-title">Stat 3</span>
                                        <span class="stats-complete">2%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                                <span class="sr-only">2% Complete</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            
                </div>
            
            </aside>