<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.07.2017
 * Time: 14:04
 */

namespace App\Traits;

use Symfony\Component\PropertyAccess\PropertyAccess;

trait PropertyAccessTrait
{
    /**
     * @param array $properties
     *
     * @return $this
     */
    public function fromArray(array $properties)
    {
        $accessor = PropertyAccess::createPropertyAccessor();

        foreach ($properties as $property => $value)
        {
            if ($accessor->isWritable($this, $property))
            {
                $accessor->setValue($this, $property, $value);
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        $accessor   = PropertyAccess::createPropertyAccessor();
        $properties = array_keys(get_object_vars($this));
        $array      = [];

        foreach ($properties as $property)
        {
            if ($accessor->isReadable($this, $property))
            {
                $array[$property] = $accessor->getValue($this, $property);
            }
        }

        return $array;
    }
}