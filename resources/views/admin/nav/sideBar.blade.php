    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="index.html">
                    <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>

                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Modéles</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('modele.index')}}"><i class="fa fa-chevron-right"></i>Tout</a></li>

                    <li><a href="{{route('indexFemme')}}"><i class="fa fa-chevron-right"></i> Femme</a></li>
                    <li><a href="{{route('indexHomme')}}"><i class="fa fa-chevron-right"></i> Homme</a></li>
                    <li><a href="{{route('indexEnfant')}}"><i class="fa fa-chevron-right"></i> Enfant</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Stock</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('shoe.index')}} "><i class="fa fa-chevron-right"></i> Afficher le stock</a></li>
                    <li><a href="{{route('modele.create')}}"><i class="fa fa-chevron-right"></i> Ajouter un modéle</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Boite à outils</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('settingsProduct')}}"><i class="fa fa-chevron-right"></i>gestion des catégories</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Ventes</span>
                    <small class="badge pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Livraison</span>
                    <small class="badge pull-right bg-yellow">12</small>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Utilisateur</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
