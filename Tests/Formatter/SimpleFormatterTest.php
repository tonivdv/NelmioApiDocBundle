<?php

/*
 * This file is part of the NelmioApiDocBundle.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\ApiDocBundle\Tests\Formatter;

use Nelmio\ApiDocBundle\Tests\WebTestCase;

class SimpleFormatterTest extends WebTestCase
{
    public function testFormat()
    {
        $container = $this->getContainer();

        $extractor = $container->get('nelmio_api_doc.extractor.api_doc_extractor');
        $data      = $extractor->all();
        $result    = $container->get('nelmio_api_doc.formatter.simple_formatter')->format($data);

        $expected = array(
            '/tests' =>
            array(
                0 =>
                array(
                    'method' => 'GET',
                    'uri' => '/tests.{_format}',
                    'filters' =>
                    array(
                        'a' =>
                        array(
                            'dataType' => 'integer',
                        ),
                        'b' =>
                        array(
                            'dataType' => 'string',
                            'arbitrary' =>
                            array(
                                0 => 'arg1',
                                1 => 'arg2',
                            ),
                        ),
                    ),
                    'description' => 'index action',
                    'requirements' => array(
                        '_format' => array('dataType' => '', 'description' => '', 'requirement' => ''),
                    ),
                    'https' => false,
                ),
                1 =>
                array(
                    'method' => 'GET',
                    'uri' => '/tests.{_format}',
                    'filters' =>
                    array(
                        'a' =>
                        array(
                            'dataType' => 'integer',
                        ),
                        'b' =>
                        array(
                            'dataType' => 'string',
                            'arbitrary' =>
                            array(
                                0 => 'arg1',
                                1 => 'arg2',
                            ),
                        ),
                    ),
                    'description' => 'index action',
                    'requirements' => array(
                        '_format' => array('dataType' => '', 'description' => '', 'requirement' => ''),
                    ),
                    'https' => false,
                ),
                2 =>
                array(
                    'method' => 'POST',
                    'uri' => '/tests.{_format}',
                    'parameters' =>
                    array(
                        'a' =>
                        array(
                            'dataType' => 'string',
                            'required' => true,
                            'description' => 'A nice description',
                            'readonly' => false
                        ),
                        'b' =>
                        array(
                            'dataType' => 'string',
                            'required' => false,
                            'description' => '',
                            'readonly' => false
                        ),
                        'c' =>
                        array(
                            'dataType' => 'boolean',
                            'required' => true,
                            'description' => '',
                            'readonly' => false
                        ),
                    ),
                    'description' => 'create test',
                    'requirements' => array(
                        '_format' => array('dataType' => '', 'description' => '', 'requirement' => ''),
                    ),
                    'https' => false,
                ),
                3 =>
                array(
                    'method' => 'POST',
                    'uri' => '/tests.{_format}',
                    'parameters' =>
                    array(
                        'a' =>
                        array(
                            'dataType' => 'string',
                            'required' => true,
                            'description' => 'A nice description',
                            'readonly' => false
                        ),
                        'b' =>
                        array(
                            'dataType' => 'string',
                            'required' => false,
                            'description' => '',
                            'readonly' => false
                        ),
                        'c' =>
                        array(
                            'dataType' => 'boolean',
                            'required' => true,
                            'description' => '',
                            'readonly' => false
                        ),
                    ),
                    'description' => 'create test',
                    'requirements' => array(
                        '_format' => array('dataType' => '', 'description' => '', 'requirement' => ''),
                    ),
                    'https' => false,
                ),
            ),
            'others' =>
            array(
                0 =>
                array(
                    'method' => 'POST',
                    'uri' => '/another-post',
                    'parameters' =>
                    array(
                        'a' =>
                        array(
                            'dataType' => 'string',
                            'required' => true,
                            'description' => 'A nice description',
                            'readonly' => false
                        ),
                    ),
                    'description' => 'create another test',
                    'https' => false,
                ),
                1 =>
                array(
                    'method' => 'ANY',
                    'uri' => '/any',
                    'description' => 'Action without HTTP verb',
                    'https' => false,
                ),
                2 =>
                array(
                    'method' => 'ANY',
                    'uri' => '/any/{foo}',
                    'requirements' =>
                    array(
                        'foo' => array('dataType' => '', 'description' => '', 'requirement' => ''),
                    ),
                    'description' => 'Action without HTTP verb',
                    'https' => false,
                ),
                3 =>
                array(
                    'method' => 'POST',
                    'uri' => '/jms-input-test',
                    'parameters' =>
                    array(
                        'foo' =>
                        array(
                            'dataType' => 'string',
                            'required' => false,
                            'description' => 'No description.',
                            'readonly' => false
                        ),
                        'bar' =>
                        array(
                            'dataType' => 'DateTime',
                            'required' => false,
                            'description' => 'No description.',
                            'readonly' => true
                        ),
                        'number' =>
                        array(
                            'dataType' => 'double',
                            'required' => false,
                            'description' => 'No description.',
                            'readonly' => false
                        ),
                        'arr' =>
                        array(
                            'dataType' => 'array',
                            'required' => false,
                            'description' => 'No description.',
                            'readonly' => false
                        ),
                        'nested' => array(
                            'dataType' => 'object (JmsNested)',
                            'required' => false,
                            'description' => 'No description.',
                            'readonly' => false,
                            'children' => array(
                                'foo' => array(
                                    'dataType' => 'DateTime',
                                    'required' => false,
                                    'description' => 'No description.',
                                    'readonly' => true,
                                ),
                                'bar' => array(
                                    'dataType' => 'string',
                                    'required' => false,
                                    'description' => 'No description.',
                                    'readonly' => false,
                                ),
                                'baz' => array(
                                    'dataType' => 'array of integers',
                                    'required' => false,
                                    'description' => 'Epic description.

With multiple lines.',
                                    'readonly' => false,
                                )
                            )
                        ),
                        'nestedArray' => array(
                            'dataType' => 'array of objects (JmsNested)',
                            'required' => false,
                            'description' => 'No description.',
                            'readonly' => false,
                            'children' => array(
                                'foo' => array(
                                    'dataType' => 'DateTime',
                                    'required' => false,
                                    'description' => 'No description.',
                                    'readonly' => true,
                                ),
                                'bar' => array(
                                    'dataType' => 'string',
                                    'required' => false,
                                    'description' => 'No description.',
                                    'readonly' => false,
                                ),
                                'baz' => array(
                                    'dataType' => 'array of integers',
                                    'required' => false,
                                    'description' => 'Epic description.

With multiple lines.',
                                    'readonly' => false,
                                )
                            )
                        ),
                    ),
                    'description' => 'Testing JMS',
                    'https' => false,
                ),
                4 =>
                array(
                    'method' => 'GET',
                    'uri' => '/jms-return-test',
                    'description' => 'Testing return',
                    'response' => array(
                        'a' => array(
                            'dataType' => 'string',
                            'required' => true,
                            'description' => 'A nice description',
                            'readonly' => false
                        )
                    ),
                    'https' => false,
                ),
                5 =>
                array(
                    'method' => 'ANY',
                    'uri' => '/my-commented/{id}/{page}',
                    'requirements' =>
                    array(
                        'id' => array('dataType' => 'int', 'description' => 'A nice comment', 'requirement' => ''),
                        'page' => array('dataType' => 'int', 'description' => '', 'requirement' => ''),
                    ),
                    'https' => false,
                    'description' => 'This method is useful to test if the getDocComment works.',
                    'documentation' => "This method is useful to test if the getDocComment works.\nAnd, it supports multilines until the first '@' char."
                ),
                6 =>
                array(
                    'method' => 'ANY',
                    'uri' => '/secure-route',
                    // 'description' => '[secureRouteAction description]',
                    // 'documentation' => '[secureRouteAction description]',
                    'requirements' => array(
                        '_scheme' => array(
                            'requirement' => 'https',
                            'dataType' => null,
                            'description' => null,
                        ),
                    ),
                    'https' => true,
                ),
                7 =>
                array(
                    'method' => 'ANY',
                    'uri' => '/yet-another/{id}',
                    'requirements' =>
                    array(
                        'id' => array('dataType' => '', 'description' => '', 'requirement' => '\d+')
                    ),
                    'https' => false,
                ),
                8 =>
                array(
                    'method' => 'GET',
                    'uri' => '/z-action-with-query-param',
                    'filters' =>
                    array(
                        'page' => array('description' => 'Page of the overview.', 'requirement' => '\d+')
                    ),
                    'https' => false,
                ),
                9 =>
                array(
                    'method' => 'POST',
                    'uri' => '/z-action-with-request-param',
                    'parameters' =>
                    array(
                        'param1' => array('description' => 'Param1 description.', 'required' => true, 'dataType' => 'string', 'readonly' => false)
                    ),
                    'https' => false,
                ),
            ),
        );

        $this->assertEquals($expected, $result);
    }

    public function testFormatOne()
    {
        $container = $this->getContainer();

        $extractor  = $container->get('nelmio_api_doc.extractor.api_doc_extractor');
        $annotation = $extractor->get('Nelmio\ApiDocBundle\Tests\Fixtures\Controller\TestController::indexAction', 'test_route_1');
        $result     = $container->get('nelmio_api_doc.formatter.simple_formatter')->formatOne($annotation);

        $expected = array(
            'method' => 'GET',
            'uri' => '/tests.{_format}',
            'filters' => array(
                'a' => array(
                    'dataType' => 'integer',
                ),
                'b' => array(
                    'dataType' => 'string',
                    'arbitrary' => array(
                        'arg1',
                        'arg2',
                    ),
                ),
            ),
            'description' => 'index action',
            'requirements' => array(
                '_format' => array('dataType' => '', 'description' => '', 'requirement' => ''),
            ),
            'https' => false,
            'authentication' => false,
        );

        $this->assertEquals($expected, $result);
    }
}
