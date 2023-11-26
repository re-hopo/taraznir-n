<?php

namespace Modules\Theme\Trait;


use Jantinnerezo\LivewireAlert\LivewireAlert;

trait CommonAlert{
    use LivewireAlert;


    public function topRightToast( string $message ,$status ='success' ): string
    {
        $this->alert($status ,$message, [
            'position'         => 'top-end',
            'timer'            => 10000,
            'toast'            => true,
            'timerProgressBar' => true,
        ]);
        return '';
    }


}
