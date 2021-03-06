<section class="sidebar">
    {{-- Sidebar user panel --}}
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('softemp/images/temp/panel/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->physical->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    {{-- search form --}}
    <form action="#" method="GET" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="filter" class="form-control" placeholder="Search module">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    {{-- /.search form --}}
    {{-- sidebar menu: : style can be found in sidebar.less --}}
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview {{(Request::is('painel')?'active':'')}}">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{(Request::is('painel')?'active':'')}}"><a href="{{route('panel.index')}}"><i
                                class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li class="{{(Request::is('painel/v2')?'active':'')}}"><a href="{{route('panel.index2')}}"><i
                                class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
        </li>

        {{--Pessoas--}}
        <li class="treeview {{(Request::is('painel/pessoa*')?'active':'')}}">
            <a href="#"><i class="fa fa-users"></i> <span>Cadastro de pessoas</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
                <li class="{{(Request::is('painel/people*')?'active':'')}}">
                    <a href="{{route('panel.people.index')}}">
                        <i class="fa fa-circle-o"></i> Todos
                    </a>
                </li>
                <li class="{{(Request::is('painel/people/client*')?'active':'')}}">
                    <a href="{{route('panel.people.client.index')}}">
                        <i class="fa fa-circle-o"></i> Clientes
                    </a>
                </li>
                <li class="{{(Request::is('painel/pessoa/fornecedor*')?'active':'')}}">
                    <a href="{{route('panel.people.caterer.index')}}">
                        <i class="fa fa-circle-o"></i> Fornecedores
                    </a>
                </li>
                <li class="{{(Request::is('painel/pessoa/peossoa/fisica*')?'active':'')}}">
                    <a href="{{route('panel.people.physical.index')}}">
                        <i class="fa fa-circle-o"></i> Pessoas
                    </a>
                </li>
                <li class="{{(Request::is('painel/people/company*')?'active':'')}}">
                    <a href="{{route('panel.people.company.index')}}">
                        <i class="fa fa-circle-o"></i> Empresas
                    </a>
                </li>
                <li class="{{ (Request::is('painel/pessoa/colaborador*')?'active':'') }}">
                    <a href="{{ route('panel.people.employee.index') }}">
                        <i class="fa fa-circle-o"></i> Colaboradores
                    </a>
                </li>
            </ul>
        </li>
        {{--end Pessoas--}}


        {{--Usuários--}}
{{--        <li class="treeview {{(Request::is('painel/usuario*')?'active':'')}}">--}}
{{--            <a href="#"><i class="fa fa-users"></i> <span>Usuários</span>--}}
{{--                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>--}}
{{--            </a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li class="{{(Request::is('painel')?'active':'')}}"><a href="{{route('panel.index')}}"><i--}}
{{--                                class="fa fa-circle-o"></i> Clientes</a></li>--}}
{{--                <li class="{{(Request::is('painel/v2')?'active':'')}}"><a href="{{route('panel.index2')}}"><i--}}
{{--                                class="fa fa-circle-o"></i> Fornecedores</a></li>--}}
{{--                <li class="{{(Request::is('painel/usuario/colaborador*')?'active':'')}}"><a--}}
{{--                            href="{{route('panel.user.employee.index')}}"><i--}}
{{--                                class="fa fa-circle-o"></i> Colaboradores</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        {{--end Usuários--}}

        {{--access control--}}
        <li class="treeview {{(Request::is('painel/controle/acesso*')?'active':'')}}">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Controle Acesso</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{(Request::is('painel/controle/acesso/permissao*')?'active':'')}}">
                    <a href="{{route('panel.access.control.permission.index')}}">
                        <i class="fa fa-circle-o"></i> Permissões
                    </a>
                </li>
                <li class="{{(Request::is('painel/controle/acesso/papeis*')?'active':'')}}">
                    <a href="{{route('panel.access.control.role.index')}}">
                        <i class="fa fa-circle-o"></i> Papéis
                    </a>
                </li>
                <li class="{{(Request::is('painel/controle/acesso/ocupacao*')?'active':'')}}">
                    <a href="{{route('panel.access.control.occupation.index')}}">
                        <i class="fa fa-circle-o"></i> Ocupações
                    </a>
                </li>
                <li class="{{(Request::is('painel/controle/acesso/modulos*')?'active':'')}}">
                    <a href="{{route('panel.access.control.module.index')}}">
                        <i class="fa fa-circle-o"></i> Modulos
                    </a>
                </li>
            </ul>
        </li>
        {{--end access control--}}

        {{--Provedor--}}
        <li class="treeview {{(Request::is('painel/provedor*')?'active':'')}}">
            <a href="#"><i class="fa fa-heartbeat"></i> <span>Provedor</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
                <li class="{{(Request::is('painel/provedor*')?'active':'')}}">
                    <a href="{{route('panel.provedor.index')}}">
                        <i class="fa fa-circle-o"></i> Dashboard
                    </a>
                </li>
                {{--Network--}}
                <li class="treeview {{(Request::is('painel/provedor/rede*')?'active':'')}}">
                    <a href="#"><i class="fa fa-database"></i> <span>Rede</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(Request::is('painel/provedor/rede/rota*')?'active':'')}}">
                            <a href="{{route('panel.provedor.network.route.index')}}">
                                <i class="fa fa-car"></i> Rota
                            </a>
                        </li>
                        <li class="{{(Request::is('painel/provedor/mkauth/cto*')?'active':'')}}">
                            <a href="{{route('panel.provedor.mkauth.cto.index')}}">
                                <i class="fa fa-circle-o"></i> CTOs
                            </a>
                        </li>

                        <li class="treeview {{(Request::is('painel/provedor/mkauth/cliente*')?'active':'')}}">
                            <a href="#"><i class="fa fa-users"></i> Clientes
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente/ativo')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.active') }}">
                                        <i class="fa fa-circle-o text-success"></i> Ativos
                                    </a>
                                </li>
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente/bloqueado')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.blocked') }}">
                                        <i class="fa fa-circle-o text-warning"></i> Bloqueados
                                    </a>
                                </li>
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente/desativado')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.disabled') }}">
                                        <i class="fa fa-circle-o text-danger"></i> Desativados
                                    </a>
                                </li>
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.index') }}">
                                        <i class="fa fa-circle-o text-blue"></i> Todos
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{--end Network--}}

                {{--MkAuth--}}
                <li class="treeview {{(Request::is('painel/provedor/mkauth*')?'active':'')}}">
                    <a href="#"><i class="fa fa-random"></i> <span>MkAuth</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(Request::is('painel/provedor/mkauth/tabelas*')?'active':'')}}">
                            <a href="{{route('panel.provedor.mkauth.table.index')}}">
                                <i class="fa fa-circle-o"></i> Tabelas
                            </a>
                        </li>
                        <li class="{{(Request::is('painel/provedor/mkauth/cto*')?'active':'')}}">
                            <a href="{{route('panel.provedor.mkauth.cto.index')}}">
                                <i class="fa fa-circle-o"></i> CTOs
                            </a>
                        </li>

                        <li class="treeview {{(Request::is('painel/provedor/mkauth/cliente*')?'active':'')}}">
                            <a href="#"><i class="fa fa-users"></i> Clientes
                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente/ativo')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.active') }}">
                                        <i class="fa fa-circle-o text-success"></i> Ativos
                                    </a>
                                </li>
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente/bloqueado')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.blocked') }}">
                                        <i class="fa fa-circle-o text-warning"></i> Bloqueados
                                    </a>
                                </li>
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente/desativado')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.disabled') }}">
                                        <i class="fa fa-circle-o text-danger"></i> Desativados
                                    </a>
                                </li>
                                <li class="{{(Request::is('painel/provedor/mkauth/cliente')?'active':'')}}">
                                    <a href="{{ route('panel.provedor.mkauth.client.index') }}">
                                        <i class="fa fa-circle-o text-blue"></i> Todos
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{--end MkAuths--}}
            </ul>
        </li>
        {{--end Provedor--}}

        {{--StockControl--}}
        <li class="treeview {{(Request::is('painel/estoque*')?'active':'')}}">
            <a href="#"><i class="fa fa-server"></i> <span>Controle Estoque</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
                <li class="{{(Request::is('painel/estoque/ordens*')?'active':'')}}"><a href="{{route('panel.stockcontrol.order.index')}}"><i
                            class="fa fa-circle-o"></i> Ordens</a></li>
                <li class="{{(Request::is('painel/estoque/equipamentos*')?'active':'')}}"><a href="{{route('panel.stockcontrol.equipment.index')}}"><i
                            class="fa fa-circle-o"></i> Equipamentos</a></li>
                <li class="{{(Request::is('painel/estoque/modelos*')?'active':'')}}"><a href="{{route('panel.stockcontrol.model.index')}}"><i
                            class="fa fa-circle-o"></i> Modelos de Equipamentos</a></li>
                <li class="{{(Request::is('painel/estoque/tecnicos*')?'active':'')}}"><a href="{{route('panel.stockcontrol.technical.index')}}"><i
                            class="fa fa-circle-o"></i> Técnicos</a></li>
            </ul>
        </li>

        <!-- Configuração -->
        <li class="treeview {{(Request::is('painel/configuracao/*') || Request::is('painel/contato/*') ? 'active' : '') }}">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Configuração</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
{{--            @can('dados-empresa-view')--}}
                <!-- Dados da Empresa -->
                <li class="treeview {{(Request::is('painel/configuracao/empresa*') ? 'active' : '') }}">
                    <a href="#">
                        <i class="fa fa-compress"></i>
                        <span>Empresa</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="{{(Request::is('painel/configuracao/empresa') ? 'active' : '') }}"><a
                                href="{{ route('panel.configuration.company.index') }}"><i class="fa fa-circle-o text-aqua"></i>
                                <span>Dados da Empresa</span></a></li>
                    </ul>
                </li>
            <!-- /.Dados da Empresa -->
{{--            @endcan--}}
{{--            @can('contact-type-view')--}}
                <!-- Contato -->
                    <li {{(Request::is('painel/contato/tipo/*') ? 'active' : '') }}>
                        <a href="{{ route('panel.contact.type.index') }}">
                            <i class="fa fa-circle-o text-yellow"></i> <span>Tipo de Contato</span>
                        </a>
                    </li>
                <!-- /.Contato -->
{{--            @endcan--}}
{{--            @can('occupation-view')--}}
{{--                <!-- ocupação -->--}}
{{--                    <li {{ (Request::is('panel/companies/occupations') ? 'class=active' : '') }}>--}}
{{--                        <a href="{{ route('panel.companies.occupations.index') }}">--}}
{{--                            <i class="fa fa-book"></i> Ocupação Colaborador--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <!-- /.ocupação -->--}}
{{--            @endcan--}}
{{--            @can('role-view')--}}
{{--                <!-- Papéis -->--}}
{{--                    <li {{ (Request::is('panel/companies/roles') ? 'class=active' : '') }}>--}}
{{--                        <a href="{{ route('panel.companies.roles.index') }}">--}}
{{--                            <i class="fa fa-adn"></i> Papéis--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <!-- /.Papéis -->--}}
{{--            @endcan--}}
{{--            @can('permission-view')--}}
{{--                <!-- Permissões -->--}}
{{--                    <li {{ (Request::is('panel/permissions/permissions') ? 'class=active' : '') }}>--}}
{{--                        <a href="{{ route('panel.permissions.permissions.index') }}">--}}
{{--                            <i class="fa fa-lock"></i> Permissões--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <!-- /.Permissões -->--}}
{{--                @endcan--}}
            </ul>
        </li>
        <!-- /.Configuração -->

        <!-- Address -->
        <li class="treeview {{(Request::is('panel/address/*') ? 'active' : '') }}">
            <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Endereços</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

