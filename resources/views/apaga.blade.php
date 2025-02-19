@extends('layouts.main_layouts')
@section('content')

<div style="font-family: Arial, sans-serif; padding: 30px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; max-width: 600px; margin: auto; text-align: center;">
    <h2 style="color: #ff6b6b;">Confirmação de Exclusão de Usuário</h2>

    <p style="font-size: 16px; color: #333;">Deseja realmente excluir as informações desse usuário?</p>

    <div style="margin-top: 20px; text-align: left; color: #555;">
        <b>Código:</b> {{ $cadastro->codigo }}<br/>
        <b>Nome:</b> {{ $cadastro->nome }}<br/>
        <b>E-mail:</b> {{ $cadastro->email }}<br/>
    </div>

    <div style="margin-top: 30px;">
        <form action="{{ route('apagaConfirma', ['id' => Crypt::encrypt($cadastro->id) ]) }}" method="post">

            @csrf
            <button type="submit" style="background-color: #ff6b6b; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Sim</button>
        </form>
        <a href="{{ route('listar') }}">
            <button style="background-color: #2ecc71; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Não</button>
        </a>
    </div>
</div>

@endsection
