<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        //testando a conexão com BD
        try {
            DB::connection()->getPdo();
            echo "Conexão OK!";
        } catch (\PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
        }
        return view('main', ['codigo' => null, 'nome' => null, 'email' => null, 'senha' => null]);
    }

    public function listar()
    {
        //pegar todos os cadastros no BD
        $cadastros = Cadastro::all()->toArray();
        return view('listar', ['cadastros' => $cadastros]);
    }

    public function cadastro()
    {
        //dd('Chegou aqui!');
        return view('cadastro');
    }

    public function cadastroSubmit(Request $request)
    {
        $request->validate(
            //regras
            [
                'codigo' => 'required',
                'nome' => 'required',
                'email' => 'required',
                'senha' => 'required'
            ],
            //mensagens
            [
                'codigo.required' => 'O campo codigo é obrigatório!',
                'nome.required' => 'O campo nome é obrigatório!',
                'email.required' => 'O campo e-mail é obrigatório',
                'senha.required' => 'O campo senha é obrigatório!',
            ]
        );

        $cadastro = new Cadastro();
        $cadastro->codigo = $request->codigo;
        $cadastro->nome = $request->nome;
        $cadastro->email = $request->email;
        $cadastro->senha = bcrypt($request->senha);
        $cadastro->save();

        $dados = array(
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => $request->senha,
        );
        return view('main', $dados);
    }

    public function editaCadastro($id)
    {
        $id = Crypt::decrypt($id);
        if ($id == null) {
            return redirect()->route('listar');
        }

        //pega dados do cadastro
        $cadastro = Cadastro::find($id);
        return view('edita', ['cadastro' => $cadastro]);
    }

    public function editaCadastroSubmit(Request $request)
    {
        $request->validate(
            // regras
            [
                'codigo' => 'required',
                'nome' => 'required',
                'email' => 'required',
                'senha' => 'required'
            ],
            // mensagens
            [
                'codigo.required' => 'O campo codigo é obrigatório!',
                'nome.required' => 'O campo nome é obrigatório!',
                'email.required' => 'O campo e-mail é obrigatório',
                'senha.required' => 'O campo senha é obrigatório!',
            ]
        );

        if ($request->cadastro_id == null) {
            return redirect()->route('listar');
        }
        $id = Crypt::decrypt($request->cadastro_id);

        if ($id == null) {
            return redirect()->route('listar');
        }

        // carrega dados
        $cadastro = Cadastro::find($id);

        if ($cadastro === null) {
            return redirect()->route('listar')->withErrors(['erro' => 'Usuário não encontrado.']);
        }


        // atualiza os dados
        $cadastro->codigo = $request->codigo;
        $cadastro->nome = $request->nome;
        $cadastro->email = $request->email;
        $cadastro->senha = bcrypt($request->senha); // Recomendo usar hash para senhas
        $cadastro->save();

        return redirect()->route('listar')->with('sucesso', 'Usuário atualizado com sucesso.');
    }

    public function apagaCadastro($id)
    {
        $id = Crypt::decrypt($id);

        if ($id == null) {
            return redirect()->route('listar');
        }

        //pega dados do cadastro
        $cadastro = Cadastro::find($id);

        return view('apaga', ['cadastro' => $cadastro]);
    }

    public function apagaCadastroConfirma($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('listar')->withErrors(['erro' => 'Falha ao descriptografar o ID.']);
        }

        if ($id == null) {
            return redirect()->route('listar')->withErrors(['erro' => 'ID inválido.']);
        }

        // Pega dados do cadastro
        $cadastro = Cadastro::find($id);

        if ($cadastro === null) {
            return redirect()->route('listar')->withErrors(['erro' => 'Usuário não encontrado.']);
        }

        // Deletar o cadastro
        //$cadastro->delete();

        //para apagar permanentemente do DB
        $cadastro->forceDelete();

        return redirect()->route('listar');
    }
}
