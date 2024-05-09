<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicaRequest;
use App\Http\Requests\MusicaUpdRequest;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function cadastroMusica(MusicaRequest $request){
        $musica = Musica::create([
            'titulo' => $request->titulo,
            'duracao' => $request->duracao,
            'artista' => $request->artista, 
            'genero' => $request->genero,
            'nacionalidade' => $request->nacionalidade,
            'ano_lancamento' => $request->ano_lancamento,
            'album' => $request->album
        ]);

        return response()->json([
            "success" => true,
            "message" => "Música cadastrada com sucesso.",
            "data" => $musica
        ],200);
    }

    public function excluirMusica($id){
        $musica = Musica::find($id);

        if(!isset($musica)){
            return response()->json([
                'status' => false,
                'message' => 'Música não encontrada.'
            ]);
        }

        $musica->delete();

        return response()->json([
                'status'=> false,
                'message' => "Música excliuída com sucesso."
            ]);
    }

    public function atualizarMusica(MusicaUpdRequest $request){
        $musica = Musica::find($request->id);
        
        if(!isset($musica)){
            return response()->json([
                'status' => false,
                'message' => "Música não encontrada."
            ]);
        }

    if(isset($request->titulo)){
        $musica->titulo = $request->titulo;
        }

    if(isset($request->duracao)){
        $musica->duracao = $request->duracao;
        }

    if(isset($request->artista)){
        $musica->artista = $request->artista;
        }

    if(isset($request->genero)){
        $musica->genero = $request->genero;
        }

    if(isset($request->nacionalidade)){
        $musica->nacionalidade = $request->nacionalidade;
        }
    
    if(isset($request->ano_lancamento)){
        $musica->ano_lancamento = $request->ano_lancamento;
        }
    
    if(isset($request->album)){
        $musica->album = $request->album;
        }

    $musica->update();

    return response()->json([
        'status' => true,
        'message' => "Música atualizada."
    ]);
}

    public function retornarTodasMusicas(){
        $musica = Musica::all();

    return response()->json([
        'status' => true,
        'data' => $musica
    ]);
    }

    public function pesquisarPorId($id){
        $musica = Musica::find($id);
    
        if($musica == null){
            return response()->json([
                'stattus' => false,
                'message' => "Música não encontrada."
            ]);
        }
    
        return response()->json([
            'status'=> true,
            'data'=> $musica
        ]);
    }

    public function pesquisarPorTitulo(Request $request){
        $musicas = Musica::where('titulo', 'like', '%'.$request->titulo.'%')->get();
    
    if(count($musicas) > 0){
    
        return response()->json([
            'status' => true,
            'data' => $musicas
        ]);
    }
        return response()->json([
        'status'=> false,
        'message' => "Não há resultado para pesquisa."
    ]);
    }

    public function pesquisarPorArtista(Request $request){
        $musicas = Musica::where('artista', 'like', '%'.$request->artista.'%')->get();
    
    if(count($musicas) > 0){
    
        return response()->json([
            'status' => true,
            'data' => $musicas
        ]);
    }
        return response()->json([
        'status'=> false,
        'message' => "Não há resultado para pesquisa."
    ]);
    }
}