@csrf
<div style="display: flex;">
    <div class="col-md-8">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" required="required" id="nome" name="nome" placeholder="Nome do produto" value="{{ isset($produto) ? $produto->nome : '' }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" required="required" id="descricao" name="descricao" rows="3" placeholder="Descrição do produto">{{ isset($produto) ? $produto->descricao : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control" required="required" id="preco" name="preco" placeholder="Preço do produto" value="{{ isset($produto) ? $produto->preco : '' }}">
        </div>
    </div>
    <div class="col-md-4">
        <label for="_foto">Principal</label>
        <div class="form-group">
                <input type="file" class="hidden" id="_foto" name="_foto" value="">
                <label for="_foto">
                    <img for="_foto" src="{{ isset($user->foto) ? asset($user->foto) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
                </label>
        </div>
    
        <label for="_capa">Capa</label>
        <div class="form-group">
                <input type="file" class="hidden" id="_capa" name="_capa" value="">
                <label for="_capa">
                    <img for="_capa" src="{{ isset($user->capa) ? asset($user->capa) : asset('img/admin/capa.png') }}" class="img-thumbnail" width="200" height="100">
                </label>
        </div>
        <input type="hidden" name="id" value="{{ isset($produto) ? $produto->id : '' }}" id="id">
    </div>
</div>