@csrf
<div class="form-group col-md-8">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da bebida" value="{{ isset($bebida) ? $bebida->nome : '' }}">
</div>
<div class="form-group col-md-4">
    <label for="preco">Preço</label>
    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço da bebida" value="{{ isset($bebida) ? $bebida->preco : '' }}">
</div>
<div class="form-group col-md-4">
    <label for="_img">Imagem</label>
    <div class="form-group">
        <input type="file" class="hidden" id="_img" name="_img" value="">
        <input type="text" class="hidden" id="img_antiga" name="img_antiga" value="{{ isset($bebida) ? $bebida->img : '' }}">
        <label for="_img">
            <img for="_img" src="{{ isset($bebida->img) ? asset($bebida->img) : asset('img/admin/avatar.png') }}" class="img-thumbnail" width="100" height="100">
        </label>
    </div>
</div>

<script>
    $(document).ready(function(){
        Crop.iniciarCrop('bebidas','img');
        Form.recarregarForm();
    });
</script>