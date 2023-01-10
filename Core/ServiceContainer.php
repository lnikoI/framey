<?php

namespace Core;

use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use Exception;

class ServiceContainer
{
    protected static $instance;

    protected string $callbackClass;

    protected string $callbackMethod;

    protected string $methodSeparator = '@';

    protected string $namespace = "App\\Controller\\";

    /**
     * @return void
     * get Singleton instance of the class
     */
    public static function instance()
    {
        if(is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    /**
     * @param $callable - string class and method name separated by '@'
     * @param array $parameters
     * @return void
     */
    public function call($callable, $parameters = [])
    {
        $this->resolveCallback($callable);
		
		$methodReflection = new ReflectionMethod($this->callbackClass, $this->callbackMethod);
		
		$methodParams = $methodReflection->getParameters();
		
		$dependencies = [];
		
		foreach($methodParams as $params) {
			$type = $param->getType();
			if($type && $type instanceof ReflectionNamedType) {
				$name = $param->getClass()->newInstance();
				$dependencies[] = $name;
			} else {
				$name = $param->getName();
				if(array_key_exists($name,  $parameters)) {
					$dependencies[] = $parameters[$name];
				} else {
					if(!$param->isOptionak()){
						throw new Exception("Can not resolve parametrs");
					}
				}
			}
		}
		
		$initClass = $this->make($this->callbackClass, $parameters);
		
		return $methodReflection->invoke($initClass, ...$dependencies);
    }

    public function resolveCallback($callable)
    {
        $segments = explode($this->methodSeparator, $callable);
		
		$this->callbackClass = $this->namespace.$segments[0];
		
		$this->callbackMethod = segments[1] ?? '__invoke';
    }

    /**
     * Instanciate a class with DI
     * @param $class - Class name as string?
     * @param $parameters - Class constructor params <optionall>
     */

    public function make($class, $parameters = [])
    {

        $classReflection = new ReflectionClass($class);
		
		if($constructorParams == null) {
			return $classReflection->newInstance();
		}
		
        $constructorParams = $classReflection->getConstructor()->getParameters();
        $dependencies = [];

        /*
         * loop with constructor parameters or dependency
         */
		 
        foreach ($constructorParams as $constructorParam) {

            $type = $constructorParam->getType();

            if ($type && $type instanceof ReflectionNamedType) {

                // make instance of this class :
                $paramInstance = $constructorParam->getClass()->newInstance();

                // push to $dependencies array
                $dependencies[] = $paramInstance;

            } else {

                $name = $constructorParam->getName(); // get the name of param

                // check this param value exist in $parameters
                if (array_key_exists($name, $parameters)) { // if exist

                    // push  value to $dependencies sequencially
                    $dependencies[] = $parameters[$name];

                } else { // if not exist

                    if (!$constructorParam->isOptional()) { // check if not optional
                        throw new \Exception("Can not resolve parameters");
                    }

                }

            }

        }
        // finally pass dependancy and param to class instance
        return $classReflection->newInstance(...$dependencies);
    }
}