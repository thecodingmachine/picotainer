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
     * The array of closure defining each entry of the container.
     *
     * @var array<string, Closure>
     */
    protected $callbacks;

    /**
     * The array of entries once they have been instanciated.
     *
     * @var array<string, mixed>
     */
    protected $objects;

    /**
     * Instantiate the container.
     *
     * @param array<string, Closure> $entries                 Entries must be passed as an array of anonymous functions
     * @param ContainerInterface     $delegateLookupContainer Optionnal delegate lookup container.
     */
    public function __construct(array $entries, ContainerInterface $delegateLookupContainer = null)
    {
        $this->callbacks = $entries;
        $this->delegateLookupContainer = $delegateLookupContainer ?: $this;
    }

    /* (non-PHPdoc)
     * @see \Interop\Container\ContainerInterface::get()
     */
    public function get($identifier)
    {
        if (isset($this->objects[$identifier])) {
            return $this->objects[$identifier];
        }
        if (!isset($this->callbacks[$identifier])) {
            throw new PicotainerNotFoundException(sprintf('Identifier "%s" is not defined.', $identifier));
        }

        return $this->objects[$identifier] = $this->callbacks[$identifier]($this->delegateLookupContainer);
    }

    /* (non-PHPdoc)
     * @see \Interop\Container\ContainerInterface::has()
     */
    public function has($identifier)
    {
        return isset($this->callbacks[$identifier]) || isset($this->objects[$identifier]);
    }
}
