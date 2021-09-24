<?php

namespace Yarscript\ArrayObject;

/**
 * Class ArrayObject
 */
class ArrayObject extends \ArrayObject
{
    /**
     * @param mixed $value
     * @return $this
     */
    public function append($value): self
    {
        parent::append($value);

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return (bool)$this->count();
    }

    /**
     * @param int|string $key
     * @param mixed $value
     * @return $this
     */
    public function offsetSet($key, $value): self
    {
        parent::offsetSet($key, $value);

        return $this;
    }

    /**
     * @param null $key
     * @return array|false|mixed
     */
    public function offsetGet($key = null)
    {
        return isset($key) ? parent::offsetGet($key) : (array)$this;
    }

    /**
     * @param null $key
     * @return array|false|mixed
     */
    public function get($key = null)
    {
        return self::offsetGet($key);
    }

    /**
     * @param ...$values
     * @return $this
     */
    public function add(...$values): self
    {
        $this->exchangeArray(array_merge((array)$this, $values));

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function merge(array $data): self
    {
        $this->exchangeArray(array_merge((array)$this, $data));

        return $this;
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function set(string $key, $value): self
    {
        return self::offsetSet($key, $value);
    }

    /**
     * @param string ...$fields
     * @return array
     */
    public function only(string ...$fields): array
    {
        return array_intersect_key((array)$this, array_flip($fields));
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (array)$this;
    }
}