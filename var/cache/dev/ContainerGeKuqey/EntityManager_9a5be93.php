<?php

namespace ContainerGeKuqey;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder61884 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer57556 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties5f048 = [
        
    ];

    public function getConnection()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getConnection', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getMetadataFactory', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getExpressionBuilder', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'beginTransaction', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getCache', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getCache();
    }

    public function transactional($func)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'transactional', array('func' => $func), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'wrapInTransaction', array('func' => $func), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'commit', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->commit();
    }

    public function rollback()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'rollback', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getClassMetadata', array('className' => $className), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'createQuery', array('dql' => $dql), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'createNamedQuery', array('name' => $name), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'createQueryBuilder', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'flush', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'clear', array('entityName' => $entityName), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->clear($entityName);
    }

    public function close()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'close', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->close();
    }

    public function persist($entity)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'persist', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'remove', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'refresh', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'detach', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'merge', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getRepository', array('entityName' => $entityName), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'contains', array('entity' => $entity), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getEventManager', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getConfiguration', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'isOpen', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getUnitOfWork', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getProxyFactory', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'initializeObject', array('obj' => $obj), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'getFilters', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'isFiltersStateClean', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'hasFilters', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return $this->valueHolder61884->hasFilters();
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

        $instance->initializer57556 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder61884) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder61884 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder61884->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, '__get', ['name' => $name], $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        if (isset(self::$publicProperties5f048[$name])) {
            return $this->valueHolder61884->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder61884;

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

        $targetObject = $this->valueHolder61884;
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
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder61884;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder61884;
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
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, '__isset', array('name' => $name), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder61884;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder61884;
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
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, '__unset', array('name' => $name), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder61884;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder61884;
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
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, '__clone', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        $this->valueHolder61884 = clone $this->valueHolder61884;
    }

    public function __sleep()
    {
        $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, '__sleep', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;

        return array('valueHolder61884');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer57556 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer57556;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer57556 && ($this->initializer57556->__invoke($valueHolder61884, $this, 'initializeProxy', array(), $this->initializer57556) || 1) && $this->valueHolder61884 = $valueHolder61884;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder61884;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder61884;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
