<?php

namespace MauticPlugin\MZagmajsterFieldGroupBundle\Entity;


use Mautic\CoreBundle\Entity\CommonRepository;

class FieldGroupRepository extends CommonRepository
{
    public function getEntities(array $args = [])
    {
        $q = $this->_em
            ->createQueryBuilder()
            ->select($this->getTableAlias())
            ->from('MZagmajsterFieldGroupBundle:FieldGroup', $this->getTableAlias());

        $args['qb'] = $q;

        return parent::getEntities($args);
    }

    public function getTableAlias(): string
    {
        return 'fg';
    }
}
