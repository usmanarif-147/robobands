<?php

namespace App\Livewire\Admin\Cards;

use App\Models\Card;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class Create extends Component
{

    public $description;
    public $quantity;

    protected $rules = [
        'description' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
    ];

    public function store()
    {
        $this->validate();

        for ($i = 0; $i < $this->quantity; $i++) {
            Card::create([
                'uuid' => Str::uuid(),
                'description' => $this->description,
                'status' => 0,
            ]);
        }

        $this->exportCsv();

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'card created successfully.',
            'icon' => 'success',
        ]);

        $this->reset();
        // return redirect()->route('cards');
    }

    public function exportCsv()
    {
        $data = Card::latest('cards.created_at')
            ->take($this->quantity)
            ->get();

        return redirect()->route('export.new.cards')->with([
            'data' => $data
        ]);
    }

    public function render()
    {
        return view('livewire.admin.cards.create');
    }
}
