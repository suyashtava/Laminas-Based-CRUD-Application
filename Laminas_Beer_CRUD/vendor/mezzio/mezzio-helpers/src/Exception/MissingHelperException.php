<?php

declare(strict_types=1);

namespace Mezzio\Helper\Exception;

use DomainException;
use Psr\Container\ContainerExceptionInterface;

class MissingHelperException extends DomainException implements
    ContainerExceptionInterface,
    ExceptionInterface
{
}
