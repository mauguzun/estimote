<?php namespace App\Entity\Traits;

use Doctrine\ORM\Mapping\ClassMetadataInfo;

trait Hydratable
{
    /**
     * @param array $data
     *
     * @return $this
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \ReflectionException
     */
    public function hydrate(array $data)
    {
        /** @var ClassMetadataInfo $metadata */
        $metadata = \EntityManager::getMetadataFactory()->getMetadataFor(static::class);
        foreach ($data as $columnName => $value) {
            if ($property = $metadata->getFieldName($columnName)) {
                $setter = sprintf('set%s', ucfirst($property));
                if (method_exists($this, $setter)) {
                    $type = $metadata->fieldMappings[$property]['type'] ?? null;

                    if ($type && in_array($type, ['datetime', 'date']) && !$value instanceof \DateTime) {
                        $value = \DateTime::createFromFormat('d/m/Y', $value);
                    }

                    if ($type === null) {
                        if (array_key_exists($property, $metadata->associationMappings)) {
                            $entity = $metadata->associationMappings[$property]['targetEntity'];
                            $value = \EntityManager::getRepository($entity)->find($value);
                        }
                    }

                    $this->$setter($value);
                }
            }
        }

        return $this;
    }
}
