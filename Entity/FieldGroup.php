<?php

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\ApiBundle\Serializer\Driver\ApiMetadataDriver;
use Mautic\CategoryBundle\Entity\Category;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;
use Mautic\CoreBundle\Entity\FormEntity;
use Mautic\CoreBundle\Helper\IntHelper;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use MauticPlugin\MZagmajsterFieldGroupBundle\Entity\FieldGroupRepository;


class FieldGroup extends FormEntity
{
    const MAUTIC_FIELD_GROUP_TRANSLATION_BASE = 'mautic.lead.field.group.';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank(
            ['message' => 'mautic.core.name.required']
          )
        );

        $metadata->addPropertyConstraint('name', new Assert\Regex(
            [
                'pattern' => "/^[a-zA-Z\s]+$/",
                'match' => true,
                'message' => 'mautic.mzfgb.name.validation'
            ]
          )
        );

    }

    public static function loadMetadata(ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('mz_fgb_field_groups')
            ->setCustomRepositoryClass(FieldGroupRepository::class);
        $builder->addIdColumns();
    }

    public static function loadApiMetadata(ApiMetadataDriver $metadata) {
        $metadata->setGroupPrefix('fieldGroupBasic')
            ->addListProperties([
                'id',
                'name',
                'description'
            ])
            ->build();
    }

    /**
     * Computed translation
     * @return string
     */
    public function getCompTranslation(): string {
        $displayName = $this->name;
        if ($displayName === null) {
            return '';
        }

        return $displayName;
    }

    /**
     * Computed name
     * @return string
     */
    public function getCompName(): ?string {
        if ($this->name === null) {
            return null;
        }

        return strtolower(
            trim(
                preg_replace(
                    '/[^A-Za-z0-9-]+/',
                     '',
                      $this->name
                ),
                ''
            )
        );
    }

    // Entity getters/setters

    public function setId(?int $id): self {
        $this->id = $id;
        
        return $this;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
