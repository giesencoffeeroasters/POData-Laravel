<?php

declare(strict_types=1);

namespace AlgoWeb\PODataLaravel\Models\ObjectMap\Entities\Associations;

abstract class Association
{
    /** @var array<int, string>  */
    protected $multArray = [
        AssociationStubRelationType::MANY => '*',
        AssociationStubRelationType::ONE => '1',
        AssociationStubRelationType::NULL_ONE => '0..1',
    ];

    /**
     * @var AssociationStubBase
     */
    protected $first;

    /**
     * @return AssociationStubBase
     */
    public function getFirst(): AssociationStubBase
    {
        return $this->first;
    }

    /**
     * @param AssociationStubBase $first
     */
    public function setFirst(AssociationStubBase $first): void
    {
        $this->first = $first;
        $first->addAssociation($this);
    }

    /**
     * @return AssociationStubBase|AssociationStubBase[]
     */
    abstract public function getLast();

    /**
     * @return bool
     */
    abstract public function isOk(): bool;

    /**
     * @return AssociationType|AssociationType[]
     */
    abstract public function getAssociationType();
}
