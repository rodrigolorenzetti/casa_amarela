@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="default-space-between">

        <h1>Voluntariados</h1>

        <p><b>Todos os dados cadastrados pelo gestor são exibidos aqui.</b> Para editar as informações, clique no botão
            amarelo. Para remover, clique no botão vermelho</p>

        <div class="d-flex">
            <a class="btn-geral btn-green" href="{{ route('volunteering.add') }}">Adicionar voluntariado</a>
            <button class="btn-geral btn-red btn-multiple-actions remove-multiple-volunteerings ms-2">Excluir</button>
        </div>
        <div class="table-responsive">
            <table class="table" id="dataTable" data-order='[[0, "desc"]]' width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th><b>ID</b></th>
                        <th>Nome</th>
                        <th>Criado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($volunteering as $volunteering_item)
                        @php
                            $date = date('d/m/Y H:i:s', strtotime($volunteering_item['created_at']));
                            
                            $option = "
                                            <div class='option-table-area'>
                                                <input type='checkbox' name='delete-volunteerings[]' class='multiple-delete' value='{$volunteering_item['id']}'>
                                                <div class='checkbox-area'>
                                                    <span class='iconify' data-icon='bi:check'></span>
                                                </div>
                                            </div>
                                        ";
                        @endphp

                        <tr>
                            <td>@php echo $option @endphp</td>
                            <td><b>{{ $volunteering_item['id'] }}<b></td>
                            <td>{{ $volunteering_item['title'] }}</td>
                            <td>{{ $date }}</td>
                            <td>
                                <div class='d-flex'>
                                    <a href='{{ route('volunteering.edit', ['id' => $volunteering_item['id']]) }}'
                                        class='btn-yellow btn-action' title='Editar voluntariado'>
                                        @php echo $pen_iconify @endphp
                                    </a>
                                    <a href='{{ route('volunteering.list_submitions', ['volunteering_id' => $volunteering_item['id']]) }}'
                                        class='btn-green btn-action' title='visualizar submissoes voluntariado'>
                                        <span class="iconify" data-icon="fluent:form-24-filled"></span>
                                    </a>
                                    <button class='btn-red btn-action remove-volunteering' data-value='{{ $volunteering_item['id'] }}'
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
