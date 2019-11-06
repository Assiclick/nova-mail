<?php

namespace KirschbaumDevelopment\NovaMail\Nova;

use Laravel\Nova\Resource as NovaResource;
use SaintSystems\Nova\ResourceGroupMenu\DisplaysInResourceGroupMenu;

abstract class Resource extends NovaResource
{
    use DisplaysInResourceGroupMenu;
}
