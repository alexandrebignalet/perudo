<?php

namespace ContainerZUIaiUx;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder9cc85 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerc71e9 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesea7bd = [
        
    ];

    public function getConnection()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getConnection', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getMetadataFactory', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getExpressionBuilder', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'beginTransaction', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getCache', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getCache();
    }

    public function transactional($func)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'transactional', array('func' => $func), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'wrapInTransaction', array('func' => $func), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'commit', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->commit();
    }

    public function rollback()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'rollback', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getClassMetadata', array('className' => $className), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'createQuery', array('dql' => $dql), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'createNamedQuery', array('name' => $name), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'createQueryBuilder', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'flush', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'clear', array('entityName' => $entityName), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->clear($entityName);
    }

    public function close()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'close', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->close();
    }

    public function persist($entity)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'persist', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'remove', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'refresh', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'detach', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'merge', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getRepository', array('entityName' => $entityName), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'contains', array('entity' => $entity), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getEventManager', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getConfiguration', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'isOpen', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getUnitOfWork', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getProxyFactory', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'initializeObject', array('obj' => $obj), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'getFilters', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'isFiltersStateClean', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'hasFilters', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return $this->valueHolder9cc85->hasFilters();
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

        $instance->initializerc71e9 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder9cc85) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder9cc85 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder9cc85->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, '__get', ['name' => $name], $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        if (isset(self::$publicPropertiesea7bd[$name])) {
            return $this->valueHolder9cc85->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9cc85;

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

        $targetObject = $this->valueHolder9cc85;
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
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9cc85;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder9cc85;
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
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, '__isset', array('name' => $name), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9cc85;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder9cc85;
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
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, '__unset', array('name' => $name), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9cc85;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder9cc85;
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
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, '__clone', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        $this->valueHolder9cc85 = clone $this->valueHolder9cc85;
    }

    public function __sleep()
    {
        $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, '__sleep', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;

        return array('valueHolder9cc85');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerc71e9 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerc71e9;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerc71e9 && ($this->initializerc71e9->__invoke($valueHolder9cc85, $this, 'initializeProxy', array(), $this->initializerc71e9) || 1) && $this->valueHolder9cc85 = $valueHolder9cc85;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder9cc85;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder9cc85;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
