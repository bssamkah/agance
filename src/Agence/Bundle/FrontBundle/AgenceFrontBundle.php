<?php

namespace Agence\Bundle\FrontBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AgenceFrontBundle extends Bundle
{
     public function getParent()
    {
        return 'FOSUserBundle';
    }
}
