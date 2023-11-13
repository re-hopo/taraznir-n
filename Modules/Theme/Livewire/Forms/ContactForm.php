<?php

namespace Modules\Theme\Livewire\Forms;


use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Modules\Theme\Models\FormEntry;
use Modules\Theme\Models\FormEntryMeta;

class ContactForm extends Component implements HasForms
{
    use InteractsWithForms;
    use LivewireAlert;

    public string|null
        $name,
        $email,
        $phone,
        $subject,
        $text,
        $message;

    protected array $rules = [
        'name'      => 'nullable|max:30',
        'email'     => 'required|email',
        'subject'   => 'nullable|max:100',
        'text'      => 'required|min:15',
        'phone'     => 'nullable',
    ];


    public function submit(): void
    {
        $validated = $this->validate();

        $model = FormEntry::create([
            'form_id' => 'contact',
            'user_id' => Auth::id()
        ]);

        foreach ($validated as $key => $val)
            FormEntryMeta::create([
                'form_id' => $model->id,
                'key'     => $key,
                'value'   => $val
            ]);

        $this->reset();
        $this->alert('success' ,__('theme::theme.alert.successfully_stored'), [
            'position'         => 'top-end',
            'timer'            => 10000,
            'toast'            => true,
            'timerProgressBar' => true,
        ]);
    }

    public function render(): View
    {
        return view('theme::forms.contact-form');
    }
}
