@foreach($produtos as $key => $produto)
    <tr>
        <th>{{$produto->nome}}</th>
        <th>R${{$produto->preco}}</th>
        <td>{{$venda->vendaProdutos[$key]->qtd}}</td>
        <td>{{$produto->codebar}}</td>
    </tr>
@endforeach
