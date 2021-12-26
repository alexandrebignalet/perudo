<?php

namespace ContainerETz218p;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderfa233 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer3926b = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties74f10 = [
        
    ];

    public function getConnection()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getConnection', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getMetadataFactory', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getExpressionBuilder', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'beginTransaction', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getCache', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getCache();
    }

    public function transactional($func)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'transactional', array('func' => $func), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'wrapInTransaction', array('func' => $func), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'commit', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->commit();
    }

    public function rollback()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'rollback', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getClassMetadata', array('className' => $className), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'createQuery', array('dql' => $dql), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'createNamedQuery', array('name' => $name), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'createQueryBuilder', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'flush', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'clear', array('entityName' => $entityName), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->clear($entityName);
    }

    public function close()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'close', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->close();
    }

    public function persist($entity)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'persist', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'remove', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'refresh', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'detach', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'merge', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getRepository', array('entityName' => $entityName), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'contains', array('entity' => $entity), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getEventManager', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getConfiguration', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'isOpen', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getUnitOfWork', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getProxyFactory', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'initializeObject', array('obj' => $obj), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'getFilters', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'isFiltersStateClean', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'hasFilters', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return $this->valueHolderfa233->hasFilters();
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

        $instance->initializer3926b = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderfa233) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderfa233 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderfa233->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, '__get', ['name' => $name], $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        if (isset(self::$publicProperties74f10[$name])) {
            return $this->valueHolderfa233->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfa233;

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

        $targetObject = $this->valueHolderfa233;
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
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfa233;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderfa233;
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
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, '__isset', array('name' => $name), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfa233;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderfa233;
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
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, '__unset', array('name' => $name), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfa233;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderfa233;
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
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, '__clone', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        $this->valueHolderfa233 = clone $this->valueHolderfa233;
    }

    public function __sleep()
    {
        $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, '__sleep', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;

        return array('valueHolderfa233');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer3926b = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer3926b;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer3926b && ($this->initializer3926b->__invoke($valueHolderfa233, $this, 'initializeProxy', array(), $this->initializer3926b) || 1) && $this->valueHolderfa233 = $valueHolderfa233;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderfa233;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderfa233;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
