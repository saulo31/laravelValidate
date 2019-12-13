@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Validação de dados com laravel
            </div>
            <div class="panel-body">
                @if(count($errors) > 0)

                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                <form id="form" class="form-horizontal" action="{{ route('clientes.store') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group erro_nome">
                        <label for="nome" class="control-label col-md-4">Nome</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{ old('nome') }}" name="nome">
                            @if($errors->has('nome'))
                                <span class="help-block"><strong>{{ $errors->first('nome') }}</strong></span>
                            @endif
                            <span id="erro_nome" class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group erro_email">
                        <label for="email" class="control-label col-md-4">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{ old('email') }}" name="email">
                            @if($errors->has('email'))
                                <span>
                                    <strong class="help-block">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <span id="erro_email" class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group erro_imagem">
                        <label for="imagem" class="control-label col-md-4">Imagem</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="imagem">
                            @if($errors->has('imagem'))
                                <span>
                                    <strong class="help-block">{{ $errors->first('imagem') }}</strong>
                                </span>
                            @endif
                            <span id="erro_imagem" class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group erro_numero">
                        <label for="numero" class="control-label col-md-4">Numero</label>
                        <div class="col-md-6">
                            <input class="form-control" type="number" value="{{ old('numero') }}" name="numero">
                            @if($errors->has('numero'))
                                <span>
                                    <strong class="help-block">{{ $errors->first('numero') }}</strong>
                                </span>
                            @endif
                            <span id="erro_numero" class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="md-6 col-md-offset-4">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('#form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"/clientes",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                console.log('success');
            },
            error: function(erro){
                let data = erro.responseJSON;
                $.each(data, function(index,value) {
                    $('.erro_' + index).addClass('has-error').css('transition','0.5');
                    $('#erro_' + index).html('<strong>' + value[0] + '</strong>');
                });
            }
        })
    });

});

</script>

@endsection
