<?php

function cadastrar($nome,$email,$telefone){

    $contatosAuxiliar = pegarContatos(); 

    $contato = [
        'id'      => uniqid(),
        'nome'    => $nome,
        'email'   => $email,
        'telefone'=> $telefone
    ];

    array_push($contatosAuxiliar, $contato);

    codificarMandar($contatosAuxiliar);
}


function pegarContatos($valor_buscado = null){

    if ($valor_buscado == null){

        $contatosAuxiliar = file_get_contents('contatos.json');

        $contatosAuxiliar = json_decode($contatosAuxiliar, true);
  
        return $contatosAuxiliar;
    } else {
        return buscarContato($valor_buscado);
    }
}


function excluirContato($id){

    $contatosAuxiliar = pegarContatos();

    foreach ($contatosAuxiliar as $posicao => $contato){

        if($id == $contato['id']) {

            unset($contatosAuxiliar[$posicao]);
        }
    }

    codificarMandar($contatosAuxiliar);
}

function editarContato($id){

    $contatosAuxiliar = pegarContatos();

    foreach ($contatosAuxiliar as $contato){

        if ($contato['id'] == $id){
 
            return $contato;
        }
    }
}

function salvarContatoEditado($id,$nome,$email,$telefone){

    $contatosAuxiliar = pegarContatos();

    foreach ($contatosAuxiliar as $posicao => $contato){

        if ($contato['id'] == $id){

            $contatosAuxiliar[$posicao]['nome'] = $nome;
            $contatosAuxiliar[$posicao]['email'] = $email;
            $contatosAuxiliar[$posicao]['telefone'] = $telefone;
            break;
        }
    }

    codificarMandar($contatosAuxiliar);
}
 function codificarMandar($contatosAuxiliar){

        $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT); 
        
        file_put_contents('contatos.json', $contatosJson); 
        header("Location: index.phtml"); 

    }

function buscarContato($nome){
 
    $contatosAuxiliar = pegarContatos();

    $contatosEncontrados = [];


    foreach ($contatosAuxiliar as $contato){

        if ($contato['nome'] == $nome){

            $contatosEncontrados[] = $contato;
        }
    }

    return $contatosEncontrados;
}
//ROTAS
switch($_GET['acao']){
    case "cadastrar":
    cadastrar($_POST['nome'],$_POST['email'],$_POST['telefone']);
        break;
    case "editar":
        salvarContatoEditado($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['telefone']);
        break;
    case "excluir":
        excluirContato($_GET['id']);
        break;
}