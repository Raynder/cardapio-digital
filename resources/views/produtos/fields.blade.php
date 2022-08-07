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
        <label for="_img">Principal</label>
        <div class="form-group">
            <input type="file" class="hidden" id="_img" name="_img" value="">
            <input type="text" class="hidden" id="img_antiga" name="img_antiga" value="{{ isset($produto) ? $produto->img : '' }}">
            <label for="_img">
                <img for="_img" src="{{ isset($produto->img) ? asset($produto->img) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
            </label>
        </div>
    
        <label for="_capa">Capa</label>
        <div class="form-group">
            <input type="file" class="hidden" id="_capa" name="_capa" value="">
            <input type="text" class="hidden" id="capa_antiga" name="capa_antiga" value="{{ isset($produto) ? $produto->capa : '' }}">
            <label for="_capa">
                <img for="_capa" src="{{ isset($produto->capa) ? asset($produto->capa) : asset('img/admin/capa.png') }}" class="img-thumbnail" width="200" height="100">
            </label>
        </div>
        <input type="hidden" name="id" value="{{ isset($produto) ? $produto->id : '' }}" id="id">
    </div>
</div>
<script>
    setTimeout(function() {
        Ingredientes.consultarIngredientesProdutos();
        $('#preco').mask('000.000,00', {reverse: true});
    }, 2000);

    $(document).ready(function(){
        Crop.iniciarCrop('produtos','img', 1);
        Crop.iniciarCrop('produtos','capa');
        Form.recarregarForm();
    });
</script>