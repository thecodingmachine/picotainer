<?php
namespace Mouf\Picotainer;

use Interop\Container\Exception\ContainerException;

/**
 * This exception is thrown when a dependency is not found.
 *
 * @author David Négrier <david@mouf-php.com>
 */
class MissingDependencyException extends \RuntimeException implements ContainerException
{
}
