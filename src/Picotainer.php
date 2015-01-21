<?php
namespace Mouf\Picotainer;

use Interop\Container\ContainerInterface;

/**
 * This class is a minimalist dependency injection container.
 * It has compatibility with container-interop's ContainerInterface and delegate-lookup feature.
 *
 * @author David Négrier <david@mouf-php.com>
 */
class Picotainer implements ContainerInterface
{

    /**
     * The delegate lookup
     * @var ContainerInterface
     */
    protected $delegateLookupContainer;

    /**
     * Instantiate the container.
     *
     * Objects and parameters can be passed as argument to the constructor.
     *
     * @param ContainerInterface $container The root container of the application (if any)
     * @param array              $values    The parameters or objects.
     */
    public function __construct(array $entries = array(), ContainerInterface $delegateLookupContainer = null)
    {
        $this->delegateLookupContainer = $delegateLookupContainer ?: $this;
        // TODO
    }

    /* (non-PHPdoc)
     * @see \Interop\Container\ContainerInterface::get()
     */
    public function get($identifier)
    {
        // TODO
    }

    /* (non-PHPdoc)
     * @see \Interop\Container\ContainerInterface::has()
     */
    public function has($identifier)
    {
        // TODO
    }
}
