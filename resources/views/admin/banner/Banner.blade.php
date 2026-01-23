<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banner Home</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        table{
            margin: 50px, 20px;
            justify-content: center;
            align-items: center;
        }

        .img-banner{
            size: 20px;
            gap: 15px;
        }
    </style>
</head>
<body>

    <h1> manage banner </h1>
 <a href="{{ route ('addB')}}"> + new banner</a>

    <table>
        <thead>
            <tr>
                <th> Date </th>
                <th> Banner name </th>
                <th> Banner image</th>
                <th> Active </th>
                <th> Action </th>
            </tr>
        </thead>

        @foreach ($banner as $b )
        <tr>
            <td>{{$b->created_at->format('d/m/Y')}}</td>
            <td>{{$b->banner_name}}</td>
            <td><img src="{{ asset('img/'.$b->banner_image) }}" width="120"></td>
            <td><form action="{{ route('banner.toggle', $b->id_banner) }}" method="POST" class="img-banner">
                @csrf
                 @method('PATCH')
                <button>
                {{ $b->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                </button>
                </form>
            </td>
            <td><a href="{{ route ('editB', $b->id_banner)}}">Edit</a>

                <form action="{{ route('dBanner', $b->id_banner) }}"
                method="POST"
                onsubmit="return confirm('Yakin hapus banner ini?')">
                @csrf
                @method('DELETE')

                <button>Delete</button>
                </form>
        </td>
        </tr> 
        @endforeach
       
    </table>

</body>
</html>