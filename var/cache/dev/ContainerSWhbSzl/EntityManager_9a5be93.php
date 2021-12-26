<?php

namespace ContainerSWhbSzl;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder9e0ee = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerf402a = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesc369e = [
        
    ];

    public function getConnection()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getConnection', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getMetadataFactory', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getExpressionBuilder', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'beginTransaction', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getCache', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getCache();
    }

    public function transactional($func)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'transactional', array('func' => $func), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'wrapInTransaction', array('func' => $func), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'commit', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->commit();
    }

    public function rollback()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'rollback', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getClassMetadata', array('className' => $className), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'createQuery', array('dql' => $dql), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'createNamedQuery', array('name' => $name), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'createQueryBuilder', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'flush', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'clear', array('entityName' => $entityName), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->clear($entityName);
    }

    public function close()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'close', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->close();
    }

    public function persist($entity)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'persist', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'remove', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'refresh', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'detach', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'merge', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getRepository', array('entityName' => $entityName), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'contains', array('entity' => $entity), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getEventManager', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getConfiguration', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'isOpen', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getUnitOfWork', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getProxyFactory', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'initializeObject', array('obj' => $obj), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'getFilters', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'isFiltersStateClean', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'hasFilters', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return $this->valueHolder9e0ee->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerf402a = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder9e0ee) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder9e0ee = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder9e0ee->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, '__get', ['name' => $name], $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        if (isset(self::$publicPropertiesc369e[$name])) {
            return $this->valueHolder9e0ee->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9e0ee;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder9e0ee;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9e0ee;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder9e0ee;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, '__isset', array('name' => $name), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9e0ee;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder9e0ee;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, '__unset', array('name' => $name), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9e0ee;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder9e0ee;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, '__clone', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        $this->valueHolder9e0ee = clone $this->valueHolder9e0ee;
    }

    public function __sleep()
    {
        $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, '__sleep', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;

        return array('valueHolder9e0ee');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerf402a = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerf402a;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerf402a && ($this->initializerf402a->__invoke($valueHolder9e0ee, $this, 'initializeProxy', array(), $this->initializerf402a) || 1) && $this->valueHolder9e0ee = $valueHolder9e0ee;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder9e0ee;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder9e0ee;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
