<body>

<header class="bg-dark">
    <p class="ml-3 m-0 name-menu">Software Management</p>
    <p class="m-0"> Área administrativa </p>
    <p class="m-0"> Version: 1.0.0 </p>
    <p class="m-0">
        <?php date_default_timezone_set('Europe/Lisbon'); ?>
        <?= date('d-m-Y' . ' - ' . 'H:i A') ?>
    </p>
    <a class="btn btn-danger btn-sm mr-3" href="/logout">Logout</a>
</header>

<div class="container-fluid">
    <div class="row wrapper min-vh-100 flex-column flex-sm-row">
        <aside class="col-12 col-lg-2 p-0 bg-dark flex-shrink-1">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark align-items-start flex-sm-column flex-row">
                <!-- Button Home -->
                <a class="navbar-brand" href="/dashboard">Dashboard</a>
                <!-- Button Responsive -->
                <a href class="navbar-toggler" data-toggle="collapse" data-target=".sidebar"><span
                            class="navbar-toggler-icon"></span></a>

                <!-- Sidebar -->
                <div class="collapse navbar-collapse sidebar w-100">
                    <ul class="flex-column navbar-nav justify-content-between w-100">

                        <!-- Client -->
                        <li class="nav-item">
                            <a class="nav-link" href="#m1" data-parent="#navbar1" data-toggle="collapse"
                               data-target="#m1" aria-expanded="false">
                                <i class="ml-1 arrow right"></i><span class="ml-2">Clientes</span>
                            </a>
                            <div class="collapse ml-5" id="m1">
                                <ul class="flex-column nav">
                                    <a class="nav-link" href="/table-client">Buscar</a>
                                    <a class="nav-link" href="/verify-client">Adicionar</a>
                                </ul>
                            </div>
                        </li>

                        <!-- Order of service menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="#m3" data-parent="#navbar3" data-toggle="collapse"
                               data-target="#m3" aria-expanded="false">
                                <i class="ml-1 arrow right"></i><span class="ml-2">Ordem de serviço</span>
                            </a>
                            <div class="collapse ml-5" id="m3">
                                <ul class="flex-column nav">
                                    <a class="nav-link" href="/table-order">Buscar</a>
                                    <a class="nav-link" href="/new-order-service">Adicionar</a>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="ml-2">Serviços Rapidos</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"> <span class="ml-2">Produtos</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="ml-2">Financeiro</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </aside>

        <main class="col bg-faded py-3">
