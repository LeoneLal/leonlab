<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" />
    </head>
    <body>
        <div class="block">
            <table>
                <tr>
                    <td><h1 class="blue">Facture</h1></td>
                    <td><img class="logo" src="{{ asset('images/logo.png') }}" alt="logo" /></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class="blue">FACTURE A</td>
                    <td class="blue">Facture n°</td>
                    <td class="blue">DATE</td>
                </tr>
                <tr>
                    <td>{{ $username }}</td>
                    <td>{{ $number }}</td>
                    <td>{{$mytime->toDateString()}}</td>
                </tr>
            </table>
            
            <hr />
            <table class="middle">
                <tr>
                    <td class="right blue">DESIGNATION</td>
                    <td class="blue">MONTANT</td>
                </tr>
            </table>
            <hr />
            <table>
                @foreach(Cart::content() as $jeu)
                <tr>
                    <td class="right">Jeu : {{ $jeu->name }}</td>
                    <td>{{ $jeu->price }} €</td>
                </tr>
                @endforeach
            </table> 
            <table>
                <tr>
                    <td class="right blue">TOTAL</td>
                    <td class="blue">{{ Cart::subtotal()}} €</td>
                </tr>
               
            </table>     
            <div class="line">
                
            </div>
        </div>
    </body>
</html>
