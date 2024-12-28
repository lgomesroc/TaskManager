<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{
    /**
     * Exibir a lista de anexos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $attachments = Attachment::all();
        return view('attachments.index', compact('attachments'));
    }

    /**
     * Mostrar o formulário para criar um novo anexo.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('attachments.create');
    }

    /**
     * Armazenar um novo anexo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,doc,docx,txt|max:10240', // validação para arquivos de até 10MB
        ]);

        // Armazenando o arquivo no diretório 'attachments'
        $path = $request->file('file')->store('attachments', 'public');

        // Criando o registro no banco de dados
        Attachment::create([
            'user_id' => Auth::id(), // Armazena o ID do usuário logado
            'file_path' => $path,
            'original_name' => $request->file('file')->getClientOriginalName(),
        ]);

        return redirect()->route('attachments.index')->with('success', 'Anexo carregado com sucesso!');
    }

    /**
     * Exibir os detalhes de um anexo.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\View\View
     */
    public function show(Attachment $attachment)
    {
        return view('attachments.show', compact('attachment'));
    }

    /**
     * Exibir o formulário para editar um anexo.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\View\View
     */
    public function edit(Attachment $attachment)
    {
        return view('attachments.edit', compact('attachment'));
    }

    /**
     * Atualizar um anexo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Attachment $attachment)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx,txt|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Apagar o arquivo anterior
            Storage::disk('public')->delete($attachment->file_path);

            // Armazenar o novo arquivo
            $path = $request->file('file')->store('attachments', 'public');

            // Atualizar o registro no banco de dados
            $attachment->update([
                'file_path' => $path,
                'original_name' => $request->file('file')->getClientOriginalName(),
            ]);
        }

        return redirect()->route('attachments.index')->with('success', 'Anexo atualizado com sucesso!');
    }

    /**
     * Remover um anexo.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attachment $attachment)
    {
        // Excluir o arquivo do storage
        Storage::disk('public')->delete($attachment->file_path);

        // Remover o registro do banco de dados
        $attachment->delete();

        return redirect()->route('attachments.index')->with('success', 'Anexo removido com sucesso!');
    }

    /**
     * Fazer o download de um anexo.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function download(Attachment $attachment)
    {
        return Storage::disk('public')->download($attachment->file_path);
    }
}