{{--                <li class="{{(Request::is('panel/address/type') ? 'active' : '') }}"><a--}}
{{--                            href="{{ route('panel.address.type.index') }}"><i class="fa fa-circle-o text-aqua"></i>--}}
{{--                        <span>Tipo de Endereço</span></a></li>--}}

                <li {{ (Request::is('panel/address/continent*') ? 'class=active' : '') }}>
                    <a href="{{ route('panel.address.continent.index') }}">
                        <i class="fa fa-globe"></i> Continentes
                    </a>
                </li>
                <li {{ (Request::is('panel/address/country*') ? 'class=active' : '') }}>
                    <a href="{{ route('panel.address.country.index') }}">
                        <i class="fa fa-flag"></i> Paises
                    </a>
                </li>
                <li {{ (Request::is('panel/address/state*') ? 'class=active' : '') }}>
                    <a href="{{ route('panel.address.state.index') }}">
                        <i class="fa fa-circle-thin"></i> Estados
                    </a>
                </li>
                <li {{ (Request::is('panel/address/city*') ? 'class=active' : '') }}>
                    <a href="{{ route('panel.address.city.index') }}">
                        <i class="fa fa-address-book"></i> Cidades
                    </a>
                </li>
                <li {{ (Request::is('panel/address/neighboarhood*') ? 'class=active' : '') }}>
                    <a href="{{ route('panel.address.neighboarhood.index') }}">
                        <i class="fa fa-bullseye"></i> Bairros
                    </a>
                </li>
                <li {{ (Request::is('panel/address/street*') ? 'class=active' : '') }}>
                    <a href="{{ route('panel.address.street.index') }}">
                        <i class="fa fa-crosshairs"></i> Logradouros
                    </a>
                </li>
            </ul>
        </li>
        <!-- /.Address -->

        <!-- WebSite -->
        <li class="treeview {{(Request::is('painel/website/*') ? 'active' : '') }}">
            <a href="#">
                <i class="fa fa-globe"></i>
                <span>WebSite</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

