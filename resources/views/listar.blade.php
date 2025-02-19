@extends('layouts.main_layouts')
@section('content')
<div>

    <h1 style="text-align: center; font-family: Arial, sans-serif;">Lista de Cadastros</h1>

    <table border="1" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Código</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Nome</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">email</th>
                <th style="border: 1px solid #ddd; padding: 8px;"></th>
                <th style="border: 1px solid #ddd; padding: 8px;"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cadastros as $cadastro)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $cadastro['codigo'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $cadastro['nome'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $cadastro['email'] }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('edita', ['id' => Crypt::encrypt($cadastro['id']) ]) }}" style="display: inline-block; padding: 10px 15px; color: white; background-color: green; text-decoration: none; border-radius: 5px;">Editar</a>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('apaga', ['id' => Crypt::encrypt($cadastro['id']) ]) }}" style="display: inline-block; padding: 10px 15px; color: white; background-color: red; text-decoration: none; border-radius: 5px;">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection
