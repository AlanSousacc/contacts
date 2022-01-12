<div class="form py-2 mb-2">
  <div class="form-row row">
    <div class="form-group col-md-4">
      <label for="name">Nome</label>
      <input type="text" class="form-control" placeholder="Informe o nome do contato" value="{{isset($contact) ? $contact->nome : old('nome')}}" id="nome" name="nome" required>
    </div>
    <div class="form-group col-md-4">
      <label for="contato">Contato</label>
      <input type="text" class="form-control" placeholder="Informe o número do contato" id="contato" value="{{isset($contact) ? $contact->contato : old('contato')}}" name="contato" maxlength="9" minlength="9" required>
    </div>
    <div class="form-group col-md-4">
      <label for="email">Email</label>
      <input type="email" class="form-control" placeholder="Informe o endereço de email do contato" id="email" value="{{isset($contact) ? $contact->email : old('email')}}" name="email">
    </div>
  </div>
</div>