@extends('layouts.main_layouts')
@section('content')

<div>

    <h1 style="text-align: center; font-family: Arial, sans-serif;">Cadastro de Usuários</h1>

    <form action="cadastroSubmit" method="post" novalidate style="font-family: Arial, sans-serif; width: 50%; margin: 0 auto;">
        @csrf
        <label for="codigo" style="display: block; margin: 10px 0 5px;">Código:</label>
        <input type="number" name="codigo" id="codigo" value="{{ old('codigo') }}" min="1" max="10" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        @error('codigo')
            <div class="text-danger" style="color: red; margin-top: 5px;">{{ $message }}</div>
        @enderror

        <label for="nome" style="display: block; margin: 10px 0 5px;">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        @error('nome')
            <div class="text-danger" style="color: red; margin-top: 5px;">{{ $message }}</div>
        @enderror

        <label for="email" style="display: block; margin: 10px 0 5px;">Email:</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        @error('email')
            <div class="text-danger" style="color: red; margin-top: 5px;">{{ $message }}</div>
        @enderror

        <label for="senha" style="display: block; margin: 10px 0 5px;">Senha:</label>
        <input type="text" name="senha" id="senha" value="{{ old('senha') }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
        @error('senha')
            <div class="text-danger" style="color: red; margin-top: 5px;">{{ $message }}</div>
        @enderror

        <input type="submit" value="Enviar" style="display: block; width: 100%; padding: 10px; color: white; background-color: blue; border: none; border-radius: 5px; margin-top: 15px; cursor: pointer;">
    </form>

</div>

@endsection

