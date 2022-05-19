<form class="form-horizontal" action="{{ route('perfil.update') }}" method="POST">
    @csrf
    <div class="form-group row">
        <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($user->empresa) ? $user->empresa : '' }}" placeholder="Digite o nome de seu comercio">
        </div>
    </div>

    <div class="form-group row">
        <label for="_foto" class="col-sm-2 col-form-label">Imagem</label>
        <div class="col-sm-6">
            <input type="file" class="hidden" id="_foto" name="_foto">
            <label for="_foto">
                <img for="_foto" src="{{ isset($user->foto) ? asset($user->foto) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label for="_capa" class="col-sm-2 col-form-label">Capa</label>
        <div class="col-sm-6">
            <input type="file" class="hidden" id="_capa" name="_capa">
            <label for="_capa">
                <img for="_capa" src="{{ isset($user->capa) ? asset($user->capa) : asset('img/admin/capa.png') }}" class="img-thumbnail" width="200" height="100">
            </label>
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
    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form>