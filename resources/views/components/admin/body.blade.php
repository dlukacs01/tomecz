<body class="sb-nav-fixed">

    <x-admin.topnav/>

    <div id="layoutSidenav">

        <x-admin.sidenav/>

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <x-admin.footer/>
        </div>

    </div>

    <x-admin.scripts/>

</body>
