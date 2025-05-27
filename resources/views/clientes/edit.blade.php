@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Editar Dados</h2>
    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Celular</label>
            <input type="text" name="celular" value="{{ $cliente->celular }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Dados</button>
    </form>

    <hr>

    <h2>Agendar Serviço</h2>
    <form action="{{ route('agendamentos.store') }}" method="POST">
        @csrf

        <input type="hidden" name="id_cliente" value="{{ $cliente->id }}">

        <div class="mb-3">
            <label>Serviço</label>
            <select name="id_servico" id="servico" class="form-control">
                <option value="">Selecione um serviço</option>
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Barbeiro</label>
            <select name="id_barbeiro" id="barbeiro" class="form-control">
                <option value="">Selecione um barbeiro</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Data e Hora</label>
            <input type="datetime-local" name="data_hora" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Agendar</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#servico').change(function(){
        var servicoID = $(this).val();
        if(servicoID){
            $.ajax({
                url: '/barbeiros-por-servico/' + servicoID,
                type: 'GET',
                success: function(data){
                    $('#barbeiro').empty();
                    $('#barbeiro').append('<option value="">Selecione um barbeiro</option>');
                    $.each(data, function(key, value){
                        $('#barbeiro').append('<option value="'+ value.id +'">'+ value.nome +'</option>');
                    });
                }
            });
        }else{
            $('#barbeiro').empty();
            $('#barbeiro').append('<option value="">Selecione um barbeiro</option>');
        }
    });
});
</script>
@endsection
