@extends('layouts.main_layouts')
@section('content')

<div style="font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; max-width: 600px; margin: auto;">
    <h2 style="color: #333; text-align: center;">Edição de Cadastro de Usuários</h2>

    <form action="{{ route('editaSubmit') }}" method="post" novalidate style="margin-top: 20px;">
        @csrf
        <input type="hidden" name="cadastro_id" value="{{ Crypt::encrypt($cadastro->id) }}">

        <label for="codigo" style="display: block; margin-bottom: 5px; color: #333;">Código:</label>
        <input type="number" name="codigo" id="codigo" value="{{ old('codigo', $cadastro->codigo) }}" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        @error('codigo')
            <div class="text-danger" style="color: red; margin-bottom: 15px;">{{ $message }}</div>
        @enderror

        <label for="nome" style="display: block; margin-bottom: 5px; color: #333;">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $cadastro->nome) }}" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        @error('nome')
            <div class="text-danger" style="color: red; margin-bottom: 15px;">{{ $message }}</div>
        @enderror

        <label for="email" style="display: block; margin-bottom: 5px; color: #333;">Email:</label>
        <input type="text" name="email" id="email" value="{{ old('email', $cadastro->email) }}" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        @error('email')
            <div class="text-danger" style="color: red; margin-bottom: 15px;">{{ $message }}</div>
        @enderror

        <label for="senha" style="display: block; margin-bottom: 5px; color: #333;">Senha:</label>
        <input type="text" name="senha" id="senha" value="{{ old('senha', $cadastro->senha) }}" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        @error('senha')
            <div class="text-danger" style="color: red; margin-bottom: 15px;">{{ $message }}</div>
        @enderror

        <input type="submit" value="Enviar" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%;">
    </form>
</div>

@endsection
