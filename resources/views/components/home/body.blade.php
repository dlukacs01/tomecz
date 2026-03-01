<body>

    <div id="app">
        @yield('nav')

        <main class="py-4">
            @yield('content')
        </main>

        <x-home.footer/>
    </div>

    <x-home.scripts/>

</body>
