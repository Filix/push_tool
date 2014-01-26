<?php
namespace Filix\PushBundle\Common\ArrayCollection;

use Filix\PushBundle\Common\Collection\Collection;
use \ArrayIterator;

/**
 * ArrayCollection
 *
 * @author Filix
 */
class ArrayCollection implements Collection
{
    /**
     * An array containing the entries of this collection.
     *
     * @var array
     */
    private $_elements;
    
    public function __construct(array $elements = array())
    {
        $this->_elements = $elements;
    }
    
    public function count()
    {
        return count($this->_elements);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->_elements);
    }

    public function offsetExists($offset)
    {
        return $this->containsKey($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        if ( ! isset($offset)) {
            return $this->add($value);
        }
        return $this->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        return $this->remove($offset);
    }

    public function add($element)
    {
        $this->_elements[] = $element;
        return true;
    }

    public function clear()
    {
        $this->_elements = array();
    }

    public function contains($element)
    {
        return in_array($element, $this->_elements, true);
    }

    public function containsKey($key)
    {
        return isset($this->_elements[$key]) || array_key_exists($key, $this->_elements);
    }

    public function current()
    {
        return current($this->_elements);
    }

    public function first()
    {
         return reset($this->_elements);
    }

    public function get($key)
    {
        if (isset($this->_elements[$key])) {
            return $this->_elements[$key];
        }
        return null;
    }

    public function getKeys()
    {
        return array_keys($this->_elements);
    }

    public function getValues()
    {
        return array_values($this->_elements);
    }

    public function isEmpty()
    {
        return ! $this->_elements;
    }

    public function key()
    {
        return key($this->_elements);
    }

    public function last()
    {
        return end($this->_elements);
    }

    public function next()
    {
        return next($this->_elements);
    }

    public function remove($key)
    {
        if (isset($this->_elements[$key]) || array_key_exists($key, $this->_elements)) {
            $removed = $this->_elements[$key];
            unset($this->_elements[$key]);

            return $removed;
        }

        return null;
    }

    public function removeElement($element)
    {
        $key = array_search($element, $this->_elements, true);

        if ($key !== false) {
            unset($this->_elements[$key]);

            return true;
        }

        return false;
    }

    public function set($key, $value)
    {
        $this->_elements[$key] = $value;
    }

    public function toArray()
    {
        return $this->_elements;
    }

}
