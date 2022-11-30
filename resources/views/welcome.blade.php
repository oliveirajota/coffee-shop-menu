<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zero 7 Bar e Restaurante</title>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">


            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 p-4">


                <div class="mx-auto">
                    <img src="/logo.svg" width="100%"/>
                    <h1 class="text-center">Cardápio Online</h1>
                </div>

                @foreach($groups as $group)

                    <h1>{{ $group->name }}</h1>

                    @foreach($group->product() as $product)


                        <div class="d-grid gap-3">
                            <div class="p-2 bg-light border">
                                <h2>
                                    {{ $product->name }}
                                    <span class="float-end">{{ $product->getPriceFormatted() }}</span>
                                </h2>
                                @if (!empty($product->description))
                                    <p>{{ $product->description }}</p>
                                @endif
                            </div>

                        </div>
                    @endforeach

                    <br />
                @endforeach


            </div>
        </div>
    </body>
</html>
