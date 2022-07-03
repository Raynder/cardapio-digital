    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name"
                value="{{ isset($user->name) ? $user->name : '' }}" placeholder="Digite seu nome">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email"
                value="{{ isset($user->name) ? $user->email : '' }}" placeholder="email@dominio.com">
        </div>
    </div>
    <div class="form-group row">
        <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="telefone" name="telefone"
                value="{{ isset($user->name) ? $user->telefone : '' }}" placeholder="(62) 9 9999-9999">
        </div>
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