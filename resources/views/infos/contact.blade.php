@extends('layouts.structure.index')

@section('content')
<div class="container my-5">

    <div class='d-flex justify-content-between align-items-center'>
        <h1>Fale Conosco</h1>
    </div>

    <div class="row d-flex mt-4">
        <div class="col-4">
            <span class="h6 d-block">
                <i class="fas fa-at me-2"></i>
                E-mail
            </span>
            <span>
                
                contato@brindesdeluxo.com
            </span>
        </div>

        <div class="col-4">
            <span class="h6 d-block">
                <i class="fas fa-phone-volume me-2"></i>
                Telefone
            </span>
            <span>        
                +55 11 1234-5678
            </span>
        </div>

        <div class="col-4">
            <span class="h6 d-block">
                <i class="fas fa-phone-volume me-2"></i>
                Horário de atendimento
            </span>
            <span class="d-block">
                Segunda a sexta-feira, das 09h as 18h
            </span>
            <span>
                Sábado, das 10h as 14h
            </span>
        </div>

    </div>
</div>
@endsection