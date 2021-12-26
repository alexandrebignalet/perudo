<?php

namespace Container0FKVvsm;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder82986 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializere69cd = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesa8144 = [
        
    ];

    public function getConnection()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getConnection', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getMetadataFactory', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getExpressionBuilder', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'beginTransaction', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->beginTransaction();
    }

    public function getCache()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getCache', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getCache();
    }

    public function transactional($func)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'transactional', array('func' => $func), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'wrapInTransaction', array('func' => $func), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'commit', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->commit();
    }

    public function rollback()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'rollback', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getClassMetadata', array('className' => $className), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'createQuery', array('dql' => $dql), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'createNamedQuery', array('name' => $name), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'createQueryBuilder', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'flush', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'clear', array('entityName' => $entityName), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->clear($entityName);
    }

    public function close()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'close', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->close();
    }

    public function persist($entity)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'persist', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'remove', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'refresh', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'detach', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'merge', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getRepository', array('entityName' => $entityName), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'contains', array('entity' => $entity), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getEventManager', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getConfiguration', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'isOpen', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getUnitOfWork', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getProxyFactory', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'initializeObject', array('obj' => $obj), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'getFilters', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'isFiltersStateClean', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'hasFilters', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return $this->valueHolder82986->hasFilters();
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

        $instance->initializere69cd = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder82986) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder82986 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder82986->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, '__get', ['name' => $name], $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        if (isset(self::$publicPropertiesa8144[$name])) {
            return $this->valueHolder82986->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder82986;

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

        $targetObject = $this->valueHolder82986;
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
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, '__set', array('name' => $name, 'value' => $value), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder82986;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder82986;
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
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, '__isset', array('name' => $name), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder82986;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder82986;
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
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, '__unset', array('name' => $name), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder82986;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder82986;
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
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, '__clone', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        $this->valueHolder82986 = clone $this->valueHolder82986;
    }

    public function __sleep()
    {
        $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, '__sleep', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;

        return array('valueHolder82986');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializere69cd = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializere69cd;
    }

    public function initializeProxy() : bool
    {
        return $this->initializere69cd && ($this->initializere69cd->__invoke($valueHolder82986, $this, 'initializeProxy', array(), $this->initializere69cd) || 1) && $this->valueHolder82986 = $valueHolder82986;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder82986;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder82986;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
