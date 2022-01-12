@extends('layouts.app')

@section('content')
<div class="col-md-4 offset-4 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <h4 class="card-title col-md-8">Detalhes do Contato</h4>
            <span class="col-md-4" style="text-align: right">Criado em: {{$contact->created_at->format('d/m/Y H:i:s')}}</span>
          </div>
        </div>
        <div class="card-body">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">{{$contact->nome}}</h1>
              <p class="lead"><i class="bx bx-phone mr-1"></i> Telefone: {{$contact->contato}}</p>
              <p class="lead"><i class="bx bx-envelope mr-1"></i> Email: {{$contact->email}}</p>
              <hr class="my-4">
              <p class="lead">
                <a class="btn btn-warning btn-sm" href="{{route('contacts.edit', $contact->id)}}"><i class="bx bxs-edit-alt mr-1"></i> Editar Contato</a>
                <a class="btn btn-danger btn-sm" href="{{$contact->id}}" data-contid={{$contact->id}} data-target="#delete" data-toggle="modal"><i class="bx bx-x-circle mr-1"></i> Delete Contato</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('pages.contacts.modalExcluirContact')
</div>
@push('scripts')
<script src='{{asset('js/javascript/generic.js')}}'></script>
@endpush
@endsection