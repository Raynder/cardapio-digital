@if(isset($produto))
    <div class="card-body">
        <div class="input-group input-group-sm">
            <select class="form-control" id="ingrediente" name="ingrediente">
                <option>Selecione</option>
                @foreach($ingredientes as $ingrediente)
                <option value="{{ $ingrediente->id }}">{{ $ingrediente->nome }}</option>
                @endforeach
            </select>
            <input type="text" placeholder="Quantidade" class="form-control">
            <span class="input-group-append">
                <button type="button" onclick="Ingredientes.addIngredienteProduto()" class="btn btn-info btn-flat">Add!</button>
            </span>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ingrediente</th>
                <th>Qtd</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="ingredientesProduto">

        </tbody>
    </table>
@else
<!-- Produto não cadastrado, mensagem centralizada. -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger text-center">
                <h3>Produto não cadastrado!</h3>
                <p>Para cadastrar ingredientes, primeiro cadastre o produto.</p>
            </div>
        </div>
    </div>
</div>
@endif