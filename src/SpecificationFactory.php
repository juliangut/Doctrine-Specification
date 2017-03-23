<?php

namespace Rb\Specification\Doctrine;

/**
 * Class SpecificationFactory.
 */
class SpecificationFactory
{
    /**
     * Specification map.
     *
     * @var array
     */
    static protected $supportedSpecifications = [
        'Between' => 'Rb\Specification\Doctrine\Condition\Between',
        'Comparison' => 'Rb\Specification\Doctrine\Condition\Comparison',
        'Equals' => 'Rb\Specification\Doctrine\Condition\Equals',
        'EqualsProperty' => 'Rb\Specification\Doctrine\Condition\EqualsProperty',
        'GreaterThan' => 'Rb\Specification\Doctrine\Condition\GreaterThan',
        'GreaterThanOrEquals' => 'Rb\Specification\Doctrine\Condition\GreaterThanOrEquals',
        'In' => 'Rb\Specification\Doctrine\Condition\In',
        'IsInstanceOf' => 'Rb\Specification\Doctrine\Condition\IsInstanceOf',
        'IsNotNull' => 'Rb\Specification\Doctrine\Condition\IsNotNull',
        'IsNull' => 'Rb\Specification\Doctrine\Condition\IsNull',
        'LessThan' => 'Rb\Specification\Doctrine\ConditionLessThan',
        'LessThanOrEquals' => 'Rb\Specification\Doctrine\Condition\LessThanOrEquals',
        'Like' => 'Rb\Specification\Doctrine\Condition\Like',
        'NotEquals' => 'Rb\Specification\Doctrine\Condition\NotEquals',
        'NotIn' => 'Rb\Specification\Doctrine\Condition\NotIn',

        'AndX' => 'Rb\Specification\Doctrine\Logic\AndX',
        'Not' => 'Rb\Specification\Doctrine\Logic\Not',
        'OrX' => 'Rb\Specification\Doctrine\Logic\OrX',

        'GroupBy' => 'Rb\Specification\Doctrine\Query\GroupBy',
        'Having' => 'Rb\Specification\Doctrine\Query\Having',
        'IndexBy' => 'Rb\Specification\Doctrine\Query\IndexBy',
        'InnerJoin' => 'Rb\Specification\Doctrine\Query\InnerJoin',
        'Join' => 'Rb\Specification\Doctrine\Query\Join',
        'LeftJoin' => 'Rb\Specification\Doctrine\Query\LeftJoin',
        'OrderBy' => 'Rb\Specification\Doctrine\Query\OrderBy',
        'Select' => 'Rb\Specification\Doctrine\Query\Select',
    ];

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @throws \InvalidArgumentException
     *
     * @return SpecificationInterface
     */
    static public function __callStatic($name, $arguments)
    {
        if (!in_array($name, self::$supportedSpecifications)) {
            throw new \InvalidArgumentException(
                sprintf('Specification %s is not supported', $name)
            );
        }

        $reflect = new \ReflectionClass(self::$supportedSpecifications[$name]);

        return $reflect->newInstanceArgs($arguments);
    }
}
