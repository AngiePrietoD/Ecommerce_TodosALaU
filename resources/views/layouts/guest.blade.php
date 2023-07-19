<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="sm:flex items-center font-sans text-gray-900 antialiased">
        <div class="sm:w-1/2">
            <div class="w-90">
                <x-authentication-card-logo class="mx-auto" />
            </div>
            <div class="text-center">
                <p class="leading-tight p-2 sm:text-xl" style="color: #119D8F;">
                    Bienvenidos a <i><strong>Soficargo.com</strong></i> Mientras terminamos de construir nuestra página para brindarte un mejor servicio, te invitamos a registrarte y recibir de manera directa los detalles de tu carga.
                </p>
                <p class="leading-tight p-2 sm:text-xl" style="color: #050987;">
                    No olvides que la nueva y <i><strong>única dirección</strong></i> de envío es:
                </p>
                <p class="leading-tight p-2 sm:text-xl" style="color: #050987;">
                    <strong>(Tu Nombre y Apellido / Soficargo)<br>
                        6800 NW 82ND AVE<br>
                        MIAMI, FL 33166<br>
                        786-477-3511</strong>
                </p>
            </div>
        </div>
        <div class="sm:w-1/2">
            {{ $slot }}
        </div>
    </div>
    <div class="fixed w-full">
        <x-banner />
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.i18n/1.0.9/jquery.i18n.min.js" integrity="sha512-EkS8Kq86l7dHt/dOBniHgtYvAScDqFw/lIPX5VCwaVKsufs0pY44I2cguqZ45QaFOGGwVd3T1nXvVJYIEjRsjA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts
</body>

</html>