<?php

return [
    'outputType'    => ['class'=>'core\lib\json'],

    'urlManager'=> [

        'rules' => [
                        //'class'      => 'core\lib\UrlRule',
                        //'modules'    =>  'api',
                        'controller' => 'Index',
                        'function'   => 'run',
                        //'except'     => ['index','delete','create','update','view'],
                    ],

    ],

];
