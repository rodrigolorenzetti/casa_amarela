@extends('content-adm.dashboard.shared.layout')
@section('content')
    <a href="{{route('volunteering.list_submitions', ['volunteering_id' => $volunteering['id']])}}" class="btn-geral btn-blue">Voltar</a>
    <h1>Submissão do voluntariado - {{$volunteering->title }}</h1>
    <p>Confira detalhes do formulário submetido para esta oportunidade:</p>

    <hr>

    <p>Nome: {{$submition->name}}</p>
    <p>E-mail: {{$submition->email}}</p>
    <p>Telefone: {{$submition->phone}}</p>
    <p>Mensagem: {{$submition->message}}</p>
    
@endsection
