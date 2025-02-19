@extends('layouts.main_layouts')
@section('content')
<div style="font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
    <h1 style="text-align: center;">Tabela de Usuários</h1>
    <b style="color: #333;">Código:</b> {{$codigo}} <br/>
    <b style="color: #333;">Nome:</b> {{$nome}} <br/>
    <b style="color: #333;">E-mail:</b> {{$email}} <br/>
    <br/>
</div>
@endsection
