@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="default-space-between">

        <h1>Gestores</h1>

        <p><b>Todos os dados cadastrados pelo gestor são exibidos aqui.</b> Para editar as informações, clique no botão
            amarelo. Para remover, clique no botão vermelho</p>


        <div class="d-flex">
            <a class="btn-geral btn-green" href="{{ route('admin.add') }}">Adicionar gestor</a>
            <button class="btn-geral btn-red btn-multiple-actions remove-multiple-admins ms-2">Excluir</button>
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

                    @foreach ($admins as $admin)
                        @php
                            $date = date('d/m/Y H:i:s', strtotime($admin['created_at']));
                            
                            $option = "
                                        <div class='option-table-area'>
                                            <input type='checkbox' name='delete-admins[]' class='multiple-delete' value='{$admin['id']}'>
                                            <div class='checkbox-area'>
                                                <span class='iconify' data-icon='bi:check'></span>
                                            </div>
                                        </div>
                                    ";
                        @endphp

                        <tr>
                            <td>@php echo $option @endphp</td>
                            <td><b>{{ $admin['id'] }}<b></td>
                            <td>{{ $admin['name'] }}</td>
                            <td>{{ $admin['email'] }}</td>
                            <td>{{ $date }}</td>
                            <td>
                                <div class='d-flex'>
                                    <a href='{{ route('admin.edit', ['id' => $admin['id']]) }}'
                                        class='btn-yellow btn-action' title='Editar usuário'>
                                        @php echo $pen_iconify @endphp
                                    </a>
                                    <button class='btn-red btn-action remove-admin' data-value='{{ $admin['id'] }}'
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
