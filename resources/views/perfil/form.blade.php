<div style="display: flex;">
    <div class="col-md-8">
        <div class="form-group row">
             <p><label for="name" style="margin: 0;" class="">Nome</label></p>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="name" name="name"
                     value="{{ isset($user->name) ? $user->name : '' }}" placeholder="Digite seu nome">
             </div>
         </div>
         <div class="form-group row">
             <p><label for="email" style="margin: 0;" class="">Email</label></p>
             <div class="col-sm-10">
                 <input type="email" class="form-control" id="email" name="email"
                     value="{{ isset($user->name) ? $user->email : '' }}" placeholder="email@dominio.com">
             </div>
         </div>
         <div class="form-group row">
             <p><label for="telefone" style="margin: 0;" class="">Telefone</label></p>
             <div class="col-sm-10">
                 <input type="text" class="form-control" id="telefone" name="telefone"
                     value="{{ isset($user->name) ? $user->telefone : '' }}" placeholder="(62) 9 9999-9999">
             </div>
         </div>
         <div style="width: 80%;" class="form-group">
            <label for="customRange1">Borda dos produtos</label>
            <input name="borda"  type="range" class="custom-range" id="customRange1" min="0" max="10" step="1" value="{{ isset($cliente->borda) ? $cliente->borda : '0' }}">
        </div>
         {{-- <div class="form-group row">
             <div class="offset-sm-2 col-sm-10">
                 <div class="checkbox">
                     <label>
                         <input type="checkbox"> I agree to the <a href="#">terms and
                             conditions</a>
                     </label>
                 </div>
             </div>
         </div> --}}
    </div>
    <div>
        <div class="form-group row">
            <p><label for="cor_principal" style="margin: 0;" class="">Cor principal</label></p>
            <div class="col-sm-10">
                <input type="color" class="form-control" id="cor_principal" name="cor_principal"
                    value="{{ isset($cliente->cor_principal) ? $cliente->cor_principal : '#e31616' }}" placeholder="Cor">
            </div>
            <p><label for="cor_secundaria" style="margin: 0;" class="">Cor secundária</label></p>
            <div class="col-sm-10">
                <input type="color" class="form-control" id="cor_secundaria" name="cor_secundaria"
                    value="{{ isset($cliente->cor_secundaria) ? $cliente->cor_secundaria : '#dd6868' }}" placeholder="Cor">
            </div>
            <p><label for="cor_terciaria" style="margin: 0;" class="">Cor terciária</label></p>
            <div class="col-sm-10">
                <input type="color" class="form-control" id="cor_terciaria" name="cor_terciaria"
                    value="{{ isset($cliente->cor_terciaria) ? $cliente->cor_terciaria : '#F4E3B3' }}" placeholder="Cor">
            </div>
            <p><label for="cor_fonte" style="margin: 0;" class="">Fonte dos cards</label></p>
            <div class="col-sm-10">
                <input type="color" class="form-control" id="cor_fonte" name="cor_fonte"
                    value="{{ isset($cliente->cor_fonte) ? $cliente->cor_fonte : '#ffffff' }}" placeholder="Cor">
            </div>
        </div>

    </div>
</div>