<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Акт на утилизацию</title>
    <style>
        *{
            font-family: "DejaVu Sans", sans-serif;
        }
        body{
            font-size: 12px;
        }
        p.text{
            text-indent: 1.5em;
            text-align: justify;
        }
        div.header {
            height: 70px;
            display: block;
            text-align: right; 
            position: running(header);
        }
        div.header img{
            display: inline-block;
            max-height: 70px;
            width: auto;
        }
        div.footer {
            height: 8%;
            display: block;
            text-align: right;
            position: running(footer);
        }
        .text-center{
            text-align: center;
        }
        .text-left{
            text-align: left;
        }
        .font-bold{
            font-weight: bold;
        }
        @page {
            @top-center { content: element(header) }
        }
        @page { 
            @bottom-center { content: element(footer) }
        }
    </style>
</head>
<body>
    <div class='header'>
        @if($company->logo)
        <img src="{{public_path('/storage/').$company->logo}}" alt="{{$company->name}}">
        @endif
    </div>
    <p class="text-center">Акт приема на утилизацию отходов № {{$order->id}}</p>
    <p class="text-center font-bold">Регистрационный номер ______</p>
    <p class="text">
        <span class="font-bold">{{\App\Models\Company::$forms[$order->company->form]}} «{{$order->company->name}}»</span> ({{\App\Models\Company::$short_forms[$order->company->form]}} «{{$order->company->name}}») имеющее Лицензию №{{$order->company->license}} от {{$order->company->license_date}} г., именуемое в дальнейшем «Исполнитель», в лице Генерального директора {{$order->company->leader2}}, действующего на основании Устава, с одной стороны, и {{\App\Models\Company::$forms[$order->client->form]}} «{{$order->client->name}}» ({{\App\Models\Company::$short_forms[$order->client->form]}} «{{$order->client->name}}»), в лице _______________________, действующего на основании Устава, именуемое по договору «Заказчик», с другой стороны, а вместе именуемые "Стороны", составили Акт обезвреживания отходов о нижеследующем:
        В соответствии с договором № {{$order->company->prefix}} {{$order->doc}} от {{$order->doc_date}} года Исполнитель {{\App\Models\Company::$short_forms[$order->company->form]}} {{$order->company->name}}» на основании лицензии №{{$order->company->license}} от {{$order->company->license_date}} г. оказал для Заказчика {{\App\Models\Company::$forms[$order->client->form]}} {{$order->client->name}} услуги по приему на утилизацию следующие отходы:
    </p>
    <table cellspacing="0" cellspadding="5px" border="1">
        <tr>
            <th class="text-left">Наименование отхода</th>
            <th class="text-left">Код отхода по ФККО*</th>
            <th class="text-left">Нормативно-техническая документация</th>
            <th class="text-left">Количество тонн</th>
            <th class="text-left">Вид деятельности</th>
        </tr>
        @foreach($order->services as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->code->code}}</td>
            <td>{{$item->doc}}</td>
            <td>{{$item->size}}</td>
            <td>{{$item->type}}</td>
        </tr>
        @endforeach
    </table>
    <p>Заказчик не имеет претензий к качеству оказанных Исполнителем услуг.</p>
    <br><br>
    <div class='footer' text-align="right">
        Лицензия № <b>{{$company->license}} от {{$company->license_date}}</b>
    </div>
</body>
</html>