{{--                <li class="{{(Request::is('painel/website/banner*') ? 'active' : '') }}"><a--}}
{{--                        href="{{ route('panel.address.type.index') }}"><i class="fa fa-ban text-aqua"></i>--}}
{{--                        <span>Banners</span></a></li>--}}

{{--                <li {{ (Request::is('painel/website/sobre*') ? 'class=active' : '') }}>--}}
{{--                    <a href="{{ route('panel.address.continent.index') }}">--}}
{{--                        <i class="fa fa-bolt"></i> Sobre Nós--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li {{ (Request::is('painel/website/contato*') ? 'class=active' : '') }}>--}}
{{--                    <a href="{{ route('panel.address.country.index') }}">--}}
{{--                        <i class="fa fa-envelope"></i> Contato--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li {{ (Request::is('painel/website/planos*') ? 'class=active' : '') }}>--}}
{{--                    <a href="{{ route('panel.address.state.index') }}">--}}
{{--                        <i class="fa fa-plane"></i> Planos--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li {{ (Request::is('painel/website/suporte*') ? 'class=active' : '') }}>--}}
{{--                    <a href="{{ route('panel.address.city.index') }}">--}}
{{--                        <i class="fa fa-support"></i> Suporte--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>
        <!-- /.WebSite -->
        {{--end StockControl--}}



        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-files-o"></i>--}}
                {{--<span>Layout Options</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<span class="label label-primary pull-right">4</span>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>--}}
                {{--<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>--}}
                {{--<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>--}}
                {{--<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="../widgets.html">--}}
                {{--<i class="fa fa-th"></i> <span>Widgets</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<small class="label pull-right bg-green">Hot</small>--}}
            {{--</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-pie-chart"></i>--}}
                {{--<span>Charts</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
                {{--<li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
                {{--<li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>--}}
                {{--<li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-laptop"></i>--}}
                {{--<span>UI Elements</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>--}}
                {{--<li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>--}}
                {{--<li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>--}}
                {{--<li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>--}}
                {{--<li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>--}}
                {{--<li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-edit"></i> <span>Forms</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
                {{--<li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>--}}
                {{--<li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-table"></i> <span>Tables</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
                {{--<li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="../calendar.html">--}}
                {{--<i class="fa fa-calendar"></i> <span>Calendar</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<small class="label pull-right bg-red">3</small>--}}
              {{--<small class="label pull-right bg-blue">17</small>--}}
            {{--</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="../mailbox/mailbox.html">--}}
                {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<small class="label pull-right bg-yellow">12</small>--}}
              {{--<small class="label pull-right bg-green">16</small>--}}
              {{--<small class="label pull-right bg-red">5</small>--}}
            {{--</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-folder"></i> <span>Examples</span>--}}
                {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>--}}
                {{--<li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>--}}
                {{--<li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>--}}
                {{--<li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>--}}
                {{--<li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>--}}
                {{--<li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>--}}
                {{--<li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>--}}
                {{--<li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>--}}
                {{--<li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="treeview">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-share"></i> <span>Multilevel</span>--}}
                {{--<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
                {{--<li class="treeview">--}}
                    {{--<a href="#"><i class="fa fa-circle-o"></i> Level One--}}
                        {{--<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
                        {{--<li class="treeview">--}}
                            {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
                                {{--<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>--}}
                            {{--</a>--}}
                            {{--<ul class="treeview-menu">--}}
                                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        {{--<li class="header">LABELS</li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
    {{--</ul>--}}
</section>
