<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;


class ContactIndex extends Component
{
    use WithPagination;

    public $statusUpdate = false;

    public $paginate = 5;
    public $search;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated'
    ];

    protected $queryString = ['search'];

    public function render()
    {
        $data = [
            'contacts' => $this->search === null ?
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ];
        return view('livewire.contact-index', $data);
    }

    public function getContact($id)
    {
        $this->statusUpdate = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        session()->flash('message', 'Contact was deleted');
    }

    public function handleStored($contact)
    {
        session()->flash('message', 'Contact ' . $contact['name'] . ' was created');
    }

    public function handleUpdated($contact)
    {
        session()->flash('message', 'Contact ' . $contact['name'] . ' was updated');
    }
}
