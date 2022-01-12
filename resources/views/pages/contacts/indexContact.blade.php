@extends('layouts.app')

@section('content')
<div class="col-md-4 offset-8 fixed-top mt-3" style="z-index: 9999;">
  @include('layouts.messages.master-message')
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <h4 class="card-title col-md-8">Contatos</h4>
            <a class="btn btn-light col-md-4" href="{{route('contacts.create')}}"> <i class='bx bx-plus'></i> Novo Contato</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <th>Nome</th>
                  <th>Contato</th>
                  <th>Email</th>
                  <th class="text-center">Opções</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contatos as $item)
                <tr>
                  <th scope="row">{{$item->id}}</th>
                  <td>{{$item->nome}}</td>
                  <td>{{$item->contato}}</td>
                  <td>{{$item->email}}</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('contacts.edit', $item->id)}}"><i class="bx bxs-edit-alt mr-1"></i> Edit Contato</a>
                        <a class="dropdown-item" href="{{$item->id}}" data-contid={{$item->id}} data-target="#delete" data-toggle="modal"><i class="bx bx-x-circle mr-1"></i> Delete Contato</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-between">
            <div class="justify-content-start"><p>Mostrando {{$contatos->count()}} contatos de um total de {{$contatos->total()}}</p></div>
            <div class="justify-content-end">{{$contatos->links()}}</div>
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