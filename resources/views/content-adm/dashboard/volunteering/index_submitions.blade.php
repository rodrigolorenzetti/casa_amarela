@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="default-space-between">

        <h1>Submissões do voluntariado - {{$volunteering->title}}</h1>

        <p><b>Todos os dados cadastrados pelo gestor são exibidos aqui.</b> Para editar as informações, clique no botão
            amarelo. Para remover, clique no botão vermelho</p>

        <div class="d-flex">
            <a href="{{route('volunteering.list_submitions', ['volunteering_id' => $volunteering['id']])}}" class="btn-geral btn-blue">Voltar</a>
            <button class="btn-geral btn-red btn-multiple-actions remove-multiple-volunteerings-submitions ms-2">Excluir</button>
        </div>
        <div class="table-responsive">
            <table class="table" id="dataTable" data-order='[[0, "desc"]]' width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th><b>ID</b></th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Criado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($submitions as $submition)
                        @php
                            $date = date('d/m/Y H:i:s', strtotime($submition['created_at']));
                            
                            $option = "
                                            <div class='option-table-area'>
                                                <input type='checkbox' name='delete-volunteerings-submitions[]' class='multiple-delete' value='{$submition['id']}'>
                                                <div class='checkbox-area'>
                                                    <span class='iconify' data-icon='bi:check'></span>
                                                </div>
                                            </div>
                                        ";
                        @endphp

                        <tr>
                            <td>@php echo $option @endphp</td>
                            <td><b>{{ $submition['id'] }}<b></td>
                            <td>{{ $submition['name'] }}</td>
                            <td>{{ $submition['email'] }}</td>
                            <td>{{ $date }}</td>
                            <td>
                                <div class='d-flex'>
                                    <a href='{{ route('volunteering.details_submitions', ['id' => $submition['id']]) }}'
                                        class='btn-green btn-action' title='Editar voluntariado'>
                                        @php echo $eye_iconify @endphp
                                    </a>
                                    <button class='btn-red btn-action remove-volunteering-submition' data-value='{{ $submition['id'] }}'
                                        title='Excluir usuário'>
                                        @php echo $trash_iconify @endphp
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
