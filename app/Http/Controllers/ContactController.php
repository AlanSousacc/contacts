<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    protected $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = $this->contact->paginate(10);

        return view('pages.contacts.indexContact', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.contacts.createContact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $data = $request->except('_token');

        try {
            $contact = $this->contact->create($data);

            DB::beginTransaction();
            $saveContact = $contact->save();

            if (!$saveContact)
                return redirect()->back()->with('error', 'Falha ao salvar este contato!');

            DB::commit();
            return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
            
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getPrevious()->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->find($id);
        return view('pages.contacts.detailContact', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->contact->find($id);
        return view('pages.contacts.editContact', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $data = $request->except('_token');

        try {
            DB::beginTransaction();
            if (!$contact = $this->contact->find($id))
                return redirect()->back()->with('error', 'Nenhum contato encontrado');

            $contact->nome     = $data['nome'];
            $contact->contato  = $data['contato'];
            $contact->email    = $data['email'];
            $save              = $contact->save();

            if (!$save)
                return redirect()->back()->with('error', 'Falha ao atualizar este contato!');

            DB::commit();
            return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
            
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getPrevious()->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            if (!$contact = $this->contact->find($request->contact_id))
            return redirect()->route('contacts.index')->with('error', 'Nenhum contato encontrado');        

            $contact->delete();
            DB::commit();
            return redirect()->route('contacts.index')->with('success', 'Contato deletado com sucesso!');
      
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('contacts.index')->with('error', $e->getMessage());
        }
    }
}
