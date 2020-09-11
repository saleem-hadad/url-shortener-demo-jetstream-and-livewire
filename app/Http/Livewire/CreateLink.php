<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateLink extends Component
{
    use AuthorizesRequests;

    public $original;
    protected $linkLength = 6;

    public function submit()
    {
        $this->validate(['original' => 'required|url']);

        $this->authorizeCreatingLink();

        auth()->user()->links()->create([
            'original' => $this->original,
            'shortened' => $this->generateShortLink(),
        ]);

        $this->emit('linkCreated');
        $this->original = '';
    }

    protected function authorizeCreatingLink()
    {
        $user = auth()->user();
        abort_if($user->plan == 'free' && $user->links()->count() == 3, 403, 'Please upgrade your plan to continue using our service!');
        abort_if($user->plan == 'premium' && $user->links()->count() == 100, 403, 'Please upgrade your plan to continue using our service!');
        abort_if($user->links()->where('original', $this->original)->count(), 403, 'You already posted this link before!');
    }

    protected function generateShortLink()
    {
        return substr(md5(time()), 0, $this->linkLength);
    }

    public function render()
    {
        return view('livewire.create-link');
    }
}
