<?php
/**
 * Created by PhpStorm.
 * User: vadimkrutov
 * Date: 22/02/2017
 * Time: 14:25
 */

namespace App\Entity\Traits;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait Translatable
{
    private $columnId = 'id';

    /**
     * @param array $data
     * @return $this
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \LaravelDoctrine\ORM\Facades\ORMException
     * @throws \ReflectionException
     */
    public function translate(array $data)
    {
        if (isset($data['translations'])) {
            /** @var ClassMetadataInfo $metadata */
            $metadata = \EntityManager::getMetadataFactory()->getMetadataFor(static::class . 'Translation');
            $class = static::class . 'Translation';

            for ($i = 0; $i < count($data['translations']); $i++) {
                $translation = new $class;
                $isNewEntry = true;

                if (isset($data['translations'][$i][$this->columnId])) {
                    $id = $data['translations'][$i][$this->columnId];
                    $translation = \EntityManager::getRepository($class)->find($id);
                    $isNewEntry = false;

                    if (!$translation) {
                        throw new NotFoundHttpException(sprintf('Translation with id %s not found', $id));
                    }
                }

                foreach ($data['translations'][$i] as $columnName => $value) {
                    if ($property = $metadata->getFieldName($columnName)) {
                        $setter = sprintf('set%s', ucfirst($property));

                        if (method_exists($translation, $setter)) {
                            $translation->$setter($value);
                        }
                    }
                }

                if ($isNewEntry) {
                    $this->addTranslation($translation);
                } else {
                    \EntityManager::flush($translation);
                }
            }
        }

        return $this;
    }

    /**
     * @param string|null $locale
     * @return null
     */
    public function getTranslationByLocale(string $locale = null)
    {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        if (count($this->getTranslations()) >= 1) {
            foreach ($this->getTranslations() as $translation) {
                if ($translation->getLocale() == $locale) {
                    return $translation;
                }
            }
        }

        return null;
    }
}