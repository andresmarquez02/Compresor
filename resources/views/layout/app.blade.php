<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="token" content="{{csrf_token()}}">
    <title>Compresor</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/material-design-iconic-font/css/materialdesignicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/alertifyjs/css/alertify.css")}}">
</head>
<body class="min-h-screen bg-gray-100">
    <div class="text-white bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500">
        <div class="py-4">
            <div class="grid grid-cols-2 gap-2">
                <div class="pl-4 font-bold">Compresor</div>
                <div class="flex pr-4 justify-self-end">
                    <a href="https://api.whatsapp.com/send/?phone=%2B584129298833&text&app_absent=0" class="pl-3"><i class="mdi mdi-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/in/andres-marquez-02/" class="pl-3"><i class="mdi mdi-linkedin"></i></a>
                    <a href="https://github.com/andresmarquez02" class="pl-3"><i class="mdi mdi-github-circle"></i></a>
                </div>
            </div>
        </div>
        <div class="pt-10 pb-20 text-center">
            <h2 class="text-3xl font-bold">
                Compresor de Imagenes
            </h2>
        </div>
    </div>
    @yield("content")
    <div class="py-3 mt-4 text-center">
        <span>&copy; Andres Marquez {{date("Y")}}</span>
    </div>
    <script src="{{asset("plugins/alertifyjs/alertify.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>
