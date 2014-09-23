<?php

namespace PageWebTests\Utils;

use DateTime;
use Faker\Generator as FakerGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class ModelMuff
{
    protected $classes = [];

    public function __construct(FakerGenerator $faker)
    {
        $this->faker = $faker;
    }

    public function define($class, $attributes = [])
    {
        $this->classes[$class] = $attributes;
    }

    public function createMany($count, $class, $options = [])
    {
        $models = new Collection();
        for ($i = 0; $i < $count; $i++) {
            $models->push($this->create($class, $options));
        }

        return $models;
    }

    /**
     * @param string $class
     * @param array $options
     * @return object|Model
     */
    public function create($class, $options = [])
    {
        /**
         * @var bool $bubble
         */
        $options = array_merge([
            'relation' => true,
            'relations' => [],
            'attributes' => [],
            'save' => true
        ], $options);

        if (isset($this->classes[$class])) {
            $model = $this->createInstance($class, $options);
        } else {
            $model = new $class();
        }

        if ($options['save']) {
            $model->save();
        }

        return $model;
    }

    /**
     * @param $class
     * @param array $options
     * @return Model
     */
    protected function createInstance($class, $options = [])
    {
        $model = new $class();
        if (isset($this->classes[$class])) {
            $attributes = $this->classes[$class];

            foreach ($attributes as $property => $definition) {
                $model->$property = !isset($options['attributes'][$property])
                    ? $this->generateValue($definition, $options)
                    : $options['attributes'][$property];
            }
        }

        return $model;
    }

    protected function generateValue($definition, $options)
    {
        $value = null;
        list($type, $param, $returnType) = array_pad(explode(':', $definition, 3), 3, null);

        switch ($type) {
            case 'string':
            case 'int':
                if ($param) {
                    if ($param == 'id') {
                        $value = $this->faker->unique()->randomNumber();
                    } elseif ($param == 'boolean') {
                        $value = $type == 'int'
                            ? mt_rand(0, 1)
                            : $this->faker->randomElement(['yes', 'no']);
                    } else {
                        $value = $this->faker->$param;
                    }
                }
                break;
            case 'text':
                switch ($param) {
                    case 'short':
                        $length = 5;
                        break;
                    case 'long':
                        $length = 40;
                        break;
                    case 'medium':
                        $length = 20;
                        break;
                    default:
                        $length = 10;
                }

                $value = $this->faker->paragraph($length);
                break;
            case 'relation':
                if ($options['relation']) {
                    $model = $this->create($param);
                    if (method_exists($model, 'getKey')) {
                        $value = $model->getKey();
                    } elseif ($model->id) {
                        $value = $model->id;
                    } elseif ($model->_id) {
                        $value = $model->_id;
                    }
                }
                break;
            case 'value':
                $value = trim($param);
                break;
            default:
                $value = $param;
        }

        if ($returnType) {
            settype($value, $returnType);
        }

        // Normalize
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d H:i:s');
        }

        return $value;
    }
}
