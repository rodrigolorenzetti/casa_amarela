@extends('content-adm.dashboard.shared.layout')
@section('content')
    <div class="default-space-between">

        <h1>Opções de doação</h1>

        <p><b>Todos os dados cadastrados pelo gestor são exibidos aqui.</b> Para editar as informações, clique no botão
            amarelo. Para remover, clique no botão vermelho</p>

        <div class="d-flex">
            <a class="btn-geral btn-green" href="{{ route('donation_options.add') }}">Adicionar opção de doação</a>
            <button class="btn-geral btn-red btn-multiple-actions remove-multiple-donation-options ms-2">Excluir</button>
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

                    @foreach ($donation_options as $donation_option)
                        @php
                            $date = date('d/m/Y H:i:s', strtotime($donation_option['created_at']));
                            
                            $option = "
                                            <div class='option-table-area'>
                                                <input type='checkbox' name='delete-donation-options[]' class='multiple-delete' value='{$donation_option['id']}'>
                                                <div class='checkbox-area'>
                                                    <span class='iconify' data-icon='bi:check'></span>
                                                </div>
                                            </div>
                                        ";
                        @endphp

                        <tr>
                            <td>@php echo $option @endphp</td>
                            <td><b>{{ $donation_option['id'] }}<b></td>
                            <td>{{ $donation_option['title'] }}</td>
                            <td>{{ $date }}</td>
                            <td>
                                <div class='d-flex'>
                                    <a href='{{ route('donation_options.edit', ['id' => $donation_option['id']]) }}'
                                        class='btn-yellow btn-action' title='Editar usuário'>
                                        @php echo $pen_iconify @endphp
                                    </a>
                                    <button class='btn-red btn-action remove-donation-option' data-value='{{ $donation_option['id'] }}'
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
